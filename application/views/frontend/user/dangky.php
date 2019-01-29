<?php if(isset($message)) echo '<h3 style="text-align: center; color: red;">'.$message .'</h3>'; ?>
<h1> Đăng ký thành viên </h1>
    </div>
    <script src="<?php echo public_url(); ?>js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      function KTDT(numcheck, e) 
      {
        var keynum, keychar, numcheck;
        if (window.event) 
        { 
          keynum = e.keyCode;
        }
        else if (e.which) 
        {
          keynum = e.which;
        }
        if (keynum == 8 || keynum == 127 || keynum == null || keynum == 9 || keynum == 0 || keynum == 13 ) 
          return true;
        keychar = String.fromCharCode(keynum);
        var result = numcheck.test(keychar);
        return result;
    } 
    $(document).ready(function()
      {
      $('#Test').submit(function(){
      var flag = true;
      var matkhau    = $.trim($('#password').val());
      var rematkhau    = $.trim($('#repassword').val());
      var ten    = $.trim($('#ten').val());
      var sdt    = $.trim($('#sdt').val());
      var diachi   = $.trim($('#diachi').val());
      var em=$.trim($('#email').val());
      if(em.indexOf("@")==-1 || em.indexOf(".")==-1 || em.indexOf("@")!=em.lastIndexOf("@")|| em.lastIndexOf(".")==em.length-1
      || em.indexOf(".")==-1||em.lastIndexOf(".")<em.indexOf("@"))
      {
        $('#email').focus();
         $('#email_error').text('Email sai định dạng');
       flag=false;
      }
      else
        $('#email_error').text(" ");
      if( em=='')
        {
          $('#email').focus();
           $('#email_error').text('Email không được trống!');
          flag=false;
        }
      else  $('#email_error').text('');
      if( matkhau=='')
        {
          $('#password').focus();
           $('#pass_error').text('Mật khẩu không được trống!');
          flag=false;
        }
      else  $('#pass_error').text('');
      if( rematkhau=='')
        {
          $('#repassword').focus();
           $('#repass_error').text('Phải xác nhận lại mật khẩu!');
          flag=false;
        }
      else  $('#pass_error').text('');
      if( matkhau!=rematkhau)
        {
          $('#password').focus();
           $('#repass_error').text('Mật khẩu và nhập lại mật khẩu phải giống nhau!');
          flag=false;
        }
      else  $('#repass_error').text('');
      if( ten=='')
        {
          $('#ten').focus();
           $('#ten_error').text('Tên khách hàng không được trống');
          flag=false;
        }
      else  $('#ten_error').text('');
      if(sdt.length<10 || sdt.length>11)
         {   $('#sdt').focus();
           $('#sdt_error').text('So DT phai tu 10 den 11 ki tu');
         flag=false;} 
      else  $('#sdt_error').text('');
      if( diachi=='')
        {
          $('#diachi').focus();
           $('#diachi_error').text('Địa chỉ không được trống');
          flag=false;
        }
      else  $('#diachi_error').text('');
      return flag;
      });});
    </script>
    <div class="category-products">
      <div class="toolbar">
        <form action="<?php echo base_url('frontend/user/dangky'); ?>" method="post" id="Test" name="Test">
          <table  align="center">
              <tr>
                <td>Email:</td>
                <td><input type="text" name="email" id="email" value="<?php if(!isset($message))echo set_value('email'); ?>">&nbsp(*)</td>
                <td><label id="email_error" class="error"><?php echo form_error('email'); ?></label></td>
              </tr>
            <tr>
              <td>Mật khẩu:</td>
              <td><input type="password" id="password" name="password">&nbsp(*)</td><td><label id="pass_error" class="error"></label></td>
            </tr>
            <tr>
              <td>Nhập lại mật khẩu:</td>
              <td><input type="password" id="repassword" name="repassword">&nbsp(*)</td><td><label id="repass_error" class="error"></label></td>
            </tr>
              <tr>
                <td>Tên khách hàng:</td>
                <td><input type="text" id="ten" name="ten" value="<?php if(!isset($message)) echo set_value('ten'); ?>" >&nbsp(*)</td>
                <td><label id="ten_error" class="error"></label></td>
              </tr>  
            <tr>
              <td>Số điện thoại:</td>
              <td><input type="text" id="sdt" maxlength="11" onkeypress="return KTDT(/\d/,event); " value="<?php if(!isset($message)) echo set_value('sdt'); ?>" name="sdt"></td><td><label id="sdt_error" class="error"><?php echo form_error('sdt'); ?></label></td>
            </tr>
            <tr>
              <td>Địa chỉ:</td>
              <td><input type="text" id="diachi" value="<?php if(!isset($message)) echo set_value('diachi'); ?>" name="diachi"></td>
              <td><label id="diachi_error" class="error"></label></td>
            </tr>
            <tr>
              <td colspan="2" align="center">Lưu ý: Những trường có dấu (*) bắt buộc phải có dữ liệu</td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" value="Đăng ký" name="submit">
              <input type="reset" value="reset" name="reset"></td>
            </tr>
          </table>
        </form>
      </div>
