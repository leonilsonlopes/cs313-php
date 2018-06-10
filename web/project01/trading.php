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
				<div class="panel-body">Manage your wallet and record your Buy and Sell orders here</div>
			</div>
		</div>
		<br/>
		<br/>
		<hr class="style18">

		<!------------------------------------------- START WALLET AREA ------------------------------------------->
		<p><h3><b>YOUR WALLET</b></h3></p>
			<table id="wallet" class="table table-hover table-striped table-bordered" style="width:100%">
				<thead>
					<tr>	
					<th scope="col">Coin Code</th>
					<th scope="col">Coin Name</th>
					<th scope="col">Quantity</th>
					<th scope="col">Total Paid Value</th>
					<th scope="col">Current Price Per Unit</th>
					<th scope="col">Total Current Value</th>
					<th scope="col">Result</th>
					</tr>
				</thead>
				<tbody>
				
				<?php 
					foreach (getWallet() as $row){
						$currentCoin = $row['code'];
						$coinData = getCoinInfoRaw($currentCoin);
						$currentQuantity = floatval($row['quantity']);
						$floatCurrentPrice = floatval($coinData['price_usd']);
						$floatPaidValue = floatval($row['paid_value']);
						$floatTotalCurrentValue = $floatCurrentPrice * $currentQuantity;
						$result = (($floatTotalCurrentValue / $floatPaidValue) - 1)*100;
					
						echo '<tr>
							<th scope=\"row\">' . $row['code'] . '</th>				
							<td>' . $row['name'] . '</td>
							<td>' . $currentQuantity . '</td>
							<td>$' . $floatPaidValue . '</td>
							<td>$' . $floatCurrentPrice . '</td>
							<td>$' . $floatTotalCurrentValue . '</td>
							<td>' . $result . '%</td>
							</tr>';
					} 
			
				?> 
				
				
				</tbody>
			</table>
			
			
		<!------------------------------------------- END WALLET AREA ------------------------------------------->
			
		<br/>
		<hr class="style18">

		
		<!------------------------------------------- START BUY ORDER AREA ------------------------------------------->
		<p><h3><b>BUY ORDERS</b></h3></p>
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


		
	
		<p><h5><b>Selected coin information:</b></h5></p>
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
			$selectedCoin = strtoupper($_POST['selectedCoin']);
			if($selectedCoin != ""){							
				foreach (getListOfCurrencies() as $row){				
					if(strtoupper($row['code']) == $selectedCoin ){
						$coinData = getCoinInfoFormat($selectedCoin);
						echo '<tr>
						<th scope=\"row\">' . $row['code'] . '</th>				
						<td>' . $row['name'] . '</td>
						<td>' . $coinData['price_usd'] . '</td>
						<td>' . $coinData['percent_change_1h'] . '</td>
						<td>' . $coinData['percent_change_24h'] . '</td>
						<td>' . $coinData['percent_change_7d'] . '</td>
						<td>' . $coinData['last_updated'] . '</td>
						</tr>';
						break;
					}
				}
			}
			echo "</tbody></table>";		
			
				
		?> 
		
				<input type="hidden" id="selectedCoin" name="selectedCoin"/>
				
		<?php 
		
			if($_POST['btnBuyCoin'] != ""){				
				
				$quantity = floatval($_POST['qtty']);
				$coinInfo = getCoinInfoRaw($_POST['btnBuyCoin']);				
				$lastPrice = floatval($coinInfo['price_usd']);
				

				if($quantity > 0){					
					saveBuyOrder($_POST['btnBuyCoin'], $lastPrice, $quantity);						
				}else{
					showAlert("cannot be empty or 0", "Quantity ", "danger");
				}			
			}
							
		?>
						
				<div class="input-group mb-3">
						<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-default">Enter quantity:</span>
						</div>
						<input type="text" name="qtty" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
						<?php echo "<button type=\"submit\" class=\"btn btn-success\" name=\"btnBuyCoin\" value=\"" . $selectedCoin . "\">Buy <b>" .  $selectedCoin . "</b> Coin</button>"?>
				</div>	


		
		<!------------------------------------------- END BUY ORDER AREA ------------------------------------------->
		
		
		<br/>
		<hr class="style18">
	
		
		
		<!------------------------------------------- START SELL ORDER AREA ------------------------------------------->
		
		
		<p><h3><b>SELL ORDERS</b></h3></p>
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


		
	
		<p><h5><b>Selected coin information:</b></h5></p>
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
			$selectedCoin = strtoupper($_POST['selectedCoin']);
			if($selectedCoin != ""){							
				foreach (getListFromWallet() as $row){				
					if(strtoupper($row['code']) == $selectedCoin ){
						$coinData = getCoinInfoFormat($selectedCoin);
						echo '<tr>
						<th scope=\"row\">' . $row['code'] . '</th>				
						<td>' . $row['name'] . '</td>
						<td>' . $coinData['price_usd'] . '</td>
						<td>' . $coinData['percent_change_1h'] . '</td>
						<td>' . $coinData['percent_change_24h'] . '</td>
						<td>' . $coinData['percent_change_7d'] . '</td>
						<td>' . $coinData['last_updated'] . '</td>
						</tr>';
						break;
					}
				}
			}
			echo "</tbody></table>";		
			
				
		?> 
		
				<input type="hidden" id="selectedCoin" name="selectedCoin"/>
				
		<?php 
		
			if($_POST['btnSellCoin'] != ""){				
				
				$quantity = floatval($_POST['qtty']);
				$coinInfo = getCoinInfoRaw($_POST['btnSellCoin']);				
				$lastPrice = floatval($coinInfo['price_usd']);
				

				if($quantity > 0){					
					saveSellOrder($_POST['btnSellCoin'], $lastPrice, $quantity);						
				}else{
					showAlert("cannot be empty or 0", "Quantity ", "danger");
				}			
			}
							
		?>
						
				<div class="input-group mb-3">
						<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-default">Enter quantity:</span>
						</div>
						<input type="text" name="qtty" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
						<?php echo "<button type=\"submit\" class=\"btn btn-success\" name=\"btnSellCoin\" value=\"" . $selectedCoin . "\">Buy <b>" .  $selectedCoin . "</b> Coin</button>"?>
				</div>	
		
		
		
		
		<!------------------------------------------- END SELL ORDER AREA ------------------------------------------->
	

	</form>
	
	<!-- CLOSE CONTENT AREA -->	
	
	</div>	
	
	<?php include 'upperFooter.php';?>
	
	</div>

</body>
</html>
