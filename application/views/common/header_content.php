<div class="header">
    <div class="logo"></div>
    <div class="header-text">考核Demo</div>
    <?php
    if(isset($_SESSION['is_login'])) {
        ?>
        <div class="after-login">
            <span class="js-login-time"></span>
            <span class="js-exit">注销</span>
        </div>
        <?php
    }
    ?>
</div>