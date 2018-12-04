<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/normalize8.css"> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/common.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/responsive-nav.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/<?php echo $title; ?>.css">
	<script src="<?php echo base_url(); ?>style/jquery/jquery.js"></script>
	<script src="<?php echo base_url(); ?>style/js/responsive-nav.min.js"></script>
	<style>
		.error{
			color:red;
		}
	</style>

	<title><?php echo $title_c; ?>----<?php echo $title ?></title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<a href="" class="navbar-brand">Seal Mix Qrcode</a>
			</div>
			<div id="nav">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo site_url('seal/index'); ?>"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
				<li  <?php if ($showcode==1) echo "class='active'";?> ><a href="<?php echo site_url('seal/inputpage'); ?>"><span class="glyphicon glyphicon-pencil"></span> 数据录入</a></li>
				<li <?php if ($showcode==2) echo "class='active'";?>><a href="<?php echo site_url('seal/detail_list'); ?>"><span class="glyphicon glyphicon-th-list"></span> 数据浏览</a></li>
				<li <?php if ($showcode==3) echo "class='active'";?>><a href="<?php echo site_url('seal/checkmd5'); ?>"><span class="glyphicon glyphicon-adjust"></span> 数据比对</a></li>
				<li <?php if ($showcode==4) echo "class='active'";?>><a href="<?php echo site_url('seal/datasearchview'); ?>"><span class="glyphicon glyphicon-search"></span> 数据搜索</a></li>
				
			</ul>
			</div>
		</div>
	</nav>