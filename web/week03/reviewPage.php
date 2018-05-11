<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>

<body onload='finishPurchase(<?php echo($_POST['sessionInfo']); ?>)'>

<div class="jumbotron">
  <div class="container text-center">
    <h1 id="upper-title">LL Library</h1>      
    <p>The Future of Reading</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="shopPage.php">Store</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signUpPage.php"><span class="glyphicon glyphicon-user"></span> <span id="userNamePanel"></span></a></li>
        <li><a href="checkOutPage.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span id="cartSize"></span></a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="row"> 
	<div class="col-lg-1">
	</div>
	<div class="col-lg-10">
		<p>Confirm you purchase info:</p>
		</br>		
		

		<p id="finalValue"></p>
		<p id="ccNumber"></p>
		<p id="ccExpDate"></p>
		<p id="address"></p>
		<p id="phone"></p>
		
		<div class="modal-footer">
			<button type="button" class="btn btn-success" data-dismiss="modal" onclick="clearCart()" data-toggle="modal" data-target="#purchaseConfirmed">Confirm </button><button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel</button>
		</div>
		
			<!-- Modal -->
		<div class="modal fade" id="purchaseConfirmed" role="dialog">
			<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><p>Congratulations! You purchase is finished!</p></h4>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onblur="location.reload()" onclick="clearCart();window.location.href='shopPage.php'">Close</button>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-1">
	</div>
</div>
</div> 



<br/><br/>
<?php include 'footer.php';?>

</body>
</html>
