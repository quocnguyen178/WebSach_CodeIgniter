<div class="topNav">
	<div class="wrapper">
		<div class="welcome">
			<?php if(isset($user_admin_login)) { ?>
			<span>Xin chào: <b><?php echo $user_admin_login->taikhoan;  ?></b></span>
			<?php }?>
		</div>
		
		<div class="userNav">
			<ul>
				<li><a href="" target="_blank">
					<img style="margin-top:7px;" src="<?php echo public_url('admin/'); ?>images/icons/light/home.png" alt="Trang chủ" />
					<span>Trang chủ</span>
				</a></li>
				
				<!-- Logout -->
				<li><a href="<?php echo base_url('login/logout'); ?>">
					<img src="<?php echo public_url('admin/'); ?>images/icons/topnav/logout.png" alt="Đăng xuất" />
					<span>Đăng xuất</span>
				</a></li>
				
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>