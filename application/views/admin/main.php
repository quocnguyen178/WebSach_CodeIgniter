<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head'); ?>
</head>
<body>
	<div id="left_content">
		<?php $this->load->view('admin/left'); ?>
	</div>
<div id="rightSide">	
	<!-- Account panel top -->
	<?php $this->load->view('admin/header'); ?>
	
	<!-- Content -->
		<?php $this->load->view($temp); ?>
	<!-- -->
		
    <!-- Footer -->
    <?php $this->load->view('admin/footer'); ?>
</div>
	<div class="clear"></div>
</body>
</html>