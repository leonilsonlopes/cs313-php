<!DOCTYPE html>
<html lang="en">
	<?php include 'databaseConnections.php' ?>;
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
	

	<?php getCurrenciesList() ?>;
	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
