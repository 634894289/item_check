<html>
<head>
  <?php echo $head ;?>
  <title>登陆界面</title>
</head>
<body class="wrap">
  <?php echo $header ;?>
  <input type="hidden" value="<?=$is_err?>" class="js_check_login">
  <form role="form" method="post" action="<?=base_url().'login/check_login'?>" class="login-form">
    <div class="login-header" >
      登陆
    </div>
    <hr>
   <div class="form-content">
     <div class="form-group">
       <label for = "user_name">用户名：</label>
       <input type="text" name="user_name" id="user_name" class="form-control" placeholder="请输入用户名"
              value="<?php echo set_value('user_name'); ?>">
       <div class="input-error">
         <span><?php echo form_error('user_name'); ?></span>
       </div>
     </div>
     <div class="form-group">
       <label for = "user_password">密码：</label>
       <input type="password" name="user_password" id="user_password" class="form-control" placeholder="请输入密码"
              value="<?php echo set_value('user_password'); ?>">
       <div class="input-error">
         <span><?php echo form_error('user_password'); ?></span>
       </div>
     </div>
     <div class="login-error" style="visibility: hidden">
         <?php
            if ($is_err === '1')
            {
                echo $err_message;
            }
            else
            {
              echo 'no error';
            }
         ?>
     </div>
     <div  class="text-right">
       <button type="submit" class="login-submit">登录</button>
     </div>
   </div>
  </form>
</body>
<?php echo $script ;?>
</html>