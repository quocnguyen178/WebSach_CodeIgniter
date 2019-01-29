<?php $this->load->view('admin/danhmuc/title_theloai'); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<div class="title">
			<h6>Cập nhật thể loại</h6>
		</div>
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="formRow">
				<label class="formLeft" for="param_name">Mã thể loại:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="matheloai" id="param_name" _autocheck="true" type="text" disabled value="<?php echo $info['matheloai']; ?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label class="formLeft" for="param_name">Tên thể loại:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="tentheloai" id="param_name" _autocheck="true" type="text" value="<?php echo $info['tentheloai']; ?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('tentheloai'); ?></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formSubmit">
       			<input type="submit" value="Cập nhật" class="redB" />
       		</div>
    		<div class="clear"></div>
		</fieldset>
	</form>
	</div>

</div>