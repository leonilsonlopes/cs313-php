<?php
echo "<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">
  <title>CS313 - Project01 - Crypto Trader</title>
  <!-- Bootstrap core CSS-->
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
  <link href=\"vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
  <!-- Custom fonts for this template-->
  <link href=\"vendor/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
  <!-- Custom styles for this template-->
  <link href=\"css/sb-admin.css\" rel=\"stylesheet\">
  <link href=\"https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css\" type=\"text/css\">
  
  	<script>
$(document).ready(function() {
    var table = $('#currencies').DataTable();
 
    $('#currencies tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
} );
	</script>
	<style>
	.table tbody tr.highlight td {
  background-color: #ddd;
}
	</style>
  
</head>";
?>