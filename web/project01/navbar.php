<?php
echo "  <!-- Navigation-->
  <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark fixed-top\" id=\"mainNav\">
    <a class=\"navbar-brand\" href=\"index.php\">Crypto Currencies Trader</a>
    <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
      <ul class=\"navbar-nav navbar-sidenav\" id=\"exampleAccordion\">
        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"introPage\">
          <a class=\"nav-link\" href=\"index.php\">
            <i class=\"fa fa-exclamation-circle\"></i>
            <span class=\"nav-link-text\">Intro Page</span>
          </a>
        </li>
        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Crypto Currencies\">
          <a class=\"nav-link\" href=\"cryptoCurrencies.php\">
            <i class=\"fa fa-diamond\"></i>
            <span class=\"nav-link-text\">Crypto Currencies</span>
          </a>
        </li>
        <li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Prices\">
          <a class=\"nav-link\" href=\"prices.php\">
            <i class=\"fa fa-money\"></i>
            <span class=\"nav-link-text\">Prices</span>
          </a>
        </li>
		<li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Trading\">
          <a class=\"nav-link\" href=\"trading.php\">
            <i class=\"fa fa-line-chart\"></i>
            <span class=\"nav-link-text\">Trading</span>
          </a>
        </li>
		<li class=\"nav-item\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"History\">
          <a class=\"nav-link\" href=\"history.php\">
            <i class=\"fa fa-navicon\"></i>
            <span class=\"nav-link-text\">History</span>
          </a>
        </li>
      </ul>
	  
	  
      <ul class=\"navbar-nav sidenav-toggler\">
        <li class=\"nav-item\">
          <a class=\"nav-link text-center\" id=\"sidenavToggler\">
            <i class=\"fa fa-fw fa-angle-left\"></i>
          </a>
        </li>
      </ul>
      <ul class=\"navbar-nav ml-auto\"> 
        <li class=\"nav-item\">
          <a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#exampleModal\">
            <i class=\"fa fa-fw fa-sign-out\"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>";
?>