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
  
  <!-- breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <ul>
          <li class="home"> </li>
          <li class=""> </li>
          <li class="category13"><strong></strong></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- End breadcrumbs --> 
  <!-- Two columns content -->
   <div class="main-container col2-left-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-9 col-sm-push-3">
          <div class="category-title">
      <?php //foreach($tl_data as $arr){ ?>
          <?php $this->load->view($danhmuc); ?>
          </div>
        </section>
        <aside class="col-right sidebar col-sm-3 col-xs-12 col-sm-pull-9">
         <?php $this->load->view('frontend/navcate'); ?>
        </aside>
      </div>
    </div>
  </div>
  <!-- End Two columns content -->
  
  <!-- Footer -->
  <footer class="footer">
    <?php $this->load->view('frontend/footer') ?>
  </footer>
  <!-- End Footer --> 
  
</div>
  <!--right-side-content hidden1--> 
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="<?php echo public_url(); ?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>js/parallax.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>js/common.js"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>js/revslider.html"></script> 
<script type="text/javascript" src="<?php echo public_url(); ?>js/owl.carousel.min.js"></script>
</body>

<!-- Giao dien duoc chia se mien phi tai www.ptheme.net [Free HTML Download]. SKYPE[ptheme.net] - EMAIL[ptheme.net@gmail.com].-->
</html>