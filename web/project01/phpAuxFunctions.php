<?php
function redAlert($message, $strong){
echo"<br/><div class=\"alert alert-danger alert-dismissible\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" >&times;</a>
		<strong>" . $strong . "</strong> " . $message . "
	</div>";
}
								
?>