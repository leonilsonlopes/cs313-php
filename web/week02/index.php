<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>CS313 - Leonilson Lopes Intro Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="basicStyle.css"><!-- External style --> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	
	
</script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="assignments.html">Go to CS313 Assignments Page</a>
	  <div id="timestamp">
		<?php echo date('Y-m-d H:i:s'); ?>
		</div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#who" data-toggle="tooltip" data-placement="bottom" title="Discover who I am">WHO</a></li>
        <li><a href="#what" data-toggle="tooltip" data-placement="bottom" title="Discover what I do">WHAT</a></li>
        <li><a href="#where" data-toggle="tooltip" data-placement="bottom" title="Discover where to find me">WHERE</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div id="who" class="container-fluid bg-1 text-center">
  <h3 class="margin">Who Am I?</h3>
  <img src="img/moroni.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3>Leonilson Lopes, a Brazilian living in Portugal and taking a BS in Software Engineering in United States!</h3>
</div>

<!-- Second Container -->
<div id="what" class="container-fluid bg-2 text-center">
  <h3 class="margin">What Am I?</h3>
  <p>I'm a husband and a father. In other moments I'm a Specialist in Identity And Access Management (an IT Security Domain) and the Security Infrasctructure Team Manager. I work for Natixis bank in Portugal.</p>
</div>

<!-- Third Container (Grid) -->
<div id="where"class="container-fluid bg-3 text-center">    
  <h3 class="margin">Where To Find Me?</h3><br>  
  <div class="row">
    <div class="col-sm-4">
      <p>I live in Porto - Portugal.</p>
      <img src="img\LeonilsonPorto.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
	<div class="col-sm-4">
      <p>My currently GMT is +1. I'm usually ready for studies after 21:30</p>
      <img src="img\pt-10.png" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
	<div class="col-sm-4">
      <p>I'm usually ready for studies after 21:30</p>
      <img src="img\ClockAt930.png" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>CS313 Leonilson Lopes Intro Page</p> 
</footer>

</body>
</html>

