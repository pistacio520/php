<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>成功的上传了</h1>
	  <?php foreach($upload_data as $d=>$s): ?>
			<?php echo ' <p>'.$d.':'.$s.'</p> '; ?>
	  <?php endforeach ?>
</body>
</html>