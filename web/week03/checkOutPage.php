<!DOCTYPE html>
<html lang="en">
<head>
  <title>LL Library Online Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="basicStyle.css"><!-- External style --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
  <script src="functions.js"></script>
  <style>

    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
  </style>
</head>
<body onload='buildCheckOutTables(<?php echo($_POST['sessionInfo']); ?>)'>

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
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="shopPage.html">Store</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signUpPage.html"><span class="glyphicon glyphicon-user"></span> <span id="userNamePanel"></span></a></li>
        <li><a href="checkOutPage.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span id="cartSize"></span></a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="row"> 
	<div class="col-lg-1">
	</div>
	<div class="col-lg-10">
		<div class="centralPannels">
			<table id="table">
				<thead>
				<tr>
					<th data-field="productName">Book Title</th>
					<th data-field="priceShow">Unit Price</th>
					<th data-field="quantity">Quantity</th>
					<th data-field="totalShow">Total</th>
				</tr>
				</thead>
			</table>
			<br/><br/>
			<table id="table2">
				<thead>
				<tr>
					<th data-field="totalPayableToShow">Total Purchases</th>
					<th data-field="taxesToShow">Taxes</th>
					<th data-field="totalPayableAfterTaxesToShow">Total to pay</th>
				</tr>
				</thead>
			</table>

		</div>
	</div>
	<div class="col-lg-1">
	</div>
</div>
 </br></br> 
<div class="row"> 
	<div class="col-lg-1">
	</div>
	<div class="col-lg-10">
		<p>To remove or add item into your shopping cart, please return to the <a href="shopPage.html">store</a>.</p>
		</br>
		<!--<p>To empty your cart, click here: <a onclick="clearCart()" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#clearCart"><span class="glyphicon glyphicon-trash"></span></span> Clear cart!</a></p>
		</br>-->
		<p>To finish your purchase, click here: <a class="btn btn-success btn-sm" onclick="submitForm()"><span class="glyphicon glyphicon-ok"></span></span> Finish purchase!</a></p>
						
		
	</div>
	<div class="col-lg-1">
	</div>
</div>
</div> 



<br/><br/>
<footer class="container-fluid text-center">
  <p>All Rights Reserved - 2017 - Leonilson Lopes</p>    
</footer>

<form action="reviewPage.php" method="post" id="sendContent" >
	<input id="sessionInfo" name="sessionInfo" type="text" style="display: none" value="teste"/>
	
</form>

</body>
</html>
