<div style="width:90%; margin:90px 20px auto;">
<form action="<?php echo site_url('seal/qd') ?>" class="form form-inline">
	<div class="form-group">
		<label for="">关键字</label>
		<input type="text" placeholder="" class="form-control" name="keywords" datatype="s1-300" ignore="ignore" errormsg="请输入关键字">
	</div>
	<div class="form-group">
		<label for="">自定义时间</label>
		<input type="text" plugin="datepicker"  class="form-control" name="startDate"  id="startDate" >
		到
		<input type="text" plugin="datepicker" class="form-control" name="endDate"  id="endDate">
	</div>
	<button class="btn btn-default" id="btn_sub">搜索</button>
</form>
</div>

	<div style="width:90%;margin:20px auto;" class="tablebox">
	
			<div class="table-responsive ">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>序号</th>
							<th>联系人</th>
							<th>联系方式</th>
							<th>概要内容</th>
							<th>oa扫描件</th>
							<th>pdf扫描件</th>
							<th>二维码</th>
							<th>操作</th>
							<th>日期</th>
						</tr>
						</thead>
						<tbody>
						<?php if(isset($content)){
							echo "kkk";
						} ?>
						<?php foreach($content as $v):?>
							<tr>
							<td><?php echo $num++; ?></td>
							<td><?php echo $v['applicant']; ?></td>
							<td><?php echo $v['phone']; ?></td>
							<td><a href="<?php echo site_url('seal/detail_single').'/'.$v['zid'];?>"><?php echo $v['description']; ?></a> </td>
							<td><a href="<?php echo site_url('seal/getdownfile').'/'.$v['oamd5'];?>"><?php echo $v['oamd5']; ?></a></td>
							<td><a href="<?php echo site_url('seal/getdownfile').'/'.$v['pdfmd5'];?>"><?php echo $v['pdfmd5']; ?></td>
							<td><?php
								 if ($v['qrcode']=="") {
								      echo "未生成";
								 }else{
									 echo "<a href='/".$v['qrcode']."'>已生成</a>";  }?></td>
								<td><a href="<?php echo site_url('seal/reganerate').'/'.$v['zid'] ?>" class="btn btn-sm btn-info">重新生成</a></td>
							<td><?php echo  date('Y-m-d h:i',$v['createtime']); ?></td>
						</tr>
					<?php endforeach ?>
			
					</tbody>
					</table>
	
	
			</div>
	<?php echo $links; ?>

	</div>   <!-- containerend -->
<script src="<?php echo base_url(); ?>style/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/Validform_min.js"></script>
<script>
  $('.form-inline').Validform();
$('#startDate').datepicker({
    yearRange:'1930:2030',
    dateFormat:'yy-mm-dd',
    onSelect: function (dateText, inst) {
        $("#endDate").datepicker("option", "minDate", new Date(dateText.replace("-", "-")));
    }
});
$('#endDate').datepicker({
    yearRange:'1930:2030',
    dateFormat:'yy-mm-dd',
    onSelect: function (dateText, inst) {
        $("#startDate").datepicker("option", "maxDate", new Date(dateText.replace("-", "-")));
    }
});
$('#startDate').datepicker( 'setDate' , '<@s.property value="carApplication.startTime"/>');
$('#endDate').datepicker( 'setDate' ,'<@s.property value="carApplication.endTime"/>');


</script>