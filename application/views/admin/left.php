
	<div id="leftSide" style="padding-top:30px;">
	
	    <!-- Account panel -->
		
	<div class="sideProfile">
	<a href="#" title="" class="profileFace"><img width="40" src="<?php echo public_url('admin/') ?>images/user.png" alt="Ảnh đại diện" /></a>
	<span>Xin chào: <strong>admin!</strong></span>
	<?php if(isset($user_admin_login)) { ?>
	<span><?php echo $user_admin_login->taikhoan;  ?></span>
	<?php } ?>
	<div class="clear"></div>
	</div>
	<div class="sidebarSep"></div>		    
		    <!-- Left navigation -->
		
	<ul id="menu" class="nav">

			
			<li class="tran">
		
			<a href="" class=" exp" >
				<span>Quản lý bán hàng</span>
				<strong>2</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="">Giao dịch	</a>
						</li>
											<li >
							<a href="">Đơn hàng sản phẩm							</a>
						</li>
									</ul>
						
		</li>
		<li class="product">
		
			<a href="" class=" exp" >
				<span>Danh mục</span>
				<strong>4</strong>
			</a>
			
			<ul class="sub">
				<li >
					<a href="<?php echo base_url('admin/sach/') ?>">Sách							</a>
				</li>
				<li >
					<a href="<?php echo base_url('admin/theloai/') ?>">Thể loại							</a>
				</li>
				
				<li >
					<a href="<?php echo base_url('admin/tacgia/') ?>">Tác giả							</a>
				</li>
				<li >
					<a href="<?php echo base_url('admin/nhaxuatban/') ?>">Nhà Xuất Bản							</a>
				</li>
			</ul>
						
		</li>
			<li class="account">
		
			<a href="" class=" exp" >
				<span>Tài khoản</span>
				<strong>1</strong>
			</a>
				<ul class="sub">
					<li >
					<a href="">		Thành viên							</a>
					</li>
				</ul>		
		</li>
			
			
</ul>
		
	</div>
	<div class="clear"></div>
