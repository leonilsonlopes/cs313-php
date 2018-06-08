
<!DOCTYPE html>
<html lang="en">
	<?php include 'dbFunctions.php';?>
	<?php include 'coinFunctions.php';?>
	<?php include 'header.php';?>
	<!-- START CUSTOM HEAD AREA -->
	
	<!-- CLOSE CUSTOM HEAD AREA -->
	<?php include 'bodyOpen.php';?>
	<?php include 'navbar.php';?>
	<?php include 'breadCrumbs.php';?>

	<!-- START CONTENT AREA -->
	  
		<div class="container">
			<h2>Trading Area</h2>
			<div class="panel panel-default">
				<div class="panel-body">Record your Buy and Sell orders here</div>
			</div>
		</div>
		<br/><br/>
		<form action="trading.php" method="post">
			<div class="btn-group">	
				<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Select a Coin
				</button>		
				<div class="dropdown-menu">
				
					<?php
						foreach (getListOfCurrencies() as $row){	
							echo '<div class="dropdown-divider"></div><a class="dropdown-item" onclick="document.getElementById(\'selectedCoin\').value=\'' . $row['code'] . '\';javascript:$(\'form\').submit();">' . $row['code'] . ' - ' . $row['name'] .'</a>';						
						}
					?>			
				
				</div>
			</div>	
				<input type="hidden" id="selectedCoin" name="selectedCoin"/>
		</form>
		
		<br/>
		<br/>
		
		<table id="currencies" class="table table-hover table-striped table-bordered" style="width:100%">
			<thead>
				<tr>				
				<th scope="col">Coin Code</th>
				<th scope="col">Coin Name</th>
				<th scope="col">USD Price</th>
				<th scope="col">Last Hour Variation</th>
				<th scope="col">Last 24hs Variation</th>
				<th scope="col">Last 7 days Variation</th>
				<th scope="col">Last Update</th>
				</tr>
			</thead>
			<tbody>

		<!-- Retrieve Data	-->
		<?php 
		echo "<p><h1>::: " . $_POST['selectedCoin'] . "</h1></p>";
			foreach (getListOfCurrencies() as $row){				
				if(strtoupper($row['code']) == strtoupper($_POST['selectedCoin']) ){					
					echo '<tr>
					<th scope=\"row\">' . $row['code'] . '</th>				
					<td>' . $row['name'] . '</td>
					<td>' . $row['price_usd'] . '</td>
					<td>' . $row['percent_change_1h'] . '</td>
					<td>' . $row['percent_change_24h'] . '</td>
					<td>' . $row['percent_change_7d'] . '</td>
					<td>' . $row['last_updated'] . '</td>
					</tr>';
					break;
				}
			}			
		?> 
		
			</tbody>
		</table>
	
		
		<br/><br/>

</div>
	

	
	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
