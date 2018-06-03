<!DOCTYPE html>
<html lang="en">
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
				<div class="panel-body">Get the lastest price of your coins here.</div>
			</div>
		</div>
	

<?php  
  $url = "https://bitpay.com/api/rates";

  $json = file_get_contents($url);
  $data = json_decode($json, TRUE);

  echo $json;
  
  $rate = $data[1]["rate"];    
  $usd_price = 10;     # Let cost of elephant be 10$
  $bitcoin_price = round( $usd_price / $rate , 8 );
?>

<ul>
   <li>Price: <?=$usd_price ?> $ / <?=$bitcoin_price ?> BTC
</ul>

	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
