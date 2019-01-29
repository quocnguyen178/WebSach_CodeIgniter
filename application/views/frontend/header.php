
<div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-xs-6"> 
            <!-- End Header Currency -->
            <div class="welcome-msg hidden-xs"> Chào mừng bạn đến với website của chúng tôi :) </div>
            <?php if(isset($message)) echo $message; ?>
          </div>
          <div class="col-lg-7 col-md-7 col-xs-6"> 
            
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                <?php if(isset($user_id_login)) { ?>
                <div class="myaccount"><span>Xin chào </span><?php echo $user_id_login->tenkhachhang;  ?></span></div>
                <div class="myaccount"><a title="My Account" href="<?php echo base_url('frontend/user/logout'); ?>"><span>Thoát</span></a></div>
              </div><?php }else{ ?>
                <!-- End Header Company -->
                <div class="myaccount"><a title="My Account" href="<?php echo base_url('frontend/user/dangky'); ?>"><span>Đăng ký</span></a></div>
                <div class="login"><a href="<?php echo base_url('frontend/user/dangnhap'); ?>"><span>Đăng nhập</span></a></div>
                <?php } ?>
              </div>
            </div>
            <!-- End Header Top Links --> 
          </div>
        </div>
      </div>
    </div>
   
    <div class="header container">
      <div class="row">
        <div class="col-lg-3 col-sm-4 col-md-3"> 
          <!-- Header Logo -->
          <div class="logo"> <a title="Magento Commerce" href="<?php echo base_url(); ?>"><img alt="Magento Commerce" src="<?php echo public_url(); ?>/images/logo1.png"></a> </div>
          <!-- End Header Logo --> 
        </div>
        <div class="col-lg-9 col-xs-12">
          <div class="top-cart-contain">
            <div class="mini-cart">
              <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="#"><span>Giỏ hàng (<?php echo $total_items; ?>)</span></a></div>
              <div>
                <div style="display: none;" class="top-cart-content arrow_box">
                  <div class="block-subtitle">Những sản phẩm đã thêm gần đây</div>
                  <ul id="cart-sidebar" class="mini-products-list">
                    <?php $total_amount=0; ?>
                    <?php foreach ($carts as $key => $value) { 
                        $total_amount += $value['subtotal'];
                      ?>
                    <li class="item odd"> <a href="<?php echo base_url('frontend/sach/chitiet/'.$value['id']); ?>" title="Sample Product" class="product-image"><img src="<?php echo public_url(); ?>products-images/<?php echo $value['image_link']; ?>" alt="Sample Product" width="55"></a>
                      <div class="product-details"> <!-- <a href="<?php echo base_url('frontend/cart/del/'.$value['id']); ?>" title="Remove This Item" onClick="" class="btn-remove1">Remove This Item</a> --> 
                        <p class="product-name"><a href="<?php echo public_url(); ?>/product_detail.html"><?php echo str_replace ('-' ,' ' ,$value['name']);  ?></a> </p>
                        <strong><?php echo $value['qty']; ?></strong> x <span class="price"><?php echo number_format($value['price']); ?>đ</span> </div>
                    </li>
                    <?php } ?>
                  </ul>
                  <div class="top-subtotal">Tổng tiền: <span class="price"><?php echo number_format($total_amount); ?>đ</span></div>
                  <div class="actions">
                    <button class="btn-checkout" ><span>Thanh toán</span></button>
                    <a href="<?php echo base_url('frontend/cart/index'); ?>"><button class="view-cart" ><span>Xem giỏ hàng</span></button></a>
                  </div>
                </div>
              </div>
            </div>
            <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
              <input value="" type="hidden">
              <input id="enable_module" value="1" type="hidden">
              <input class="effect_to_cart" value="1" type="hidden">
              <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
            </div>
          </div>
        </div>
      </div>
    </div>