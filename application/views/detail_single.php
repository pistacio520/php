<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/normalize8.css"> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/common.css">
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootcss/css/<?php echo $title; ?>.css"> -->
	<script src="<?php echo base_url(); ?>style/jquery/jquery.js"></script>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr><td colspan="2"  style="text-align:left;"><h3>印章系统显示资料</h3></td></tr>
		<tr>
			<td>申请人</td>
			<td><?php echo $c['applicant'];?></td>
		</tr>
		<tr>
			<td>联系方式</td>
			<td><?php echo $c['phone']; ?></td>
		</tr>
		<tr>
			<td>用印类型</td>
			<td><?php echo $c['typename']; ?></td>
		</tr>
		<tr>
			<td>oa文件</td>
			<td><a href="<?php echo $oa['file_web'];?>"><?php echo $c['oamd5']; ?></a></td>
		</tr>
		<tr>
			<td>pdf文件</td>
			<td><a href="<?php echo $pdf['file_web'];?>"><?php echo $c['pdfmd5']; ?></a></td>
		</tr>
         <tr>
         	<td>关键词</td>
         	<td><?php
         			foreach($k as $v){
         		         echo  '<span class="keywords">'.$v[0].":".$v[1].'</span><br/>';
         			}
         	 ?></td>
         </tr>
         <tr><td>相关备注</td>
			  <td><?php echo $c['textbak']; ?></td>
         </tr>
         <tr>
         	<td>生成时间</td>
         	<td><?php echo date('Y-m-d h:m',$c['createtime']); ?></td>
         </tr>
	</table>
	<a href="<?php echo site_url('seal/index') ?>" class="btn btn-default">返回首页</a>
</div>
