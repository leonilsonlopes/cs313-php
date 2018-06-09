<?php
function showAlert($message, $strong, $type){
	//Type= for green alert: success
	//      for red alert: danger
echo"<br/><div class=\"alert alert-" . $type . " alert-dismissible\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" >&times;</a>
		<strong>" . $strong . "</strong> " . $message . "
	</div>";
}

							
?>