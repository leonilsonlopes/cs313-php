<!DOCTYPE html>
<html lang="en">
<head>
  <title>LL Library Online Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="basicStyle.css"><!-- External style --> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="functions.js"></script>
  <script src="json2.js"></script>
  <style>
   
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }

  </style>
</head>
<body onload="initialLoad()">

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

	<div class="col-lg-4">
	</div>
 
	<div class="col-lg-4">
		<div class="centralPannels">
			<h1>Sign up here to start shopping</h1>
			<br/>
			<form>
				<div class="form-group">
					<label for="name">Name (at least first and last name):</label>
					<input type="text" class="form-control" id="name" onblur="validateAll();" onkeyup="validateAll();">
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<input type="text" class="form-control" id="address"  onblur="validateAll();" onkeyup="validateAll();">
				</div>
				<div class="form-group">
					<label for="phone">Phone:</label>
					<input type="text" class="form-control" id="phone">
				</div>
				</br>
				
				<h3>Payment Information</h3>
				<div class="form-group">
					<label class="radio-inline"><input type="radio" name="optradio" id="amexType" onclick="validateAll();">American Express</label>
					<label class="radio-inline"><input type="radio" name="optradio" id="visaType" onclick="validateAll();">Visa</label>
					<label class="radio-inline"><input type="radio" name="optradio" id="masterType" onclick="validateAll();">Master</label>
				</div>
				<div class="form-group">
					<label for="creditCard">Credit Card Number:</label>
					<input type="text" class="form-control" id="ccNumber" onblur="validateAll();" onkeyup="validateAll();">
				</div>
				<div class="form-group">
					<label for="expDate" >Expiration Date (MM/YY):</label>
					<input type="text" class="form-control" id="expDate" onblur="validateAll();" onkeyup="validateAll();">
				</div>
				
				
				<div class="form-group">					
					<input type="button" class="btn btn-info" value="Save Data" onclick="signUpSaveData()">
				</div>
				<div class="messagePanel" id="signUpSuccessMessage">
					<div class="alert alert-success">
						<strong>Success!</strong><span id="successMessage"></span>
					</div>
				</div>
				<div class="messagePanel" id="signUpFailedMessage">
					<div class="alert alert-danger">
						<strong>Failed!</strong><span id="failedMessage"></span>
					</div>
				</div>
			</form>
			<br/>

		</div>
	</div>
	
	<div class="col-lg-4">
	</div>
  
  
</div>


<?php include 'footer.php';?>

</body>
</html>
