<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('frontend/head'); ?>
</head>
<body class="cms-index-index">
<div class="page"> 
  <!-- Header -->
  <header class="header-container">
  	<div class="nav-inner"> 
    <?php $this->load->view('frontend/header'); ?>
	</div>
   </header>
  <!-- end header --> 
  <!-- Navbar -->
  <nav>
    <div class="container">
      	<div class="nav-inner"> 
        <!-- End Search-col --> 
      <?php $this->load->view('frontend/navbar'); ?>
  		</div>
    </div>
  </nav>

  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <?php $this->load->view($temp); ?>
      </div>
    </div>
  </section>
  <!-- End main container --> 
  
  <!-- Latest Blog -->
  
  <!-- Footer -->
  <footer class="footer">
    <?php $this->load->view('frontend/footer') ?>
  </footer>
  <!-- End Footer --> 
  
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/parallax.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/common.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/slider.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>/js/owl.carousel.min.js"></script> 
<script type="text/javascript">
    //<![CDATA[
	jQuery(function() {
		jQuery(".slideshow").cycle({
			fx: 'scrollHorz', easing: 'easeInOutCubic', timeout: 10000, speedOut: 800, speedIn: 800, sync: 1, pause: 1, fit: 0, 			pager: '#home-slides-pager',
			prev: '#home-slides-prev',
			next: '#home-slides-next'
		});
	});
    </script>
</body>
</html>