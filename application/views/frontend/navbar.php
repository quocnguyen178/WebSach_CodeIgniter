
  <!-- mobile-menu -->
  <!--End mobile-menu -->
  <ul id="nav" class="hidden-xs">
    <li id="nav-home" class="level0 parent drop-menu active"><a href="<?php echo base_url(); ?>"><span>Trang chủ</span> </a>            
    </li>
    <li class="level0 parent drop-menu"><a href=""><span>Danh Mục</span> </a>
	<ul style="display: none;" class="level1">
    <?php //include "theloai.php"; ?>
    <?php
        foreach($theloai as $arr): ?>
    <li class="level1 first"><a href="<?php echo base_url('frontend/danhmuc/listsanpham/'.$arr['matheloai']); ?>"><span><?php echo $arr['tentheloai']; ?></span></a></li> 
    <?php endforeach; ?>
	</ul>
    </li>
    <li class="level0 nav-5 level-top first"> <a href="" class="level-top"> <span>Tác Giả</span> </a>
      <div style="display: none; left: 0px;" class="level0-wrapper dropdown-6col">
        <div class="level0-wrapper2">
          <div class="nav-block nav-block-center">
            <ul class="level0">
              <?php foreach($tacgia as $arr){ ?>
              <li class="level1 nav-6-1 first parent item"> 
                <ul class="level1">
                  <li class="level2 nav-6-1-1 first"> <a href="<?php echo base_url('frontend/tacgia/listsanphamtg/'.$arr['matacgia']); ?>"> <span><?php echo $arr['tentacgia']; ?></span> </a> </li>
                </ul>
              </li>
            <?php } ?>
            </ul>
      </div>
    </li>
    <!-- <li class="level0 nav-8 level-top"> <a href="<?php echo public_url(); ?>/sachbanchay.php" class="level-top"> <span>Sách Bán Chạy</span> </a> </li> -->
    <li class="level0 nav-8 level-top"> <a href="<?php echo base_url('frontend/sach/listsanphamnoibat') ?>" class="level-top"> <span>Sách Nổi Bật</span> </a> </li>
    <li class="level0 nav-8 level-top"> <a href="<?php echo base_url('frontend/sach/listsanphamgiamgia') ?>" class="level-top"> <span>Sách Giảm Giá</span> </a> </li>
    <li class="level0 nav-8 level-top"> <a href="<?php echo base_url('frontend/gioithieu') ?>" class="level-top"> <span>Giới Thiệu</span> </a> </li>

  </ul>
  <!-- Search-col -->
  <div class="search-box">
    <form action="<?php echo base_url('frontend/sach/search');  ?>" method="get" id="search_mini_form" name="Categories">
      <input type="text" placeholder="Tìm kiếm sản phẩm..."  maxlength="70" name="search" id="search" value="<?php echo isset($key)? $key : '' ?>">
      <button name="btntim" class="btn btn-default  search-btn-bg"> <span class="glyphicon glyphicon-search"></span>&nbsp;</button>
    </form>
  </div>

       