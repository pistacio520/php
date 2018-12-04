
	<div class="container">
	<div class="row">
		<h2>资料登记</h2>
		<div class="content">
		<form action="<?php echo site_url('seal/reginfo'); ?>" class="form-inline" method="POST">
				<input id="zid" name="zid" type="hidden" value="<?php echo $zid; ?>">
					<div class="form-group">
						<label>用印类型</label>
						<select name="tid" class="form-control">
						<?php foreach($type as $v): ?>
							<option value="<?php echo $v['id']; ?>"><?php echo $v['typename'] ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				<div class="form-group">
					<label>申请人</label>
					<input type="text" name="applicant" datatype="s2-20" class="form-control" placeholder="申请人">

				</div>

				<div class="form-group">
					<label>手机号</label>
					<input type="text" name="phone" datatype="m" class="form-control" placeholder="手机号">
				</div>
				<div class="form-group">
					<label>概要</label>
					<input type="text" name="description" datatype="s4-200" class="form-control" placeholder="概要">
				</div>
				<div class="form-group">
					<label>OA截图</label>
					<input id='oafile' type="file" name="oafile" class="form-control">
					<label for="">文件md5</label><input datatype="s0-32" class="form-control" type="text" value=""  id="oamd5" name="oamd5" readonly>
					<div class="progressBar">
					<span></span>
					</div>
				</div>
				<div class="form-group">
					<label>盖章扫描件</label>
					<input id='pdffile' type="file" name="pdffile" class="form-control">
					<label for="">文件md5</label><input  datatype="s0-32"
          class="form-control" type="text" value="" id="pdfmd5"  name="pdfmd5" readonly>
					<div class="progressBar">
					<span></span>
					</div>
				</div>
				<div class="form-group">
					<label for="">关键词</label>
					<textarea name="keywords" datatype="*" ignore="ignore" cols="125" rows="10" >关键词表示方式为：单组为名称：值，多组以‘-’隔开</textarea>
				</div>
				<div class="form-group">
					<label for="">相关备注</label>
					<textarea name="textbak" datatype="*" ignore="ignore" cols="125" rows="10" >相关备注</textarea>
				</div>
				<div class="form-group">
					<label for=""></label><button class="btn btn-info btn-lg">提交</button>
				</div>
				
			</form>
			<span class="error"></span>	
			</div>
			</div>			
	</div>

<script src="<?php echo base_url(); ?>style/js/Validform_min.js"></script>
<script src="<?php echo base_url(); ?>style/js/alert.js"></script>
<script src="<?php echo base_url(); ?>style/js/inputpage.js"></script>

<script>
  $('.form-inline').Validform();
</script>