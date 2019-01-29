<div class="cart">
  <div class="page-title">
    <h2>Giỏ hàng</h2>
  </div>
  <div class="table-responsive">
    <?php if($total_items > 0 ) { ?>
    <form method="post" action="<?php echo base_url('frontend/cart/update'); ?>">
      <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
      <fieldset>
        <table id="shopping-cart-table" class="data-table cart-table">
          <thead>
            <tr class="first last">
              <th rowspan="1">&nbsp;</th>
    <th rowspan="1">&nbsp;</th>
              <th rowspan="1"><span class="nobr">Tên sách</span></th>
              <th class="hidden-phone" rowspan="1"></th>
              <th class="a-center" colspan="1"><span class="nobr">Giá sách</span></th>
              <th rowspan="1" class="a-center ">Số lượng</th>
              <th class="a-center" colspan="1">Thành tiền</th>
              <th rowspan="1" class="a-center">&nbsp;</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="first last">
              <td colspan="8" class="a-right last"><button title="Continue Shopping" class="button btn-continue" onClick="setLocation('http://magento.magikthemes.com/magikClassic/womens.html')"><span>Tiêp tục mua hàng</span></button>
                <button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button btn-update"><span>Cập nhật</span></button>
                <a href="<?php echo base_url('frontend/cart/del'); ?>" type="submit" name="update_cart_action" value="empty_cart" title="Clear Cart" class="button" id="empty_cart_button"><span>Xóa hết</span>
                </a>
              </td>
            </tr>
          </tfoot>
          <tbody>
            <?php $total_amount=0; ?>
            <?php foreach ($carts as $key => $value) { 
              $total_amount += $value['subtotal'];
              ?>
            <tr class="first odd">
    <td rowspan="1">&nbsp;</td>
              <td class="image">
                <a href="" title="Sample Product" class="product-image">
                <img width="75" src="<?php echo public_url(); ?>products-images/<?php echo $value['image_link']; ?>" alt="<?php echo str_replace ('-' ,' ' ,$value['name']);  ?>">
              </a>
            </td>
              <td><h2 class="product-name"> <a href="product_detail.html"><?php echo str_replace ('-' ,' ' ,$value['name']);  ?></a> </h2></td>
    <td rowspan="1">&nbsp;</td>
              <td class="a-center hidden-table"><span class="cart-price"> <span class="price"><?php echo number_format($value['price']); ?>đ</span> </span></td>
              <td class="a-center movewishlist"><input name="qty_<?php echo $value['id']; ?>" value="<?php echo $value['qty']; ?>" size="4" title="Qty" class="input-text qty" maxlength="12"></td>
              <td class="a-center movewishlist"><span class="cart-price"> <span class="price"><?php echo number_format($value['subtotal']); ?>đ</span> </span></td>
              <td class="a-center last"><a href="<?php echo base_url('frontend/cart/del/'.$value['id']); ?>" title="Remove item" class="button remove-item"><span><span>Xóa</span></span></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </fieldset>
    </form>
  </div>
  <!-- BEGIN CART COLLATERALS -->
  <div class="cart-collaterals row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-4">
      <div class="discount">
        <h3>Mã giảm giá</h3>
        <form method="post" action="#couponPost/" id="discount-coupon-form">
          <label for="coupon_code">Nhập mã giảm giá vào đây</label>
          <input type="hidden" value="0" id="remove-coupone" name="remove">
          <input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
          <button value="Apply Coupon" onClick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Apply Coupon</span></button>
        </form>
      </div>
    </div>
    <div class="totals col-sm-4">
      <h3>Tổng số trong giỏ hàng</h3>
      <div class="inner">
        <table id="shopping-cart-totals-table"> 
          <tfoot>
            <tr>
              <td colspan="1" class="a-left" style=""><strong>Tổng cộng</strong></td>
              <td class="a-right" style=""><strong><span class="price"><?php echo number_format($total_amount); ?>đ</span></strong></td>
            </tr>
          </tfoot>
        </table>

        <ul class="checkout">
          <li>
            <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Thanh toán</span></button>
          </li>
          
        </ul>
        <?php }else{
      echo '<h4> Không có sản phẩm nào trong giỏ hàng </h4>';
    } ?>
      </div>
      <!--inner--> 
      
    </div>
  </div>
  
  <!--cart-collaterals--> 
  <!-- End crosssell Slider --> 
  
</div>