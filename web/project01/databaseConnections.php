<?php

echo "<div class=\"form-group\">
  <label for=\"code\">Coin Code:</label>
  <input type=\"text\" class=\"form-control\" id=\"code\">
</div>
<div class=\"form-group\">
  <label for=\"name\">Coin Name:</label>
  <input type=\"text\" class=\"form-control\" id=\"name\">
</div>
<button type=\"button\" class=\"btn btn-primary\">Save Coin</button>


<br/>
<br/>

<p><h3><b>Saved Coins:</b></h3></p>
<table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">Coin Code</th>
      <th scope=\"col\">Coin Name</th>
    </tr>
  </thead>
  <tbody>";
  
try
{
  $user = 'cznxcdmecjdoem';
  $password = 'e4100b98cf30fe197a92e2bb0482952fbdb0872d8dc940e15eca56e9bd481f6c';
  $db = new PDO('pgsql:host=ec2-50-19-224-165.compute-1.amazonaws.com;dbname=d18hilqab5eg7d', $user, $password);

}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT * FROM currency') as $row)
{
  echo '<tr>
			<th scope=\"row\">' . $row['id'] . '</th>
			<td>' . $row['code'] . '</td>
			<td>' . $row['name'] . '</td>
		</tr>';

}

echo "</tbody></table>";



?>