<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登陆界面</title>
</head>
<body class="wrap">
  <input type="hidden" value="<?=$err_mess?>" class="js_check_user">
  <form role="form" method="post" action="<?=base_url().'login'?>" class="login-form">
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
     <div class="form-error" style="visibility: hidden">
       登陆失败，密码或用户名不正确！
     </div>
     <div  class="text-right">
       <button type="submit" class="login-submit">登录</button>
     </div>
   </div>
  </form>
</body>
</html>