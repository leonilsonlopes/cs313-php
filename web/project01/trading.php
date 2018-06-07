
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
						$availableCoins = array();
						foreach (getListOfCurrencies() as $row){	
							array_push($availableCoins,$row['code']);
							echo '<div class="dropdown-divider"></div><input class="dropdown-item" name="' .$row['code'] . '" value="selected" onclick="javascript:$(\'form\').submit()">' . $row['code'] . ' - ' . $row['name'] .'</input>';						
						}
					?>			
				
				</div>
			</div>	
				<input type="hidden" name="clicked" value="TEST"/>
		</form>
		
		<?php
			echo "<p><h1>" . var_dump($availableCoins) . "</h1></p>";
			echo "<br/><br/><p><h1>BTC:::: " . $_POST["BTC"] . "</h1></p>";

		?>
		
		<br/><br/>

</div>
	

	
	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
