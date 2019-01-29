<?php $this->load->view('admin/danhmuc/title_tacgia'); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<div class="title">
			<h6>Thêm mới tác giả</h6>
		</div>
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="formRow">
				<label class="formLeft" for="param_name">Tên tác giả:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="tentacgia" id="param_name" _autocheck="true" type="text" value="<?php echo set_value('tentacgia'); ?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('tentacgia'); ?></div>
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