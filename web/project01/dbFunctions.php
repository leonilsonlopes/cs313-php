<?php include 'dbConnect.php';?>
<?php

function getListOfCurrencies(){ 
	$db = get_db();
	$result = $db->query('SELECT * FROM currency');
	return $result;
}

function getWallet(){
	$db = get_db();
	try{		
		$result = $db->query('SELECT c.code, c.name, w.quantity, w.paid_value FROM wallet w INNER JOIN currency c ON c.id = w.currency_id');
		return $result;
	}catch(Exception $ex){
		echo "Error while saving retrieving wallet: " . $ex;
		die();
	}		
}

function updateWallet($coinCode, $quantity, $totalPaid){
	$db = get_db();
	try{
		if(isCoinInWallet($coinCode)){
			echo "<p>isCoinInWallet: TRUE</p>";
			if($quantity = 0 || $quantity < 0){
				$statement = $db->prepare('DELETE FROM wallet WHERE currency_id IN (SELECT id FROM currency WHERE code = :coinCode) ');
				$statement->bindValue(':coinCode', $coinCode);
				$statement->bindValue(':quantity', $quantity);
				$statement->bindValue(':paid_value', $totalPaid);
				$statement->execute();
				
				showAlert(" - last coins sold. Remove from wallet.", $coinCode, "success");
			}else{			
				$walletResult = getCoinFromWallet($coinCode);
				$walletResult = $walletResult->fetch();
				$paidValue = $walletResult['paid_value'];
				$quantity = $walletResult['quantity'];
				echo "<p> results::: " . $paidValue . " --- " . $quantity . "</p>";
				
				showAlert(" existing coin successfully updated in your wallet.", $coinCode, "success");
			}
			
		}else{
			echo "<p>isCoinInWallet: FALSE</p>";
			
			$statement = $db->prepare('INSERT INTO wallet(currency_id, quantity, paid_value) VALUES((SELECT id FROM currency WHERE code = :coinCode), :quantity, :paid_value)');
			$statement->bindValue(':coinCode', $coinCode);
			$statement->bindValue(':quantity', $quantity);
			$statement->bindValue(':paid_value', $totalPaid);
			$statement->execute();
			showAlert(" new coin successfully added to your wallet.", $coinCode, "success");
					
		}

	}catch(Exception $ex){
		echo "Error while updating in wallet: " . $ex;
		die();
	}		
}

function saveBuyOrder($coinCode, $price, $quantity){
	$db = get_db();
	try{	
		$totalPaid = $price * $quantity;
		$statement = $db->prepare('INSERT INTO buy_order(code, price, quantity, total) VALUES(:coinCode, :price, :quantity, :total)');
		$statement->bindValue(':coinCode', $coinCode);
		$statement->bindValue(':price', $price);
		$statement->bindValue(':quantity', $quantity);
		$statement->bindValue(':total', $totalPaid);
		
		$statement->execute();
		
		showAlert(" purchase successfully recorded.", $quantity . " " . $_POST['btnBuyCoin'], "success");	
		
		//Add to wallet
		updateWallet($coinCode, $quantity, $totalPaid);
		
	}catch(Exception $ex){
		echo "Error while saving buy order: " . var_dump($ex);
		die();
	}		
}

function isCoinInWallet($coinCode){
	$db = get_db();
	try{	
		$result = $db->prepare('SELECT w.id FROM wallet w INNER JOIN currency c ON c.id = w.currency_id AND c.code = :coinCode');
		$result->bindValue(':coinCode', $coinCode);
		$result->execute();
		
		if($result->rowCount() > 0){
			return true;
		}else{
			return false;
		}
		
	}catch(Exception $ex){
		echo "Error while saving buy order: " . $ex;
		die();
	}		
}

function getCoinFromWallet($coinCode){
	$db = get_db();
	try{	
		$result = $db->prepare('SELECT c.code, c.name, w.* FROM wallet w INNER JOIN currency c ON c.id = w.currency_id AND c.code = :coinCode');
		$result->bindValue(':coinCode', $coinCode);
		$result->execute();
		
		return $result;
		
	}catch(Exception $ex){
		echo "Error while saving buy order: " . $ex;
		die();
	}		
}




function isCoinInRecorded($coinCode){ 
	$db = get_db();
	$result = $db->prepare('SELECT * FROM currency WHERE code = :coinCode');
	$result->bindValue(':coinCode', $coinCode);
	$result->execute();
	
	if($result->rowCount() > 0){
		return true;
	}else{
		return false;
	}
}


?>