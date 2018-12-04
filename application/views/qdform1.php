<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FORM</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link rel="stylesheet" href=" <?php echo base_url(); ?>style/bootcss/css/normalize8.css "> 
	<link rel="stylesheet" href=" <?php echo base_url(); ?>style/bootcss/css/bootstrap.min.css">

	<style>
	
		.bs-example p{
			padding:15px;
		}
		 
	</style>
</head>

<body style="padding-top:70px;">

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="" class="navbar-brand">Brand</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href=""><span class="glyphicon glyphicon-home"></span> 首页</a></li>
				<li><a href=""><span class="glyphicon glyphicon-pencil"></span> 数据录入</a></li>
				<li><a href=""><span class="glyphicon glyphicon-search"></span> 数据查询</a></li>
				<li><a href=""><span class="glyphicon glyphicon-adjust"></span> 数据比对</a></li>
				<li><a href="">说明</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<form action="" class="form-inline">
				<div class="form-group">
					<label for="">name</label>
					<input type="text" class="Form-control">
				</div>
				<div class="form-group">
					<label for="">name</label>
					<input type="text" class="Form-control">
				</div>
				<button type="submit" class="btn btn-default">Send</button>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input type="text" name="" id="" class="form-control" placeholder="Amount">
				<div class="input-group-addon">.00</div>
			</div>
			<button class="btn btn-primary">submit</button>
			</form>

			<div class="form-group has-success has-feedback">
				<label for="" class="control-label sr-only">Hidden label</label>
				<input type="text" class="form-control">
				<span class="glyphicon glyphicon-ok form-control-feedback"></span>
				<span class="sr-only">(success)</span>
			</div>
			<p class="text-muted">Fusce dapibus,tellus ac cursus commodo,tortor mauris nibh.</p>
			<p class="text-primary">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			<p class="text-success">Duis mollis, est non commodo luctus,nisi erat portitor ligula</p>
			<p class="text-info">Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
			<p class="text-warning">Etlam porta sem malesuada magna mollis euismod.</p>
			<p class="text-danger">Donec ullamcorper hulla non metus auctor fringilla.</p>

			<div class="bs-example">
			<p class="bg-primary">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			<p class="bg-success">Duis mollis, est non commodo luctus,nisi erat portitor ligula</p>
			<p class="bg-info">Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
			<p class="bg-warning">Etlam porta sem malesuada magna mollis euismod.</p>
			<p class="bg-danger">Donec ullamcorper hulla non metus auctor fringilla.</p>
			</div>
			<div class="bs-callout">
				<p class="bg-primary">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			</div>

			<form action="" class="form-horizontal">
				<div class="form-group form-group-lg">
					<label for="" class="col-sm-2 control-label">Large label</label>
					<div class="col-sm-10">
						<input type="text" class="form-control">
					</div>
				</div>
                <div class="form-group form-group-sm">
                	<label for="" class="col-sm-2 control-label">Small label</label>
                	<div class="col-sm-10"><input type="text" class="form-control"></div>
                </div>
                <a href="" class="btn btn-default" role="button">link</a>
                <button class="btn btn-default">Button</button>
                <input type="button" class="btn btn-default" value="Input">
			</form>
			<img data-src="holder.js/300x200">
			<img data-src="custom.holder/150x100?theme=custom&auto=yes" style="width:300px;height:200px">
			<img src="holder.js/300x200?auto=yes&bg=00AEEF&text=Add image">
		</div>
	</div>
	<script src="<?php echo base_url(); ?>style/js/holder.min.js"></script>
	<script>
		Holder.run();
		Holder.addTheme("custom", {foreground: "#fff", background: "#000", size: 15}).run({
			domain: "custom.holder",
			renderer: "canvas"
		});
		Holder.addImage("holder.js/300x200?theme=sky", "#thumb1");
	</script>
	</body>
	</html>