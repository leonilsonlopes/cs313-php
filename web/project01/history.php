<!DOCTYPE html>
<html lang="en">
	<?php include 'header.php';?>
	

	
	
	<?php include 'bodyOpen.php';?>
	<?php include 'navbar.php';?>
	<?php include 'breadCrumbs.php';?>

	<!-- START CONTENT AREA -->
	  
		<div class="container">
			<h2>History Results</h2>
			<div class="panel panel-default">
				<div class="panel-body">Verify your trading history and results here.</div>
			</div>
		</div>
	

	<?php
$response = http_get("http://www.example.com/", array("timeout"=>1), $info);
print_r($info);
?>
	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
