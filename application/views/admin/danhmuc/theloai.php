<?php $this->load->view('admin/danhmuc/title_theloai'); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<?php $this->load->view('admin/message'); ?>
		<div class="title">
			
			<h6>
				Danh sách Thể loại		</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="6">
				<form class="list_filter form" action="<?php echo base_url('admin/theloai'); ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>	
							<td style='width:150px'>
							<input type="submit" class="button blueB" value="Lọc" />
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</tr></thead>
			
			<thead>
				<?php //$data=$obj->getAll_TL();?>
				<tr>
					
					<td style="width:60px;">Mã thể loại</td>
					<td>Tên thể loại</td>
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
				$m=$value['matheloai']; ?>
		       <tr class='row_9'>
					<td class="textC"><?php echo $value["matheloai"];?></td>
					<td>
					<b><?php echo $value["tentheloai"];?></b>
					</td>
					<td class="option textC">
											   						
						 <a href="<?php echo base_url('admin/theloai/edittheloai/'.$m); ?>" title="Chỉnh sửa" class="tipS">
							<img src="<?php echo public_url('admin/') ?>images/icons/color/edit.png" alt="Chỉnh sửa" />
						</a>
						
						<a href="<?php echo base_url('admin/theloai/deletetheloai/'.$m); ?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?php echo public_url('admin/') ?>images/icons/color/delete.png" alt="Xóa" />
						</a>
					</td>
				</tr>	
		        			</tbody>
			<?php } ?>
		</table>
	</div>
	
</div>		<div class="clear mt30"></div>