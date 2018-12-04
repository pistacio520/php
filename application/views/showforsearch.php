<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Access-Control-Allow-Orgin" content="*">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/style/bootcss/css/bootstrap.min.css">
	<title>首页</title>
</head>
<body>
	<form action="<?php echo site_url('test/showforsearch')?>">
		<input type="text" name="k" >
		<input type="hidden" name="per_page" value="0">
		<button class="button-small">探索</button>
	</form>
	<table class="table">
		<tr>
			<th>id</th>
			<th>guid</th>
			<th>pname</th>
			<th>phone</th>
			<th>sex</th>
			<th>time</th>
		</tr>
		<?php foreach($content as $v): ?>
			<tr>
			<th><?php echo $v['Id']; ?></th>
			<th><?php echo $v['guid']; ?></th>
			<th><?php echo $v['pname']; ?></th>
			<th><?php echo $v['phone']; ?></th>
			<th><?php echo ($v['sex']?'男':'女'); ?></th>
			<th><?php echo  date('Y-m-d',$v['time']); ?></th>
		</tr>
	<?php endforeach ?>
	</table>
	
		<?php echo $links; ?>
	
	
</body>
</html>