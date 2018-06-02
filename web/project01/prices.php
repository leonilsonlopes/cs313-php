<!DOCTYPE html>
<html lang="en">
	<?php include 'header.php';?>
	<!-- START CUSTOM HEAD AREA -->
	
	<!-- CLOSE CUSTOM HEAD AREA -->
	<?php include 'bodyOpen.php';?>
	<?php include 'navbar.php';?>
	<?php include 'breadCrumbs.php';?>
	<?php include 'php-binance-api.php';?>

	<!-- START CONTENT AREA -->
	  
		<div class="container">
			<h2>Prices</h2>
			<div class="panel panel-default">
				<div class="panel-body">Get the lastest price of your coins here.</div>
			</div>
		</div>
	
	<?php 
		$api = new Binance\API();
		$ticker = $api->prices();
		print_r($ticker); // List prices of all symbols
		echo "Price of BNB: {$ticker['BNBBTC']} BTC.".PHP_EOL;
	?>
	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
