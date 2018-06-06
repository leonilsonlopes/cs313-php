
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
			<h2>Prices</h2>
			<div class="panel panel-default">
				<div class="panel-body">Follow up the lastest price of your coins here.</div>
			</div>
		</div>
		
				<br/>
		<br/>
		<p><h3><b>Price Information:</b></h3></p>
		
		
		<form action="prices.php" method="post">			
			<button type="submit" class="btn btn-success" value="addCoin" name="btnSaveCoin">Refresh Price Information</button>			
		</form>
		
		
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

		<!-- Retrieve Data -->	
		<?php 
			//foreach (getListOfCurrencies() as $row){
				//$currentCoin = $row['code'];
				//$coinData = getCoinInfo($currentCoin);
				//echo '<tr>
				//<th scope=\"row\">' . $currentCoin . '</th>				
				//<td>' . $row['name'] . '</td>
				//<td>' . $coinData['price_usd'] . '</td>
				//<td>' . $coinData['percent_change_1h'] . '</td>
				//<td>' . $coinData['percent_change_24h'] . '</td>
				//<td>' . $coinData['percent_change_7d'] . '</td>
				//<td>' . date('mm/dd/YY', $coinData['last_updated']) . '</td>
				//</tr>';
			//} 
		?>
			</tbody>
		</table>
		

	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
