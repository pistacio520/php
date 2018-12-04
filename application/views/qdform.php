<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FORM</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link rel="stylesheet" href=" <?php echo base_url(); ?>style/bootcss/css/normalize8.css "> 
	<link rel="stylesheet" href=" <?php echo base_url(); ?>style/bootcss/css/bootstrap.min.css">
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
			<form action="">
				<div class="form-group has-feedback has-success">
					<label for="">Email address</label>
					<input type="email" class="form-control" placeholder="Email">
					<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				</div>
				<div class="form-group has-feedback has-warning">
					<label for="">Password</label>
					<input type="password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
				</div>
				<div class="form-group has-feedback has-error">
					<label for="">Num</label>
					<input type="number" class="form-control" placeholder="number">
					<span class="glyphicon glyphicon-repeat form-control-feedback" aria-hidden="true"></span>
				</div>
				<div class="form-group">
					<label for="">Date</label>
					<input type="date" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Input file</label>
					<input type="file" class="form-control">
					<p class="help-block">Example block-level help text here.</p>
				</div>
				<div class="form-group">
					<label for="">Input color</label>
					<input type="color" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Input image</label>
					<input type="image" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Input datetime</label>
					<input type="datetime" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Input week</label>
					<input type="week" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Input Month</label>
					<input type="Month" class="form-control">
				</div>			
				<div class="checkbox">
				<label for="">
					<input type="checkbox">check me outs
				</label>
				</div>
				<div class="radio">
				<label for="">
					<input type="radio">check me outs
				</label>
				</div>
				<button type="submit" class="btn btn-default">submit</button>
			</form>
		</div>
	</div>



