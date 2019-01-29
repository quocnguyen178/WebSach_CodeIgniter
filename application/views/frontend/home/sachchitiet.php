<input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
      <div class="product-img-box col-sm-4 col-xs-12">
        
        <div class="new-label new-top-left"> New </div>
        <div class="product-image">
          <div class="large-image"> <img alt="<?php echo $sach_item['tensach']; ?>" src="<?php echo public_url(); ?>/products-images/<?php echo $sach_item['urlhinh']; ?>"> </div>
          
        </div>
        <!-- end: more-images -->
        <div class="clear"></div>
      </div>
      
      <div class="product-shop col-sm-5 col-xs-12">
        <div class="product-name">
          <h1><?php echo $sach_item['tensach']; ?></h1>
        </div>
        <div class="short-description">
          <p> Tác giả:<?php foreach($tentg as $row){ echo $row['tentacgia'].' ';} ?>   </p>
          <?php //$data_nxb= $obj -> getnxb_sach($arr['manxb']); ?>
           <p> Nhà Xuất Bản: <?php  echo $tennxb['tennxb'];  ?> </p>
        </div>
        
        <div class="price-block">
          <div class="price-box">
            <?php if($sach_item['giagiam'] == 0){ ?>
            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> 
              <?php echo number_format($sach_item['giagoc']); ?>đ </span>
             </p>
             <?php }else{ ?>
             <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">
              <?php echo number_format($sach_item['giagoc']); ?>đ</span>
               </p>
            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> 
              <?php echo number_format($sach_item['giagiam']); ?>đ </span>
             </p>
             <?php } ?>
          </div>
        </div>
        <div class="add-to-box">

          <div class="add-to-cart">
            <label>Số Lượng</label>
            <select>
              <option>1</option>
              <option>2 </option>
              <option>3</option>
              <option>4</option>
              <option>5 </option>
              <option>6</option>
              <option>7</option>
              <option>8 </option>
              <option>9</option>
              <option>10</option>
            </select>
          </div>
        
          <a href="<?php echo base_url('frontend/cart/add/'.$sach_item['masach']); ?>">
          <button type="button" title="Thêm vào giỏ hàng" name="cart" class="button btn-cart"  ><span>Thêm vào giỏ hàng</span></button> </a>
        </div>
        
        <div class="toggle-content">
          <div class="toggle toggle-white">
            <h4 class="trigger"><a href="#">Mô Tả</a></h4>
            <div style="display: none;" class="toggle_container tabcontent">
              <div class="std">
                <?php echo $sach_item['mota']; ?>
                
              </div>
            </div>
          </div>
          
          <!--
          <div class="toggle toggle-white">
            <h4 class="trigger"><a href="#">Chi tiết sản phẩm</a></h4>
            <div style="display: none;" class="toggle_container ">
              <p>Triangular shaped backpack/ shoulder bag with front zip open and croc textured finish. </p>
              <p>Made from water-repellent Squall fabric, this is one tough travel bag. The efficient bag sports a cushioned shoulder strap for carrying ease. With an exterior pocket running the length of the front and secure zipper closure. 100% nylon with polyester base. Spot clean. Imported. </p>
            </div>
          </div>
          -->
        </div>
      </div>
      <div class="product-img-box col-sm-3 col-xs-12">
        <div class="product-additional"><span class="product-additional"><img alt="Sách mới" src="<?php echo public_url(); ?>/images/offer-banner1.png"></span></div>
      </div>