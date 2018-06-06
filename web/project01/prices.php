
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
		<p><h2><b>Price Information:</b></h2></p>
		
		
		<form action="prices.php" method="post">			
			<button type="submit" class="btn btn-success" value="addCoin" name="btnSaveCoin">Refresh Price Information</button>			
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
			foreach (getListOfCurrencies() as $row){
				$currentCoin = $row['code'];
				$coinData = getCoinInfo($currentCoin);
				$price_usd = 'N/A';
				
					
				echo '<tr>
				<th scope=\"row\">' . $currentCoin . '</th>				
				<td>' . $row['name'] . '</td>
				<td>' . if(!$coinData['price_usd'] == '') echo $coinData['price_usd'];else echo 'N/A'; . '</td>
				<td>' . $coinData['percent_change_1h'] . '%</td>
				<td>' . $coinData['percent_change_24h'] . '%</td>
				<td>' . $coinData['percent_change_7d'] . '%</td>
				<td>' . date('m/d/Y', $coinData['last_updated']) . '</td>
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
