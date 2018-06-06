<?php include 'dbConnect.php';?>
<?php
$db = get_db();
function getListOfCurrencies(){ 	
	$db->query('SELECT * FROM currency');
	return $db
}
?>