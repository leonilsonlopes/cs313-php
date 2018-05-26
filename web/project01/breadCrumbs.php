<?php
echo "
  <div class=\"content-wrapper\">
    <div class=\"container-fluid\">
	<!-- Breadcrumbs-->
      <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item\">
          <a href=\"index.php\">Intro Page</a>
        </li>
        <li class=\"breadcrumb-item active\">" . getPageName() . "</li>
      </ol>";
	  
function getPageName() {
    $fileName = basename($_SERVER['PHP_SELF']);
	
	if($fileName == "cryptoCurrencies.php")
		return "Crypto Currencies";
	
	if($fileName == "prices.php")
		return "Prices";
	
	if($fileName == "trading.php")
		return "Trading";
	
	if($fileName == "history.php")
		return "History";
}
?>