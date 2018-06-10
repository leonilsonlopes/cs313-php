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
		$result = $db->query('SELECT c.code, c.name, w.quantity, w.paid_value FROM wallet w INNER JOIN currency c ON c.code = w.currency_code');
		return $result;
	}catch(Exception $ex){
		echo "Error while saving retrieving wallet: " . $ex;
		die();
	}		
}

function updateWallet($coinCode, $quantity, $totalPaid){
	$db = get_db();
	try{
		if(isCoinInUse($coinCode)){
			$walletResult = getCoinFromWallet($coinCode);
			echo "#######: " + $walletResult['paid_value'];
		}else{
			$statement = $db->prepare('INSERT INTO wallet(coinCode, quantity, paid_value) VALUES((SELECT id FROM currency WHERE code = :coinCode), :quantity, :paid_value)');
			$statement->bindValue(':coinCode', $coinCode);
			$statement->bindValue(':quantity', $quantity);
			$statement->bindValue(':paid_value', $totalPaid);
			$statement->execute();
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
		$statement = $db->prepare('INSERT INTO buy_order(coinCode, price, quantity, total) VALUES(:coinCode, :price, :quantity, :total)');
		$statement->bindValue(':coinCode', $coinCode);
		$statement->bindValue(':price', $price);
		$statement->bindValue(':quantity', $quantity);
		$statement->bindValue(':total', $totalPaid);
		$statement->execute();
		
		//Add to wallet
		updateWallet($coinCode, $quantity, $totalPaid);
		
	}catch(Exception $ex){
		echo "Error while saving buy order: " . $ex;
		die();
	}		
}

function isCoinInWallet($coinCode){
	$db = get_db();
	try{	
		$result = $db->prepare('SELECT id FROM wallet WHERE code = :coinCode');
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
		$result = $db->prepare('SELECT * FROM wallet WHERE code = :coinCode');
		$result->bindValue(':coinCode', $coinCode);
		$result->execute();
		
		return $result;
		
	}catch(Exception $ex){
		echo "Error while saving buy order: " . $ex;
		die();
	}		
}




function isCoinInUse($coinCode){ 
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