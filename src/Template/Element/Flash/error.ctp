<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="	" onclick="this.classList.add('hidden');"><?=
	'<div class="alert alert-danger">
	  <strong>'.$message.'</strong>.
	</div>'; ?></div>
