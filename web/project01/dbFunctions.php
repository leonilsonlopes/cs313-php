<?php include 'dbConnect.php';?>
<?php

function getListOfCurrencies(){ 
	$db = get_db();
	$result = $db->query('SELECT * FROM currency');
	return $result;
}

function getCoinFromCurrency($coinCode){
	$db = get_db();
	try{	
		$result = $db->prepare('SELECT * FROM currency WHERE code = :coinCode');
		$result->bindValue(':coinCode', $coinCode);
		$result->execute();
		
		return $result->fetch();
		
	}catch(Exception $ex){
		echo "Error while saving buy order: " . $ex;
		die();
	}		
}

function getAllBuyOrders(){
	$db = get_db();
	try{		
		$result = $db->query('SELECT * FROM buy_order');
		return $result;
	}catch(Exception $ex){
		echo "Error while retrieving buy orders: " . $ex;
		die();
	}
}

function getAllSellOrders(){
	$db = get_db();
	try{		
		$result = $db->query('SELECT * FROM sell_order');
		return $result;
	}catch(Exception $ex){
		echo "Error while retrieving sell orders: " . $ex;
		die();
	}
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

function updateWallet($coinCode, $quantity, $totalPaid, $operation){
	$db = get_db();
	try{
				
		
		if(isCoinInWallet($coinCode)){
			
			$walletResult = getCoinFromWallet($coinCode);
			$existingPaidValue = $walletResult['paid_value'];
			$existingQuantity = $walletResult['quantity'];
			
			if($operation == "sell" && ($existingQuantity - $quantity) <= 0){
				
				$statement = $db->prepare('DELETE FROM wallet WHERE currency_id IN (SELECT id FROM currency WHERE code = :coinCode) ');
				$statement->bindValue(':coinCode', $coinCode);
				$statement->execute();
				
				showAlert(" - last coins sold. Remove from wallet.", $coinCode, "success");
				
			}else{				
				
					
				$statement = $db->prepare('UPDATE wallet SET quantity=:quantity, paid_value=:paid_value WHERE id = :id');
				$statement->bindValue(':id', $walletResult['id']);
				if($operation == "sell"){
					$statement->bindValue(':quantity', $existingQuantity - $quantity);
					$statement->bindValue(':paid_value', $existingPaidValue - $totalPaid);
				}else{
					$statement->bindValue(':quantity', $existingQuantity + $quantity);
					$statement->bindValue(':paid_value', $existingPaidValue + $totalPaid);
				}
				
				
				$statement->execute();
								
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
		$name = getCoinFromCurrency($coinCode);
		$name = $name['name'];
		$statement = $db->prepare('INSERT INTO buy_order(code, name, price, quantity, total) VALUES(:coinCode, :name, :price, :quantity, :total)');
		$statement->bindValue(':coinCode', $coinCode);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':price', $price);
		$statement->bindValue(':quantity', $quantity);
		$statement->bindValue(':total', $totalPaid);
		
		$statement->execute();
		
		showAlert(" purchase successfully recorded.", $quantity . " " . $_POST['btnBuyCoin'], "success");	
		
		//Add to wallet
		updateWallet($coinCode, $quantity, $totalPaid, "buy");
		
	}catch(Exception $ex){
		echo "Error while saving buy order: " . var_dump($ex);
		die();
	}		
}

function saveSellOrder($coinCode, $price, $quantity){
	$db = get_db();
	try{	
		$totalPaid = $price * $quantity;
		$coinFromWallet = getCoinFromWallet($coinCode);
		$name = $coinFromWallet['name'];
		$walletQuantity = floatval($coinFromWallet['quantity']);
		$price_wallet = floatval($coinFromWallet['paid_value']) / floatval($coinFromWallet['quantity']);
		$result = $totalPaid - ($price_wallet * $quantity);
		
		if($quantity > $walletQuantity){
			showAlert(" - you can't sell more coins than you have.", "NOT ENOUGH COINS", "danger");	
			return;
		}
		
		$statement = $db->prepare('INSERT INTO sell_order(code, name, price_wallet, price_sell, quantity, total, result, percent_result) VALUES(:coinCode, :name, :price_wallet, :price_sell, :quantity, :total, :result, :percent_result)');
		$statement->bindValue(':coinCode', $coinCode);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':price_wallet', $price_wallet);
		$statement->bindValue(':price_sell', $price);
		$statement->bindValue(':quantity', $quantity);
		$statement->bindValue(':total', $price * $quantity);
		$statement->bindValue(':result', $result);
		$statement->bindValue(':percent_result', (($totalPaid / ($price_wallet * $quantity)) - 1) * 100 );
		
		$statement->execute();
		
		showAlert(" sell successfully recorded.", $quantity . " " . $_POST['btnSellCoin'], "success");	
		
		//update wallet
		updateWallet($coinCode, $quantity, $totalPaid, "sell");
		
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
		
		return $result->fetch();
		
	}catch(Exception $ex){
		echo "Error while saving buy order: " . $ex;
		die();
	}		
}

function getListFromWallet(){
	$db = get_db();
	try{	
		$result = $db->query('SELECT c.code, c.name, w.* FROM wallet w INNER JOIN currency c ON c.id = w.currency_id');	
		return $result;
		
	}catch(Exception $ex){
		echo "Error while getting list of coins from wallet: " . $ex;
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