<fieldset class="col2">
  <div class="col-2 registered-users"><strong>Đăng Nhập</strong>
    <div class="content">
      <form action="" method="post" id="Test" name="Test">
        <ul class="form">
          <?php echo form_error('login'); ?>
          <li>
            <label for="email">Email: <span class="required">*</span></label>
            <br>
            <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="email">
          </li>
          <li>
            <label for="pass">Mật khẩu <span class="required">*</span></label>
            <br>
            <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password">
          </li>
        </ul>
        <p class="required">* Required Fields</p>
        <div class="buttons-set">
          <button id="send2" name="login" type="submit" class="button login"><span>Login</span></button>
          <a class="forgot-word" href="http://demo.magentomagik.com/computerstore/customer/account/forgotpassword/">Forgot Your Password?</a> </div>
      </div>
    </form>
  </div>
</fieldset>