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
		$result = $db->query('SELECT c.code, c.name, w.quantity, w.paid_value FROM wallet w INNER JOIN currency c ON c.id = w.id');
		return $result;
	}catch(Exception $ex){
		echo "Error while saving buy order: " . $ex;
		die();
	}		
}

function saveBuyOrder($coinCode, $price, $quantity, $total){
	$db = get_db();
	try{		
		$statement = $db->prepare('INSERT INTO buy_order(currency_id, price, quantity, total) VALUES((select id from currency where code = :coinCode), :price, :quantity, :total)');
		$statement->bindValue(':coinCode', $coinCode);
		$statement->bindValue(':price', $price);
		$statement->bindValue(':quantity', $quantity);
		$statement->bindValue(':total', $total);
		$statement->execute();
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

function getAllOpenBuyOrders(){
	$db = get_db();
	$result = $db->query('SELECT * FROM buy_order b, trading_history h WHERE h.sell_id IS NULL');
	return $result;
}


?>