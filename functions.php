<?php add_theme_support('title-tag');
global $wpdb,$table_prefix;
//$current_user= wp_get_current_user();
//$table = $wpdb->get_results("SELECT * FROM {$table_prefix}post_likes_ WHERE user_id = $current_user->ID AND post_id = 32", OBJECT);
//$table = $wpdb->last_query;
//var_dump($table);
//global $wpdb,$table_prefix;




$lst_options = get_option('lst_options');
$slider = get_option('slider_options');


function ls_vip_content($content)
{
    if (is_user_logged_in()) {
        return $content;
    }
    return '<p class="vip-catioun">این محتوا مخصوص کاربران با عضویت VIP می باشد</p>';
}
//add_filter('the_content','ls_vip_content');

const MSG_STATUS_PENDING = 0;
const MSG_STATUS_APPROVED = 1;
function ls_setup()
{
    register_nav_menu('top-bar-menu', 'a menu for top bar');
    $menus = [
        'header-menu' => 'A Menu For Top Bar',
        'footer-menu' => 'یک منو برای فوتر',
        'loginout_menu' =>'A Menu For login logout and register'
    ];

    register_nav_menus($menus);
    add_theme_support('post-thumbnails');
    add_image_size('post-thumbnail', 284, 135, true);
    /*  if (!is_admin()){
          wp_deregister_script('jquery');
          wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js', false);
      }*/
    $current_user = wp_get_current_user();
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('modal', get_template_directory_uri() . '/js/modal.js', array('jquery'), null, true);
    wp_enqueue_style('f_awesome', get_template_directory_uri() . '/css/font-awesome.min.css');

    wp_localize_script('main', 'data14', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'current_user_id' => $current_user->ID,
        'posts_per_page' => 1
    ));
    wp_localize_script('modal', 'data14', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'current_user_id' => $current_user->ID,
            'posts_per_page' => 1
        ));

}
add_action('after_setup_theme', 'ls_setup');


function contact_submit () {

    if (isset($_POST['contact_us_submit'])) {
        //session_start();
           $username = sanitize_text_field($_POST['contact_name']);
           $email = sanitize_text_field($_POST['contact_mail']);
           $contact_textarea = sanitize_text_field($_POST['contact_textarea']);
           if (empty($username) || empty($contact_textarea) || empty($email)) {
               $has_error = true;
               $message[] = 'لطفا ردیف های ضروری را پر کنید';
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $has_error = true;
               $message[] = 'این ایمیل در دسترس نمی باشد';
           }
           if($has_error == true) {
               update_option('contact_us_message',$message);
           }
           if (!$has_error) {

               $_SESSION['contact_us_message']= '<div class="toast220"><div class="toast_success">پیام شما با موفقیت ثبت شد</div></div>';
               global $wpdb, $table_prefix;
               $wpdb->insert($table_prefix . 'contact', array(
                   'name' => $username,
                   'email' => $email,
                   'content' => $contact_textarea,
                   'date' => date('Y-m-d H:i:s'),
                   'status' => MSG_STATUS_PENDING
               ),
                   array(
                       '%s',
                       '%s',
                       '%s',
                       '%s',
                       '%d',
                   ));
               $new_record_id = $wpdb->insert_id;

               ob_start();
               include get_template_directory() . '/html/contact-mail.php';
               $email_html = ob_get_clean();
               $email_html = str_replace(array('#name#', '#email#', '#content#'), array($username, $email, $contact_textarea), $email_html);
               send_html_email('info@7saze.ir', 'دریافت درخواست جدید در وبسایت', $email_html);
           } else {
               var_dump($_POST);
           }
       }
       $errs =  get_option('contact_us_message');
       if($errs) {
           echo '<div class="toast220">';
           if (is_array($errs)) {
               foreach ($errs as $m) {
                   echo '<div class="toast_error" >' . $m . '</div>';
               }
               echo '</div>';
           }
       }else{
                      echo $_SESSION['contact_us_message'];
               }
       delete_option('contact_us_message');
   }
add_action('init','contact_submit');

function send_html_email($email, $subject, $content)
{
    $headers = "From: " . strip_tags('info@7saze.ir') . "\r\n";
    $headers .= "Reply-To: " . strip_tags('info@7saze.ir') . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    return wp_mail($email, $subject, $content, $headers);
}
function cat_get_post_view($post_id)
{
    if (intval($post_id)) {
        $post_view = get_post_meta($post_id, 'views', true);
        return (intval($post_view));
    }
    return 0;
}
function cat_set_post_view($post_id)
{
    if (intval($post_id)) {
        global $wpdb,$table_prefix;
                     $wpdb->insert(
                         $table_prefix."user_visited_data",
                         array(
                         'user_ip' => $_SERVER['REMOTE_ADDR'],
                         'post_id' => $post_id,
                         'date_visited' =>time()
                     ),array('%s','%d','%d'));
        $views = cat_get_post_view($post_id);
        $views++;
        update_post_meta($post_id, 'views', $views);
    }
}
/*likes*/
function get_post_like($post_id)
{
    if (intval($post_id)) {
        $post_like = get_post_meta($post_id, 'likes', true);
        return (intval($post_like));
    }
    return 0;
}
function set_post_like($post_id,$decrease=false)
{
    if (intval($post_id) ) {
        $likes = get_post_like($post_id);
        if($decrease== false){
            $likes++;
        }elseif($decrease== true){
            $likes--;
        }
        update_post_meta($post_id, 'likes', $likes);
        return $likes;
    }
    return 0;
}
/*end of likes*/
function ls_enqueue()
{
    /*here you should enqueue your scripts*/
    wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js', array('jquery'), null, true);
    wp_enqueue_script('autosuggest', get_template_directory_uri() . '/js/autosuggest.js', array('jquery'), null, true);
    wp_localize_script('autosuggest', 'data14', array(
            'ajax_url' => admin_url('admin-ajax.php'),
           // 'posts_per_page' => 1
        ));
}
add_action('wp_enqueue_scripts', 'ls_enqueue');
function ls_admin_enqueue()
{
wp_enqueue_style('sl_admin',get_template_directory_uri().'/css/style2.css');
wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js', array('jquery'), null, true);

}
add_action('admin_enqueue_scripts','ls_admin_enqueue');
get_template_part('partials/ajax');
get_template_part('partials/sidebars');
get_template_part('partials/shortcode');
get_template_part('partials/dashboard-widgets');
get_template_part('widgets/foo');
get_template_part('widgets/most_featured_widget');
get_template_part('widgets/custom-form');
get_template_part('admin/admin');
function comments_callback($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type)   :
        case 'pingback':
            //  case 'trackback':
            //    break;
        default :
            global $post;
            ?>
            <li class="comment">
                <article <?php comment_class(); ?> id="<?php comment_ID(); ?>">
                    <div class="bordered alignleft">
                        <figure class="add-border">
                            <a data-action="ls_action_commenter1" data-uid="<?php echo $comment->user_id; ?>" class="single-image modal" href="#"><!-- <img src="images/gravatar.png" alt="" />--> <?php
                                echo get_avatar($comment, 55) ?></a>
                        </figure>
                    </div>
                    <!--/ .bordered-->
                    <div class="comment-body">
                        <div class="comment-meta">

                            <div
                                class="author <?php echo($comment->user_id == $post->post_author ? 'post-author' : '') ?>"><?php echo get_comment_author_link(); ?></div>
                            <div class="date"><?php echo get_comment_date(' Y / n / j --- H : i  ') ?></div>

                        </div>
                        <!--/ .comment-meta -->
                        <div class="clear"></div>

                        <?php if ('0' == $comment->comment_approved) {
                            echo '<p>کامنت شما در انتظار تایید می باشد</p>';
                        } ?>
                        <?php comment_text(); ?>
                        <?php //edit_comment_link('<span></span>','<p class="edit-comment-link"></p>');
                        ?>

                        <?php comment_reply_link(array_merge($args, array(
                            'reply_text' => '<span class="button default align-btn-right">پاسخ</span>',
                            'depth' => $depth,
                            'max_depth' => $args['max_depth']
                        ))); ?>
                    </div>
                    <!--/ .comment-body -->

                </article>
                <!--            <ul class="children">-->
                <!---->
                <!---->
                <!---->
                <!--            					</ul><!--/ .children-->
            </li>

            <?php
            break;
    endswitch;
}
function wpb_move_comment_field_to_bottom($fields)
{

    $comment_field = $fields['comment'];

    unset($fields['comment']);

    $fields['comment'] = $comment_field;

    return $fields;

}
add_filter('comment_form_fields', 'wpb_move_comment_field_to_bottom');

//$x = new WP_Query();
//************************* menu manipulation***************/
add_filter( 'nav_menu_link_attributes', 'wpse121123_contact_menu_atts', 10, 3 );
function wpse121123_contact_menu_atts( $atts, $item, $args )
{
  // The ID of the target menu item
  $menu_target = 134;

  // inspect $item
  if ($item->ID == $menu_target) {
    $atts['data-action'] = 'ls_login_action1';
    $atts['class'] = 'modal';
  }elseif($item->ID == 133){
      $atts['data-action'] = 'ls_reg_action1';
      $atts['class'] = 'modal';
  }
  return $atts;
}
add_filter('wp_nav_menu_items', 'add_loginout_link', 10, 2);
function add_loginout_link($items, $args)
{
    if (is_user_logged_in() && $args->theme_location == 'loginout_menu') {
        $items .= '<li class="loginout"><a href="' . wp_logout_url(home_url()) . '">خروج</a></li>';
    } elseif (!is_user_logged_in() && $args->theme_location == 'loginout_menu') {
        $items .= '<li><a href="#" class="modal" data-action="ls_login_action1">ورود</a></li>';
        $items .= '<li><a class="modal" data-action="ls_reg_action1" href="# ">عضویت</a></li>';
    }
    return $items;
}
//************************* end menu manipulation***************/

add_action('init','featured_content');
function featured_content () {
    if ( isset($_GET['most_viewed']) ){

    }
}
function arr_walk142($value,$key){
    //var_dump($key) .'++++++';
    $array =  (array) $value;
    var_dump($array);
    return $array;
}