<?php

try
{
  $user = 'hnemadwwvpxdyg';
  $password = 'c7ed2bccf9d743009848bd7533759aad0749a69754c167e58aa8c00891ff3bfe';
  $db = new PDO('pgsql:host=ec2-54-243-137-182.compute-1.amazonaws.com;dbname=d1kgd7up2ibtgf', $user, $password);
  echo '<p>SUCCESS</p>';
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT username, password FROM note_user') as $row)
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

?>