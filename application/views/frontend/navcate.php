<div class="side-nav-categories">
            <div class="block-title"> Danh Mục </div>
            <!--block-title--> 
            <!-- BEGIN BOX-CATEGORY -->
            <div class="box-content box-category">
              <ul>
                <?php //include "nav-cate-theloai.php"; ?>
                <?php foreach ($theloai as $arr) {
                ?>
                <li> <a href="<?php echo base_url('frontend/danhmuc/listsanpham/'.$arr['matheloai']); ?>"><?php echo $arr['tentheloai']; ?></a> </li>
                <?php } ?>
              </ul>
            </div>
            <!--box-content box-category--> 
          </div>
          <div class="block block-layered-nav">
            <div class="block-title"></div>
            <div class="block-content">
              <p class="block-subtitle"></p>
              <dl id="narrow-by-list">
                <dt class="even">Nhà Xuất Bản</dt>
                <dd class="even">
                  <ol>
                    <?php //include "nhaxuatban.php"; ?>
                    <?php foreach ($nhaxuatban as $arr) {
                    ?>
                    <li> <a href="<?php echo base_url('frontend/nhaxuatban/listsanphamnxb/'.$arr['manxb']); ?>"> <?php echo $arr['tennxb']; ?></a>  
                    </li>
                    <?php } ?>
                  </ol>
                </dd>
              </dl>
            </div>
          </div>