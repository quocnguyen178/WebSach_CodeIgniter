<table cellpadding="0" cellspacing="0" border="1" width="100%" class="sTable mTable myTable" id="checkAll">
			
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
					<td style="width:75px;">Tên nxb</td>
					<td style="width:75px;">Mã thể loại</td>
					<td style="width:75px;">Tên thể loại</td>
					
					
					<td style="width:75px;">Mã tác giả</td>
					<td style="width:75px;">Tên tác giả</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
							
					     <div class='pagination'>
					     	<?php //echo $this-> pagination->create_links(); ?>
   			            </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php $i=0; ?>
				<?php foreach ($list as $value) { $i=1;
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
					<?php echo number_format($value["giagoc"]);?>
                           				
					</td>

					<td class="textR">
					<?php echo number_format($value["giagiam"]);?>
                           				
					</td>
					<td class="textC"><?php echo $value["manxb"];?></td>
					<td class="textC"><?php echo $value["tennxb"]; ?></td>
					<td class="textC"><?php echo $value["matheloai"];?></td>
					<td class="textC"><?php echo $value["tentheloai"]; ?></td>
					
					
					<td class="textC"><?php echo $value["matacgia"]; ?></td>
					<td class="textC"><?php echo $value["tentacgia"]; ?></td>
					
				</tr>	
		        			</tbody>
			<?php } ?>
		</table>