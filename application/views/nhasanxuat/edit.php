<form method="post" action="">
	Tên:<input type="text" name="tennsx" value="<?php echo isset($nhaxuatban['tennxb'])?$nhaxuatban['tennxb']:''; ?>" /><br />
	Alias:<input type="text" name="alias" value="<?php echo isset($nhaxuatban['manxb'])?$nhaxuatban['manxb']:''; ?>" /><br />
	<input type="submit" name="add" value="add" />
	
</form>