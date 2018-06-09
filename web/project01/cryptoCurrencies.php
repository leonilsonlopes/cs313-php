<?php include 'header.php';?>
	
		<!-- START CUSTOM HEAD AREA -->
	
		<script type="text/javascript" class="init">


$(document).ready(function() {
	
	var table = $('#currencies').DataTable();

	$('#currencies').on( 'click', 'tbody tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
		
		$('input[name=id]').val(table.row( this ).data()[0]);
		$('input[name=code]').val(table.row( this ).data()[1]);
		$('input[name=name]').val(table.row( this ).data()[2]);

	} );


} );


	</script>
	
	<!-- CLOSE CUSTOM HEAD AREA -->
	
	<?php include 'bodyOpen.php';?>
	<?php include 'navbar.php';?>
	<?php include 'breadCrumbs.php';?>
	<!-- START CONTENT AREA -->


		<div class="container">
			<h2>Crypto Currencies</h2>
			<div class="panel panel-default">
				<div class="panel-body">Manage the crypto coin you want to follow here</div>
			</div>
		</div>
	
		<form action="cryptoCurrencies.php" method="post">
			<input type="hidden" name="id"/>
			<div class="form-group">
				<label for="code">Coin Code:</label>
				<input type="text" class="form-control" name="code">
			</div>
			<div class="form-group">
				<label for="name">Coin Name:</label>
				<input type="text" class="form-control" name="name">
			</div>
			<input type="hidden" name="clicked" value="1"/>
			<button type="submit" class="btn btn-success" value="addCoin" name="btnSaveCoin">Add Coin</button>
			<button type="submit" class="btn btn-primary" value="updateCoin" name="btnUpdateCoin">Update Coin</button>
			<button type="submit" class="btn btn-danger" value="deleteCoin" name="btnDeleteCoin">Delete Coin</button>
		</form>
		
		
		
		<?php 
			try
			{
				$clicked = $_POST["clicked"];
				
				if($clicked == "1"){
				
					$coinID = $_POST["id"];
					$coinCode = strtoupper($_POST["code"]);
					$coinName = $_POST["name"];
					$db = get_db();
					
					// Again, first prepare the statement
					if($_POST["btnSaveCoin"] == "addCoin"){
						
						$coinInfo = getCoinInfo($coinCode);
						if($coinInfo["symbol"] == ""){
							showAlert("coin symbol is not valid! Please enter a valid coin. To check valid coins, refer to https://coinmarketcap.com/.",$coinCode,"danger");							
						}else if(isCoinInUse($coinCode)){
							showAlert(" is already recorded!",$coinCode,"danger");	
						}else{
							$statement = $db->prepare('INSERT INTO currency(code, name) VALUES(:coinCode, :coinName)');
							$statement->bindValue(':coinCode', $coinCode);
							$statement->bindValue(':coinName', $coinName);
							$statement->execute();
							showAlert(" successfully recorded!",$coinCode,"success");
						}						
						
					}
					
					if($_POST["btnUpdateCoin"] == "updateCoin"){
						$statement = $db->prepare('UPDATE currency SET code=:coinCode, name=:coinName WHERE id = :coinID');
						$statement->bindValue(':coinID', $coinID);
						$statement->bindValue(':coinCode', $coinCode);
						$statement->bindValue(':coinName', $coinName);
						$statement->execute();
					}
					
					if($_POST["btnDeleteCoin"] == "deleteCoin"){
						$statement = $db->prepare('DELETE FROM currency WHERE id = :coinID');
						$statement->bindValue(':coinID', $coinID);
						$statement->execute();
					}		
							
					
				}
			}
			catch (Exception $ex)
			{				
				echo "Error with DB. Details: $ex";
				die();
			}
			
		?> 
		
		<p><h3><b>Saved Coins:</b></h3></p>
		<table id="currencies" class="table table-hover table-striped table-bordered" style="width:100%">
			<thead>
				<tr>				
				<th scope="col">Coin Code</th>
				<th scope="col">Coin Name</th>
				</tr>
			</thead>
			<tbody>

		<!-- Retrieve Data -->	
		<?php 			
			foreach (getListOfCurrencies() as $row){
				echo '<tr>
				<th scope=\"row\">' . $row['code'] . '</th>				
				<td>' . $row['name'] . '</td>
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
