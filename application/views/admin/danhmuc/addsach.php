</script>
<?php $this->load->view('admin/danhmuc/title_sach'); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<div class="title">
			<h6>Thêm mới sách</h6>
		</div>
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="formRow">
				<label class="formLeft" for="param_name">Tên sách:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="tensach" id="param_name" _autocheck="true" type="text" value="<?php echo set_value('tensach'); ?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('tensach'); ?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow">
				<label class="formLeft" for="param_site_title">Mô tả:</label>
				<div class="formRight">
					<span class="oneTwo">
						<textarea name="mota" id="param_site_title" _autocheck="true" rows="4" cols="" value="<?php echo set_value('mota'); ?>"></textarea>
					</span>
					<span name="site_title_autocheck" class="autocheck"></span>
					<div name="site_title_error" class="clear error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow">
				<label class="formLeft" for="param_name">Giá gốc:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="giagoc" id="giagoc" _autocheck="true" type="text" value="<?php echo set_value('giagoc'); ?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" id="giagoc_error" class="clear error"><?php echo form_error('giagoc'); ?></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label class="formLeft" for="param_name">Giá giảm:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="giagiam" id="giagiam" _autocheck="true" type="text" value="<?php echo set_value('giagiam'); ?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" id="giagiam_error" class="clear error"><?php //echo form_error('giagiam'); ?></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label class="formLeft" for="param_name">Mã nhà xuất bản:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo">
						<!--<input name="manxb" id="param_name" _autocheck="true" type="text" value="<?php echo set_value('manxb'); ?>" />-->
						<select name="manxb" id="param_name" _autocheck="true"  >
						  <?php foreach ($listnxb as $key => $value) { ?>
						  	<option value="<?php echo $value['manxb']; ?>"><?php echo $value['tennxb']; ?></option>
						  <?php } ?>
						</select>

					</span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php //echo form_error('manxb'); ?></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label class="formLeft" for="param_name">Mã thể loại:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo">
						<!--<input name="matheloai" id="param_name" _autocheck="true" type="text" value="<?php echo set_value('matheloai'); ?>" />-->
						<select name="matheloai" id="param_name" _autocheck="true" >
						  <?php foreach ($listtl as $key => $value) { ?>
						  	<option value="<?php echo $value['matheloai']; ?>"><?php echo $value['tentheloai']; ?></option>
						  <?php } ?>
						</select>
					</span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('matheloai'); ?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow">
				<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
				<div class="formRight">
					<div class="left"><input type="file"  id="image" name="image"  ></div>
					<div name="image_error" class="clear error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formSubmit">
       			<input type="submit" value="Thêm mới" class="redB" />
       		</div>
    		<div class="clear"></div>
		</fieldset>
	</form>
	</div>

</div>