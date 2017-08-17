<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $head ;?>
  <title>登陆界面</title>
</head>
<body class="wrap" >
  <?php echo $header ;?>
<!--  该隐藏域用于获取服务器错误信息-->
  <input type="hidden" value="<?php echo isset($_SESSION['err_message'])? $_SESSION['err_message'] : -1;?>"
         class="js_check_login"
         data-message = "<?php echo isset($_SESSION['err_message'])? $_SESSION['err_message'] : 'no error';?>">
  <form role="form" method="post" action="<?=base_url().'login/check_login'?>" class="login-form">
    <div class="login-header" >
      登陆
    </div>
    <hr>
   <div class="form-content">
     <div class="form-group">
       <label for = "user_name">用户名：</label>
       <input type="text" name="user_name" id="user_name" class="form-control" placeholder="请输入用户名">
       <div class="input-error">
         <span class="js-user-name" style="display: none">用户名不能为空</span>
       </div>
     </div>
     <div class="form-group">
       <label for = "user_password">密码：</label>
       <input type="password" name="user_password" id="user_password" class="form-control"
              placeholder="请输入密码">
       <div class="input-error">
         <span class="js-user-password" style="display: none">密码不能为空</span>
       </div>
     </div>
     <div class="login-error" style="visibility: hidden">
         <?php
            if (isset($_SESSION['err_message']))
            {
                if ($_SESSION['err_message'] === "1")
                {
                    echo "用户名出错";
                }
                elseif ($_SESSION['err_message'] === "0")
                {
                    echo "密码出错";
                }
                else
                {
                    echo "服务器出错";
                }
                $this->session->unset_userdata('err_message');
            }
            else
            {
                echo 'no error';  //用来占位置
            }

         ?>
     </div>
     <div  class="text-right">
       <button type="submit" class="login-submit" onclick="return myFunction.formCheck(this.form)">登录</button>
     </div>
   </div>
  </form>
  <?php echo $script ;?>
</body>
</html>