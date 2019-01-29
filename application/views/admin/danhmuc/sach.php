<?php $this->load->view('admin/danhmuc/title_sach'); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<?php $this->load->view('admin/message'); ?>
		<div class="title">
			
			<h6>
				Danh sách Sách		</h6>
		 	<div class="num f12">Số lượng: <b><?php echo count($sach); ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter">
				<tr><td colspan="6">
					<form class="list_filter form" action="<?php echo base_url('admin/sach'); ?>" method="get">
						<table cellpadding="0" cellspacing="0" width="80%">
							<tbody>					
							<tr>
								<td class="label" style="width:40px;">
									<label for="filter_id">Tên</label>
								</td>
								<td class="item" style="width:155px;" >
									<input name="name" value="" id="filter_iname" type="text" style="width:155px;" />
								</td>	
								<td style='width:150px'>
								<input type="submit" class="button blueB" value="Lọc" />
								</td>
								
							</tr> 
							</tbody>
						</table>
					</form>
				</tr>
			</thead>
			
			<thead>
				<tr>
					
					<td style="width:60px;">Mã sách</td>
					<td style="width:320px;">Tên sách</td>
					<td style="">Mô tả</td>
					<td style="width:60px;">Giá gốc</td>
					<td style="width:60px;">Giá giảm</td>
					<td style="width:75px;">Mã nxb</td>
					<td style="width:75px;">Mã thể loại</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
							
					     <div class='pagination'>
					     	<?php echo $this-> pagination->create_links(); ?>
   			            </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach ($list as $value) {
				$m=$value['masach']; ?>
		
		       <tr class='row_9'>
					
					
					<td class="textC"><?php echo $value["masach"];?></td>
					
					<td>
						<div class="image_thumb">
							<img  src="<?php echo public_url() ?>products-images/<?php echo $value['urlhinh'];?>" alt="<?php echo $value["tensach"];?>" />
						<div class="clear"></div>
						</div>
						<b><?php echo $value["tensach"];?></b>					
					</td>
					
					<td class="textR">
						<textarea rows="5" cols="40">
							<?php echo $value["mota"];?>
						</textarea>
					</td>

					<td class="textR">
					<?php echo $value["giagoc"];?>
                           				
					</td>

					<td class="textR">
					<?php echo $value["giagiam"];?>
                           				
					</td>
					<td class="textC"><?php echo $value["manxb"];?></td>
					<td class="textC"><?php echo $value["matheloai"];?></td>
					<td class="option textC">
											   						
												
						 <a href="<?php echo base_url('admin/sach/editsach/'.$m); ?>" title="Chỉnh sửa" class="tipS">
							<img src="<?php echo public_url('admin/') ?>images/icons/color/edit.png" alt="Sửa" />
						</a>
						
						<a href="<?php echo base_url('admin/sach/deletesach/'.$m); ?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?php echo public_url('admin/') ?>images/icons/color/delete.png" alt="Xóa" />
						</a>
					</td>
				</tr>	
		        			</tbody>
			<?php } ?>
		</table>
	</div>
	
</div>		<div class="clear mt30"></div>