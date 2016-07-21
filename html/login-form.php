<?php if(!is_user_logged_in()){ ?>
<div id="ls-login-wrapper">
    <form action="<?php echo get_permalink(); ?>" id="ls-login-form" name="ls-login-form" method="post">
        <p class="m220 login-error" style="display: none;"></p>
        <div class="form-row">
            <input type="text" name="username" id="username" placeholder="نام کاربری خود را اینجا وارد کنید...">
        </div>
        <div class="form-row">
            <input type="password" name="password" id="password" placeholder="کلمه عبور خود را اینجا وارد کنید...">
        </div>
        <div class="form-row ck220">
            <label for="rememberme">مرا به خاطر بسپار</label>
            <input type="checkbox" name="rememberme" id="rememberme">
        </div>
        <div class="form-row">
            <input id="form-login-submit" type="submit" value="ورود">
        </div>
    </form>
</div>
<?php } ?>