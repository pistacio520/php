<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>style/jquery/jquery.js"></script>
	<title>跳转页</title>
</head>
<body>
	
</body>
<script src="<?php echo base_url(); ?>style/js/alert.js"></script>
<script>
	(function(){
		g_alert("<?php echo $type; ?>","<?php echo $msg; ?>","<?php echo $url; ?>");
	})();
</script>
</html>