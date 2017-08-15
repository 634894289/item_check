<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $head ;?>
  <title>主页</title>
</head>
<body class="wrap">
<?php echo $header ;?>
<input type="hidden" class="js-is-login" value="<?php echo isset($_SESSION['is_login'])? $_SESSION['is_login'] : 0 ;?>">
    <input type="hidden" value="<?=base_url()?>" class="get-base-url">
        <div class="left-content col-sm-2 text-lef clearfix">
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
      <div class="right-content col-sm-10 clearfix">
        <div class="table-content"></div>
        <div class="is-have-content" style="display: none;">暂无数据........</div>
      </div>
</body>
<?php echo $script ;?>
</html>