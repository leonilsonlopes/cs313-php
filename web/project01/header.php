<?php
echo "<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">
  <title>CS313 - Project01 - Crypto Trader</title>
  <!-- Bootstrap core CSS-->
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js\"></script>
  <link href=\"vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
  <!-- Custom fonts for this template-->
  <link href=\"vendor/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
  <!-- Custom styles for this template-->
  <link href=\"css/sb-admin.css\" rel=\"stylesheet\">
  
  	<script>
	$('#currencies').on('click', 'tbody tr', function(event) {
  $(this).addClass('highlight').siblings().removeClass('highlight');
});
	</script>
	<style>
	.table tbody tr.highlight td {
  background-color: #ddd;
}
	</style>
  
</head>";
?>