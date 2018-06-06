<?php include 'dbConnect.php';?>
<?php

function getListOfCurrencies(){ 	
	$db = get_db();
	$result = $db->query('SELECT * FROM currency');
	return $result;
}
?>