<!DOCTYPE html>
<html lang="en">

	<?php include 'header.php';?>
	
		<!-- START CUSTOM HEAD AREA -->
	
		<script type=\"text/javascript\" class=\"init\">
	

$(document).ready(function() {
	var table = $('#currencies').DataTable();

	$('#currencies tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	} );


} );


	</script>
	
	<!-- CLOSE CUSTOM HEAD AREA -->
	
	<?php include 'bodyOpen.php';?>
	<?php include 'navbar.php';?>
	<?php include 'breadCrumbs.php';?>
	<?php include 'dbConnect.php';?>
	<!-- START CONTENT AREA -->


		<div class="container">
			<h2>Crypto Currencies</h2>
			<div class="panel panel-default">
				<div class="panel-body">Insert the crypto coin you want to follow here</div>
			</div>
		</div>
	
		<form action="cryptoCurrencies.php" method="post">
			<div class="form-group">
				<label for="code">Coin Code:</label>
				<input type="text" class="form-control" name="code">
			</div>
			<div class="form-group">
				<label for="name">Coin Name:</label>
				<input type="text" class="form-control" name="name">
			</div>
			<input type="hidden" name="clicked" value="1">
			<button type="submit" class="btn btn-primary">Save Coin</button>
		</form>
		
		<?php 
			try
			{
				$clicked = $_POST["clicked"];
				
				if($clicked == "1"){
				
					$coinCode = $_POST["code"];
					$coinName = $_POST["name"];
					$db = get_db();
					
					// Again, first prepare the statement
					$statement = $db->prepare('INSERT INTO currency(code, name) VALUES(:coinCode, :coinName)');
		
					// Then, bind the values
					$statement->bindValue(':coinCode', $coinCode);
					$statement->bindValue(':coinName', $coinName);
		
					$statement->execute();
				}
			}
			catch (Exception $ex)
			{				
				echo "Error with DB. Details: $ex";
				die();
			}
			
		?> 
		
		<br/>
		<br/>
		<p><h3><b>Saved Coins:</b></h3></p>
		<table id="currencies" class="table table-hover table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Coin Code</th>
				<th scope="col">Coin Name</th>
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
		?>
			</tbody>
		</table>
		
	
	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
