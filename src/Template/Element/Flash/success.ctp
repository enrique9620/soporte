<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" onclick="this.classList.add('hidden')">
	<?php
	// '<div class="alert alert-success">
	//   <strong>'.$message.'</strong>.
	// </div>'; 
	?>
		
</div>
<script type="text/javascript">
	//alert('ok');
	$.Notify({
	    caption: 'Realizado',
	    content: <?php echo "'".$message."'" ?>,
	    type: 'success',
	    keepOpen: true
	});
	console.log('ok');
</script>
