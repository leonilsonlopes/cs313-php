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
        <li><a style="cursor:pointer;" onclick="submitForm()"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span id="cartSize"></span></a></li>
      </ul>
    </div>
  </div>
</nav>


  <div class="row">
	<div class="col-lg-2">
	<div class="centralPannels">
	  <h3><p>Authors</p></h3>
      <br/>
	  <p><a class="link">Dante Alighieri</a></p>
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
    <div class="col-lg-2">
      <div class="panel panel-primary" >
        <div class="panel-heading"><span class="price" id="price1">$ 10.99</span></div>
        <div class="panel-body"><img src="img/ADivinaComedia_ILUSTRADA_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer" >
			<p id="product1Name" class="productName">Dante Alighieri - A Divina Comedia</p>
			<a onclick="addToCart('1')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant1',document.getElementById('productQuant1').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant1',document.getElementById('productQuant1').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant1" value="0"/>		
		</div>
      </div>
    </div>
    <div class="col-lg-2"> 
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price2">$ 10.99</span></div>
        <div class="panel-body"><img src="img/Antigona_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
          <div class="panel-footer">
			<p id="product2Name" class="productName">Sofocles - Antigona</p>
			<a onclick="addToCart('2')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant2',document.getElementById('productQuant2').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant2',document.getElementById('productQuant2').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant2" value="0"/>		
		</div>
      </div>
    </div>
    <div class="col-lg-2"> 
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price3">$ 10.99</span></div>
        <div class="panel-body"><img src="img/DomCasmurro_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product3Name" class="productName">Machado de Assis - Dom Casmurro</p>
			<a onclick="addToCart('3')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant3',document.getElementById('productQuant3').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant3',document.getElementById('productQuant3').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant3" value="0"/>		
		</div>
      </div>
    </div>
	<div class="col-lg-2"> 
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price4">$ 10.99</span></div>
        <div class="panel-body"><img src="img/EdipoEmColono_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
          <div class="panel-footer">
			<p id="product4Name" class="productName">Sofocles - Edipo em Colono</p>
			<a onclick="addToCart('4')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant4',document.getElementById('productQuant4').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant4',document.getElementById('productQuant4').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant4" value="0"/>		
		</div>
      </div>
    </div>
	<div class="col-lg-2"> 
		<div class="centralPannels">
			<h3><p>How to Read</p></h3>
			<p>Read on your computer, cellphone or dedicate devices like eReaders. Check out bellow:</p>
			</br>
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
<br>

    
  <div class="row">
	<div class="col-lg-2">
	
	</div>
    <div class="col-lg-2">
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price5">$ 9.99</span></div>
        <div class="panel-body"><img src="img/EdipoRei_capa3.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product5Name" class="productName">Sofocles - Edipo Rei</p>
			<a onclick="addToCart('5')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant5',document.getElementById('productQuant5').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant5',document.getElementById('productQuant5').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant5" value="0"/>		
		</div>
      </div>
    </div>
    <div class="col-lg-2"> 
      <div class="panel panel-primary" >
        <div class="panel-heading"><span class="price" id="price6">$ 9.99</span></div>
        <div class="panel-body"><img src="img/Hamlet_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product6Name" class="productName">Shakespeare - Hamlet</p>
			<a onclick="addToCart('6')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant6',document.getElementById('productQuant6').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant6',document.getElementById('productQuant6').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant6" value="0"/>		
		</div>
      </div>
    </div>
    <div class="col-lg-2"> 
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price7">$ 9.99</span></div>
        <div class="panel-body"><img src="img/Helena_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product7Name" class="productName">Machado de Assis - Helena</p>
			<a onclick="addToCart('7')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant7',document.getElementById('productQuant7').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant7',document.getElementById('productQuant7').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant7" value="0"/>		
		</div>
      </div>
    </div>
	<div class="col-lg-2"> 
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price8">$ 9.99</span></div>
        <div class="panel-body"><img src="img/Iaia_Garcia_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product8Name" class="productName">Machado de Assis - Iaia Garcia</p>
			<a onclick="addToCart('8')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant8',document.getElementById('productQuant8').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant8',document.getElementById('productQuant8').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant8" value="0"/>		
		</div>
      </div>
    </div>
	<div class="col-lg-2"> 
		
    </div>
  </div>
  
    <div class="row">
	<div class="col-lg-2">
	
	</div>
    <div class="col-lg-2">
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price9">$ 8.99</span></div>
        <div class="panel-body"><img src="img/Macbeth_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product9Name" class="productName">Shakespeare - Macbeth</p>
			<a onclick="addToCart('9')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant9',document.getElementById('productQuant9').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant9',document.getElementById('productQuant9').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant9" value="0"/>		
		</div>
      </div>
    </div>
    <div class="col-lg-2"> 
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price10">$ 8.99</span></div>
        <div class="panel-body"><img src="img/MemoriasPostumasdeBrasCubas_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product10Name" class="productName">Machado de Assis - Memorias Postumas de Bras Cubas</p>
			<a onclick="addToCart('10')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant10',document.getElementById('productQuant10').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant10',document.getElementById('productQuant10').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant10" value="0"/>		
		</div>
      </div>
    </div>
    <div class="col-lg-2"> 
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price11">$ 8.99</span></div>
        <div class="panel-body"><img src="img/ReiLear_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product11Name" class="productName">Shakespeare - Rei Lear</p>
			<a onclick="addToCart('11')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant11',document.getElementById('productQuant11').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant11',document.getElementById('productQuant11').value)"><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant11" value="0"/>		
		</div>
      </div>
    </div>
	<div class="col-lg-2"> 
      <div class="panel panel-primary"  >
        <div class="panel-heading"><span class="price" id="price12">$ 8.99</span></div>
        <div class="panel-body"><img src="img/RomeueJulieta_capa.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
         <div class="panel-footer">
			<p id="product12Name" class="productName">Shakespeare - Romeu e Julieta</p>
			<a onclick="addToCart('12')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cartUpdate"><span class="glyphicon glyphicon-shopping-cart"></span> Update Cart</a> 
			<button type="button" class="btn btn-default btn-sm" onclick="plusOne('productQuant12',document.getElementById('productQuant12').value)"><span class="glyphicon glyphicon-plus"></span></button>
			<button type="button" class="btn btn-default btn-sm" onclick="minusOne('productQuant12',document.getElementById('productQuant12').value)" ><span class="glyphicon glyphicon-minus"></span></button>
			<input type="text" class="quantity" id="productQuant12" value="0"/>		
		</div>
      </div>
    </div>
	<div class="col-lg-2"> 
		
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="cartUpdate" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><p>Shopping Cart Updated!</p></h4>
        </div>
        <div class="modal-body">
          <p id="itemAddedToCart"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
<br>
<br><br>

<?php include 'footer.php';?>

<form action="checkOutPage.php" method="post" id="sendContent" >
	<input id="sessionInfo" name="sessionInfo" type="text" style="display: none" value="teste"/>
	
</form>
</body>
</html>
