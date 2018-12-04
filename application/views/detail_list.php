
<div class="container">
		<div class="row">
			<h2>详细列表</h2>
			<div class="header">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
							<th>序号</th>
							<th>联系人</th>
							<th>联系方式</th>
							<th>印章类型</th>
							<th>概要内容</th>
							<th>oa扫描件</th>
							<th>pdf扫描件</th>
							<th>二维码</th>
							<th>操作</th>
							<th>日期</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($content as $v): ?>
							<tr>
							<td><?php echo $num++; ?></td>
							<td><?php echo $v['applicant']; ?></td>
							<td><?php echo $v['phone']; ?></td>
							<td><?php echo $v['typename'] ?></td>
							<td><a href="<?php echo site_url('seal/detail_single').'/'.$v['zid'];?>"><?php echo $v['description']; ?></a> </td>
							<td><a href="<?php echo site_url('seal/getdownfile').'/'.$v['oamd5'];?>"><?php echo $v['oamd5']; ?></a></td>
							<td><a href="<?php echo site_url('seal/getdownfile').'/'.$v['pdfmd5'];?>"><?php echo $v['pdfmd5']; ?></td>
							<td><?php
								 if ($v['qrcode']=="") {
								      echo "未生成";
								 }else{
									 echo "<a href='/".$v['qrcode']."'>已生成</a>";  }?></td>
								<td><a href="<?php echo site_url('seal/reganerate').'/'.$v['zid'] ?>" class="btn btn-sm btn-primary">重新生成</a></td>
							<td><?php echo  date('Y-m-d h:i',$v['createtime']); ?></td>
						</tr>
						</tbody>
					<?php endforeach ?>
					<tfoot>
						<tr>
							<td colspan="10"><?php echo $links; ?></td>
						</tr>
					</tfoot>
					</table>
		
			</div>
			</div>
	</div>  <!-- rowend -->
</div>   <!-- containerend -->

