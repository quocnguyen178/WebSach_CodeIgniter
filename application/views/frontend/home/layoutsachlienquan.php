<?php //var_dump($list); ?>
<?php foreach($list as $arr) { ?>
<div class="item">

	<div class="col-item">

	  <div class="item-inner">
	  	

		<div class="item-img">
			
		  <div class="item-img-info"> <a href="<?php echo base_url('frontend/sach/chitiet/'.$arr['masach']); ?>" class="button detail-bnt"> 
		    <img src="<?php echo public_url(); ?>/products-images/<?php echo $arr['urlhinh']; ?>" alt="<?php echo $arr['tensach']; ?>"> </a>; 
			<div class="item-box-hover">
			  <div class="box-inner">
				<div class="product-detail-bnt"><a href="#" class="button detail-bnt"> <span> Xem chi tiết</span></a></div>
		
			  </div>
			</div>
		  </div>
		</div>
		<div class="item-info">
		  <div class="info-inner">
			<div class="item-title"> <a href="<?php echo base_url('frontend/sach/chitiet/'.$arr['masach']); ?>" class="button detail-bnt"><?php echo $arr['tensach']; ?> </a> </div>

			<div class="item-content">
			  <div class="rating">
			  </div>
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
		  </div>
		  <div class="actions">
		  	 <a href="<?php echo base_url('frontend/cart/add/'.$arr['masach']); ?>">
			<button  title="Thêm vào giỏ hàng" class="button btn-cart"><span>Thêm vào giỏ hàng</span></button>
			</a>
			 </div>

		</div>
		
	  </div>
	  
	</div>
	
  </div>
  <?php } ?>