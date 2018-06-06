<?php include 'dbConnect.php';?>
<?php
function getListOfCurrencies(){ 
	$db = get_db();
	$db->query('SELECT * FROM currency');
	return $db
}
?>