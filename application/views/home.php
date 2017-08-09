<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body class="wrap">
<input type="hidden" class="js-if-login" value="<?php echo isset($_SESSION['if_login'])? $_SESSION['if_login'] : 0 ;?>">
    <input type="hidden" value="<?=base_url()?>" class="get-base-url">
        <div class="left-content col-sm-2 text-lef">
            <div class="my-nav active">
                <p>导航栏</p>
            </div>
            <div class="nav-wrap">
                <div class="nav-item">
                    <p class="active js-get-table">列表试图</p>
                    <p class="js-get-tree">树试图</p>
                </div>
            </div>
            <div class="reset-content"></div>
        </div>
      <div class="right-content col-sm-10"></div>
</body>
</html>