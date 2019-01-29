<h1> <?php echo $theloaiid['tentheloai']; ?> </h1>
    </div>
    
    <div class="category-products">
      <div class="toolbar">
        
           </div>
      
      <ul class="products-grid" >
        <div class="pager" style="margin-left:300px;">
          <div class="pages">
            <div class="pagination" >
             
            <?php  echo $this-> pagination-> create_links(); ?>
            </div>
            
          </div>
</div>
    <?php foreach($list as $arr){ ?>
<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-12" >
<div class="col-item">
  <!-- <div class="sale-label sale-top-right"></div> -->
  <div class="item-inner">
    <div class="item-img">
      <div class="item-img-info"> <a href="<?php echo base_url('frontend/sach/chitiet/'.$arr['masach']); ?>" title="<?php echo $arr['tensach']; ?>" class="product-image"> 
        
          <img src="<?php echo public_url(); ?>/products-images/<?php echo $arr['urlhinh']; ?>" alt="<?php echo $arr['tensach']; ?>"> </a>
          
        <div class="item-box-hover">
          <div class="box-inner">
            <div class="product-detail-bnt"><a href="<?php echo base_url('frontend/sach/chitiet/'.$arr['masach']); ?>" class="button detail-bnt"><span>Xem chi tiết</span></a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="item-info">
      <div class="info-inner">
        <div class="item-title"> <a href="<?php echo base_url('frontend/sach/chitiet/'.$arr['masach']); ?>" class="button detail-bnt"><?php echo $arr['tensach']; ?> </a> </div>
        <div class="item-content">
           
          <div class="item-price">
            <div class="price-box">
              <?php if($arr['giagiam'] == 0){ ?>
            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> 
              <?php echo number_format($arr['giagoc']); ?>đ </span>
             </p>
             <?php }else{ ?>
             <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">
              <?php echo number_format($arr['giagoc']); ?>đ</span>
               </p>
            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> 
              <?php echo number_format($arr['giagiam']); ?>đ </span>
             </p>
             <?php } ?>
            </div>
          </div>
        </div>
      <div class="actions">
        <a href="<?php echo base_url('frontend/cart/add/'.$arr['masach']); ?>">
        <span class="add-to-links">  
        <button type="button" title="Thêm vào giỏ hàng" class="button btn-cart"><span>Thêm vào giỏ hàng</span></button>
        </span> 
      </a></div>
      </div>
  </div>
</div>
</li>
<?php } ?>
</ul>