<?php
add_shortcode('vip', 'vip_callback');
function vip_callback($atts, $content = null)
{
    if (is_user_logged_in()) {
        return $content;
    }
    return '<p class="vip-catioun">این محتوا مخصوص کاربران با عضویت VIP می باشد</p>';
}

add_shortcode('login-form', 'ls_login_form');
function ls_login_form($atts, $content = null)
{
    ob_start();
    include get_template_directory() . '/html/login-form.php';
    $login_form_html = ob_get_clean();
    return $login_form_html;
}

$has_error = false;
$has_success = false;
$message = array();

add_shortcode('register-form', 'ls_register_form');
function ls_register_form($atts, $content = null)
{


    if (isset($_POST['register_submit'])) {
        $username = sanitize_text_field($_POST['username']);
        $email = sanitize_text_field($_POST['email']);
        $password = sanitize_text_field($_POST['password']);
        $password2 = sanitize_text_field($_POST['password2']);
        $mobilenum = sanitize_text_field($_POST['mobilenum']);

        if (empty($username) || empty($password) || empty($password2) || empty($email)) {
            $has_error = true;
            $message[] = 'لطفا ردیف های ضروری را پر کنید';
        }

        if (username_exists($username)) {
            $has_error = true;
            $message[] = 'این نام کاربری در دسترس نمی باشد';
        }

        if (email_exists($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $has_error = true;
            $message[] = 'این ایمیل در دسترس نمی باشد';
        }

        if ($password !== $password2) {
            $has_error = true;
            $message[] = 'کلمات عبور با هم همخوانی ندارند';
        }

        if (!$has_error) {
            $userdata = array(
                'user_login' => $username,
                'user_email' => $email,
                'user_pass' => $password
            );

            $user_id = wp_insert_user($userdata);

            //On success
            if (is_wp_error($user_id)) {
                $has_error = true;
                $message[] = 'خطایی در هنگام ثبت نام شما رخ داده است. لطفا بعدا امتحان کنید';
            } else {
                update_user_meta($user_id,'mobile',$mobilenum);
                $has_success = true;
                $message[] = 'ثبت نام شما با موفقیت انجام شد';
            }
        }
    }
    ob_start();
    include get_template_directory() . '/html/register-form.php';
    $register_form_html = ob_get_clean();
    return $register_form_html;
}

?>
