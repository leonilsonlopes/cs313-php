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

foreach ($db->query('SELECT * FROM currency') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}

echo '<p> ------------------- </p>';

$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}

echo '<p> ------------------- </p>';

$statement = $db->query('SELECT username, password FROM note_user');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<p>' . print_r($results) . '</p>';


?>