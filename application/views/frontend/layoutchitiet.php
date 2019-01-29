<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<?php $this->load->view('frontend/head'); ?>
</head>
<body class="cms-index-index">
<div class="page"> 
  <!-- Header -->
  <header class="header-container">
    <?php $this->load->view('frontend/header'); ?>
  </header>
  <!-- end header --> 
  <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="nav-inner"> 
      <?php $this->load->view('frontend/navbar'); ?>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
  <!-- end breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <ul>
          <li class="home"> </li>
          <li class=""> </li>
          <li class="category13"></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end breadcrumbs --> 
  <!-- main-container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
          <div class="product-view">
            <div class="product-essential">
              <form action="#" method="post" id="product_addtocart_form">
                <?php $this->load->view($temp); ?> 
              </form>
              
              <!-- related Product Slider -->
              <div class="product-collateral"> 
                
                <!-- related Product Slider -->
                <section class="related-pro">
                  <div class="slider-items-products">
                    <div class="new_title center">
                      <h2>Sản phẩm cùng thể loại</h2>
                    </div>
                    <div id="related-products-slider" class="product-flexslider hidden-buttons">
                      <div class="slider-items slider-width-col4 products-grid"> 
                        <!-- Item -->
                        <?php $this->load->view($sachlienquan); ?>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- related Product Slider End --> 
                
                <!-- Upsell Product Slider -->
                <!-- Upsell Product Slider End --> 
                
              </div>
            </div>
          </div>
          <div class="box-collateral box-reviews" id="customer-reviews">
              <div class="page-title">
                <h2>Reviews</h2>
              </div>
              <div class="box-reviews1">
                <div class="form-add">
                  <?php $this->load->view('frontend/review'); ?>
                </div>
              </div>
              
              <div class="clear"></div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Two columns content -->
  
  
  <!-- Footer -->
  <footer class="footer">
    <?php $this->load->view('frontend/footer'); ?>
  </footer>
  
  <!-- End Footer --> 
  
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/prototype.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/common.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/toggle.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/pro-img-slider.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/cloud-zoom.js"></script> 
<script>
			new UISearch( document.getElementById( 'form-search' ) );
		</script>
</body>

<!-- Giao dien duoc chia se mien phi tai www.ptheme.net [Free HTML Download]. SKYPE[ptheme.net] - EMAIL[ptheme.net@gmail.com].-->
</html>
