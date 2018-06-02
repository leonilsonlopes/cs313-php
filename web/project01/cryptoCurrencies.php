<!DOCTYPE html>
<html lang="en">
	
	<?php include 'header.php';?>
	<?php include 'bodyOpen.php';?>
	<?php include 'navbar.php';?>
	<?php include 'breadCrumbs.php';?>

	<!-- START CONTENT AREA -->
	  
		<div class="container">
			<h2>Crypto Currencies</h2>
			<div class="panel panel-default">
				<div class="panel-body">Insert the crypto coin you want to follow here</div>
			</div>
		</div>
	

		<div class="container">
			<h2>Crypto Currencies</h2>
			<div class="panel panel-default">
				<div class="panel-body">Insert the crypto coin you want to follow here</div>
			</div>
		</div>
	
		<div class=\"form-group\">
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
			<tbody>

		<!-- Retrieve Data -->	
		<?php 
			$db = get_db();
			foreach ($db->query('SELECT * FROM currency') as $row){
				echo '<tr>
				<th scope=\"row\">' . $row['id'] . '</th>
				<td>' . $row['code'] . '</td>
				<td>' . $row['name'] . '</td>
				</tr>';
			} 
		?>;
			</tbody>
		</table>
		
	
	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
