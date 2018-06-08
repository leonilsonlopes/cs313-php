<?php
function showAlert($message, $strong, $type){
echo"<br/><div class=\"alert alert-" . . " alert-dismissible\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" >&times;</a>
		<strong>" . $strong . "</strong> " . $message . "
	</div>";
}

							
?>