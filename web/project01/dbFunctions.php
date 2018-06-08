<?php include 'dbConnect.php';?>
<?php
function getListOfCurrencies(){ 
	$db = get_db();
	$result = $db->query('SELECT * FROM currency');
	return $result;
}

function isCoinInUse($coinCode){ 
	$db = get_db();
	$result = $db->prepare('SELECT * FROM currency WHERE code = :coinCode');
	$result->bindValue(':coinCode', $coinCode);
	$result->execute();
	
	if(sizeof($result) > 0){
		return true;
	}else{
		return false;
	}
}
?>