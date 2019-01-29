<?php $this->load->view('admin/danhmuc/title_nhaxuatban'); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<div class="title">
			<h6>Cập nhật nhà xuất bản</h6>
		</div>
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="formRow">
				<label class="formLeft" for="param_name">Mã nhà xuất bản:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="tennxb" id="param_name" _autocheck="true" type="text" disabled value="<?php echo $info['manxb']; ?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label class="formLeft" for="param_name">Tên nhà xuất bản:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="tennxb" id="param_name" _autocheck="true" type="text" value="<?php echo $info['tennxb']; ?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"><?php echo form_error('tennxb'); ?></div>
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