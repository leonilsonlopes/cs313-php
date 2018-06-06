<?php include 'dbConnect.php';?>
<?php

function getListOfCurrencies(){ 
		echo 'check 1';
	$db = get_db();
	echo 'check 2';
	$result = $db->query('SELECT * FROM currency');
	echo 'check 3';
	echo print_r($result);
	return $result;
}
?>