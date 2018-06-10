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
	
		<br/>
		<hr class="style18">
		
		
		<p><h3><b>BUY ORDERS</b></h3></p>
		
		<table id="currencies" class="table table-hover table-striped table-bordered" style="width:100%">
			<thead>
				<tr>				
				<th scope="col">Coin Code</th>
				<th scope="col">Coin Name</th>
				<th scope="col">Sell Price</th>
				<th scope="col">Quantity</th>
				<th scope="col">Total Value</th>
				<th scope="col">Date</th>
				</tr>
			</thead>
			<tbody>

		<!-- Retrieve Data	-->
		<?php 
			foreach (getAllBuyOrders() as $row){
								
				echo '<tr>
					<th scope=\"row\">' . $row['code'] . '</th>				
					<td>' . $row['name'] . '</td>
					<td>$' . $row['price'] . '</td>
					<td>' . $row['quantity'] . '</td>
					<td>$' . $row['total'] . '</td>
					<td>' . $row['date'] . '%</td>
					</tr>';
			} 
			
		?> 
			</tbody>
		</table>
		
		
		<br/>
		<hr class="style18">
		
		
		<p><h3><b>SELL ORDERS</b></h3></p>
		
		<table id="currencies" class="table table-hover table-striped table-bordered" style="width:100%">
			<thead>
				<tr>									
				<th scope="col">Coin Code</th>
				<th scope="col">Coin Name</th>
				<th scope="col">Wallet Price (Buy Price)</th>
				<th scope="col">Sell Price</th>
				<th scope="col">Quantity</th>
				<th scope="col">Total Value</th>
				<th scope="col">Result</th>
				<th scope="col">Percent Result</th>
				<th scope="col">Date</th>
				</tr>
			</thead>
			<tbody>

		<!-- Retrieve Data	-->
		<?php 
			foreach (getAllSellOrders() as $row){
								
				echo '<tr>
					<th scope=\"row\">' . $row['code'] . '</th>				
					<td>' . $row['name'] . '</td>
					<td>$' . $row['price_wallet'] . '</td>
					<td>$' . $row['price_sell'] . '</td>
					<td>' . $row['quantity'] . '</td>
					<td>$' . $row['total'] . '</td>
					<td>$' . $row['result'] . '</td>
					<td>' . $row['percent_result'] . '%</td>
					<td>' . $row['date'] . '%</td>
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
