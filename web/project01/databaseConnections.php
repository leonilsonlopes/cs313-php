<?php

try
{
  $user = 'cznxcdmecjdoem';
  $password = 'e4100b98cf30fe197a92e2bb0482952fbdb0872d8dc940e15eca56e9bd481f6c';
  $db = new PDO('pgsql:host=ec2-50-19-224-165.compute-1.amazonaws.com;dbname=d18hilqab5eg7d', $user, $password);
  //echo '<p>SUCCESS</p>';
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

	$stmt = $db->query('SELECT * FROM currency');
	//$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
echo "<p>" . $rows . "</p>";





?>