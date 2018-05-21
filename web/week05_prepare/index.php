<?php

try
{
  $user = 'hnemadwwvpxdyg';
  $password = 'xc7ed2bccf9d743009848bd7533759aad0749a69754c167e58aa8c00891ff3bfe';
  $db = new PDO('pgsql:host=ec2-54-243-137-182.compute-1.amazonaws.com;dbname=d1kgd7up2ibtgf', $user, $password);
  echo '<p>SUCCESS</p>';
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>