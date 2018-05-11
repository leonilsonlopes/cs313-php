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

  <div class="col-lg-2">
	<div class="centralPannels">
	  <h3><p>Authors<p></h3>
	  <br/><br/>
	  <p><a class="link" href="shopPage.php">Dante Alighieri</a></p>
	  <br/><br/>
	  <p><a class="link" href="shopPage.php">Shakespeare</a></p>
	  <br/><br/>
	  <p><a class="link" href="shopPage.php">Machado de Assis</a></p>
	  <br/><br/>
	  <p><a class="link" href="shopPage.php">Greek Classics</a></p>
	  <br/><br/>
	  <p><a class="link" href="shopPage.php">and more...</a></p>
	</div>
  </div>
  
  <div class="col-lg-8">
	<div class="centralPannels" id="IndexContentCentral">
		<h1><p>Your Digital Library</p></h1>
		</br>
		<p>LL Library is a digital library. It contains great titles of the most famous authors in digital format, so that you can read anywhere!</p>
		<p>The revolution of books is taking place, be part of this new world! Carry a whole library inside your pocket!</p>
		</br></br>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			<div class="item active">
				<img src="img/ADivinaComedia_ILUSTRADA_capa.jpg" alt="The Divine Comedy" style="width:20%;align:middle">
			</div>
		
			<div class="item">
				<img src="img/Macbeth_capa.jpg" alt="Macbeth" style="width:20%;">
			</div>
			
			<div class="item">
				<img src="img/DomCasmurro_capa.jpg" alt="Dom Casmurro" style="width:20%;">
			</div>
			
			<div class="item">
				<img src="img/RomeueJulieta_capa.jpg" alt="Romeo and Juliet" style="width:20%;">
			</div>
			
			<div class="item">
				<img src="img/Antigona_capa.jpg" alt="Antigona" style="width:20%;">
			</div>
			</div>
		
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>
		</br></br>
		<p><a class="link" href="shopPage.php">Go to our shelves! Click here!</a></p>
	</div>
  </div>



  <div class="col-lg-2">
	<div class="centralPannels">
	  <h3><p>How to Read</p></h3>
      <p>Read on your computer, cellphone or dedicate devices like eReaders. Check out bellow:</p>
	  <p><a class="link" href="https://www.amazon.com/s/ref=nb_sb_noss_2/142-1655466-6318261?url=search-alias%3Daps&field-keywords=kindle" target="_blank">Amazon Kindle eReader</a></p>
	  <br/><br/>
	  <p><a class="link" href="https://pt.kobobooks.com/?utm_source=Kobo&utm_medium=TopNav&utm_campaign=All" target="_blank">Kobo eReader</a></p>
	  <br/><br/>
	  <p><a class="link" href="http://books.google.es/intl/es/help/ebooks/ereader.php" target="_blank">Google eReader</a></p>
	  <br/><br/>
	  <p><a class="link" href="https://www.barnesandnoble.com/w/piper-barnes-noble/1122314015?ean=9781400697564" target="_blank">Barnes & Noble Nook eReader</a></p>
	</div>
  </div>
  
</div>


<?php include 'footer.php';?>

</body>
</html>
