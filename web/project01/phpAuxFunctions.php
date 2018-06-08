<?php
function redAlert($message, $strong){
echo"<div class=\"alert alert-danger alert-dismissible\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" onclick=\"javascript:$(\'form\').submit();\">&times;</a>
		<strong>" . $strong . "</strong> " . $message . "
	</div>";
}
								
?>