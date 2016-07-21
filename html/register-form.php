<?php // if(!is_user_logged_in()){ ?>
    <div id="ls-login-wrapper">
        <form action="<?php echo get_permalink(); ?>" id="ls-register-form" name="ls-login-form" method="post">
            <?php
            if($has_error){
                foreach($message as $i ){
                echo '<p class="m220 login-error"> '. $i . '</p>';
                }
            }
            if($has_success){
                           foreach($message as $i ){
                           echo '<p class="success type-2"> '. $i . '</p>';
                           }
                       }
            ?>

            <div class="form-row">
                <input type="text" name="username" id="username" placeholder="نام کاربری خود را اینجا وارد کنید..." required>
            </div>
            <div class="form-row">
                <input type="email" name="email" id="email" placeholder="آدرس ایمیل خود را اینجا وارد کنید..." required>
            </div>
            <div class="form-row">
                <input type="password" name="password" id="password" placeholder="کلمه عبور خود را اینجا وارد کنید..." required>
            </div>
            <div class="form-row">
                <input type="password" name="password2" id="password2"
                       placeholder="تکرار کلمه عبور خود را اینجا وارد کنید..." required>
            </div>
            <div class="form-row">
                            <input type="text" name="mobilenum" id="mobilenum"
                                   placeholder="شماره موبایل (اختیاری)">
                        </div>

            <div class="form-row">
                <input name="register_submit" id="form-login-submit" type="submit" value="ثبت نام در سایت">
            </div>
        </form>
    </div>
<?php //} ?>