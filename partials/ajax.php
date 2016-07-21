<?php
//*************************load more***********************************/
add_action('wp_ajax_load_more_content', 'load_more_content');
add_action('wp_ajax_nopriv_load_more_content', 'load_more_content');
function load_more_content()
{
    $page = intval($_POST['page']);
    if ($page) {
        $posts_per_page = 3;
        $offset = ($page - 1) * $posts_per_page;
        $load_more_args = array(
            'offset' => $offset,
            'posts_per_page' => 3,
            'post_type' => array('post', 'vip')

        );
        $query = new WP_Query($load_more_args);
        if ($query->have_posts()) :
            $o = '';

            while ($query->have_posts()) : $query->the_post();


                $o .= '<div class="one-third column">

	<div class="detailimg" style="width: 299px;">

		<div class="bordered" >
			<figure class="add-border">
				<a class="single-image picture-icon" rel="holder" href="images/full/01.jpg">' . get_the_post_thumbnail($query->post->ID, 'post-thumbnail') . '</a>
			</figure>
		</div><!--/ .bordered-->

		<h5>' . get_the_title() . '</h5>

		<div class="excerpt-absolute">
			' . get_the_excerpt() . '
		</div>

		<span><a href="#" data-pid="' . get_the_ID() . '" class="button default like-post">like</a>
		        <i class="fa fa-thumbs-o-up">' . get_post_like(get_the_ID()) . '</i></span>

	</div><!--/ .detailimg-->

</div><!--/ .one-third-->';


            endwhile;

        endif;
        $count = count($query);
        wp_reset_postdata();

        $result = array();
        $result['count'] = $count;
        $result['content'] = $o;
        wp_die(json_encode($result));
    } else {
        wp_die(json_encode(array(
            'count' => 0,
            'error' => 1
        )));
    }
}

//*************************End of load more***********************************/

//*************************like post***********************************/
add_action('wp_ajax_like_post', 'ls_like_post');
add_action('wp_ajax_nopriv_like_post', 'ls_like_post');

function ls_like_post()
{
    $post_id = intval($_POST['post_id']);
    $current_user = wp_get_current_user();
    global $wpdb, $table_prefix;
    if ($post_id) {
        $is_liked = $wpdb->get_row("SELECT * FROM {$table_prefix}post_likes_ WHERE user_id = '$current_user->ID' AND post_id = $post_id", OBJECT);

        //**********this code will prevent the likes more than one with out interfering with JS*/
        /*another validation is in with js which is if data-liked=1 then return false and prevent the rest */
        //  $is_cookie_set= isset($_COOKIE['post-'.$post_id]) && intval($_COOKIE['post-'.$post_id]) ? false : false;
        /*edit in 23 tir 95:
         1- database validation has been activated
        2- cookie validation has been disabled
        */
        if ($is_liked) {
            $likes = set_post_like($post_id, true);
            $wpdb->delete("{$table_prefix}post_likes_",
                array('user_id' => $current_user->ID, 'post_id' => $post_id),
                array('%d', '%d')
            );
            $result = array(
                'success' => true,
                'count' => $likes,
                'decrease' => true
            );
            wp_die(json_encode($result));
        }
        //**********End of diminishing the likes */
        $likes = set_post_like($post_id, false);
        if ($likes) {
            $result = array(
                'success' => true,
                'count' => $likes,
                'increase' => true
            );

            setcookie('post-' . $post_id, 1, time() + (7 * 86400), '/');

            /*setting the database type of validation without helping cookie*/
            $wpdb->insert(
                $table_prefix . 'post_likes_',
                array('post_id' => $post_id, 'user_id' => $current_user->ID, 'type_of_like' => 1, 'date_liked' => time()),
                array('%d', '%d')
            );


        } else {
            $result = array(
                'success' => false,
                'count' => 0,
            );
        }
        wp_die(json_encode($result));
    }
}

//*************************end like post***********************************/

//*************************login via ajax***********************************/
add_action('wp_ajax_nopriv_ls_user_login', 'ls_user_login');
function ls_user_login()
{
    //var_dump($_POST);
    check_ajax_referer('ajax-calls', '_nonce', true);
    $userName = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);
    $rememberme = isset($_POST['remember']);

    if (empty($userName) || empty($password)) {
        $result = array(
            'error' => true,
            'message' => 'لطفا فرم را کامل پر کنید'
        );
        wp_send_json($result);
    }
    $user = wp_authenticate_username_password(null, $userName, $password);
    if (is_wp_error($user)) {
        $result = array(
            'error' => true,
            'message' => 'نام کاربری یا کلمه عبور اشتباه است'
        );
        wp_send_json($result);
    }
    $creds = array(
        'user_login' => $userName,
        'user_password' => $password,
        'remember' => $rememberme
    );
    $login_user = wp_signon($creds);

    if (is_wp_error($login_user)) {
        $result = array(
            'error' => true,
            'message' => 'نام کاربری یا کلمه عبور اشتباه است'
        );
        wp_send_json($result);

    }
    $result = array(
        'success' => true,
        'message' => 'شما با موفقیت در سایت لاگین شدید',
        'redirect' => home_url('panel')
    );
    wp_send_json($result);
}

//*************************end login via ajax***********************************/


//*************************register via ajax***********************************/
add_action('wp_ajax_nopriv_ls_reg_action1', 'ls_reg_action1');
add_action('wp_ajax_ls_reg_action1', 'ls_reg_action1');
function ls_reg_action1()
{
    $o = '
      <div id="ls-login-wrapper">
          <form class="ls_register_form" action="#" id="ls-register-form" name="ls-register-form" method="post">
          <p class="m220 login-error" style="display: none;"></p>
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
                  <input class="ls_register_form" name="register_submit" id="form-login-submit" type="submit" value="ثبت نام در سایت">
              </div>
          </form>
      </div>

';

    $result = array();
    $result['content'] = $o;
    wp_die(json_encode($result));

}

add_action('wp_ajax_nopriv_ls_modal_register', 'ls_modal_register');
add_action('wp_ajax_ls_modal_register', 'ls_modal_register');
function ls_modal_register()
{
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_text_field($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $password2 = sanitize_text_field($_POST['password2']);
    $mobilenum = sanitize_text_field($_POST['mobilenum']);
    $has_error = false;
    if (empty($username) || empty($password) || empty($password2) || empty($email)) {
        $has_error = true;
//        $message[] = 'لطفا ردیف های ضروری را پر کنید';

        $result = array(
            'error' => true,
            'message' => 'لطفا ردیف های ضروری را پر کنید'
        );
        wp_send_json($result);
    }

    if (username_exists($username)) {
        $has_error = true;
        $result = array(
            'error' => true,
            'message' => 'این نام کاربری در دسترس نمی باشد',
            'redirect' => home_url('panel')

        );
        wp_send_json($result);
    }

    if (email_exists($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $has_error = true;
        $result = array(
            'error' => true,
            'message' => 'این ایمیل در دسترس نمی باشد'
        );
        wp_send_json($result);
    }

    if ($password !== $password2) {
        $has_error = true;
        $result = array(
            'error' => true,
            'message' => 'کلمات عبور با هم همخوانی ندارند'
        );
        wp_send_json($result);
    }

    if (!$has_error) {
        $userdata = array(
            'user_login' => $username,
            'user_email' => $email,
            'user_pass' => $password
        );

        $user_id = wp_insert_user($userdata);
        $creds = array(
            'user_login' => $username,
            'user_password' => $password,
            'remember' => true
        );
        $login_user = wp_signon($creds);

        //On success
        if (is_wp_error($user_id)) {
            $result = array(
                'error' => false,
                'message' => 'خطایی در هنگام ثبت نام شما رخ داده است. لطفا بعدا امتحان کنید'
            );
            wp_send_json($result);
        } else {
            update_user_meta($user_id, 'mobile', $mobilenum);
            $result = array(
                'success' => true,
                'error' => false,
                'message' => 'ثبت نام شما با موفقیت انجام شد',
                'redirect' => home_url('panel')
            );
            wp_send_json($result);
        }
    }
}

//*************************end register via ajax***********************************/

//*************************login via ajax***********************************/
add_action('wp_ajax_nopriv_ls_login_action1', 'ls_login_action1');
add_action('wp_ajax_ls_login_action1', 'ls_login_action1');
function ls_login_action1()
{

    $o = '
  <div id="ls-login-wrapper">
      <form action="#" id="ls-login-form" name="ls-login-form" method="post">
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
  ';
    $result = array();
    $result['content'] = $o;
    wp_die(json_encode($result));

}

//*************************end login via ajax***********************************/


//*************************commenter pic via ajax***********************************/
add_action('wp_ajax_nopriv_ls_action_commenter1', 'ls_action_commenter1');
add_action('wp_ajax_ls_action_commenter1', 'ls_action_commenter1');
function ls_action_commenter1()
{
    $uid = intval($_POST['uid']);
    $user = new WP_User($uid);


    $o = '
  <div id="ls-login-wrapper">
    <div class="big_user_image" "> ' . get_avatar($uid, "512") . '</div>
     <p style="color:#63C3D7; font-size: 20px;" >' . $user->display_name . '</p>
     <p style="color:#63C3D7; font-size: 16px;">: درباره من </p>
     <p class="biography_p">' . $user->description . '</p>
     <p>';

    if ($user->has_cap('publish_posts')) {
        $url = get_author_posts_url($uid);
        $o .= "<a style=\"color:#63C3D7; font-size: 20px;\" href= \"$url\">دیدن مطالب نوشته شده من</a>";
    }
    $o .= '</p>
  </div>
  ';

    $result = array();
    $result['content'] = $o;
    wp_die(json_encode($result));
}

//*************************comment pic via ajax***********************************/
add_action('wp_ajax_nopriv_ls_action_author1', 'ls_action_commenter1');
add_action('wp_ajax_ls_action_author1', 'ls_action_commenter1');
//*************************end of comment&author pic via ajax***********************************/


//*************************auto suggest via ajax***********************************/
add_action('wp_ajax_nopriv_auto_suggest_action1', 'auto_suggest_action1');
add_action('wp_ajax_auto_suggest_action1', 'auto_suggest_action1');
function auto_suggest_action1()
{
    if (isset($_POST['search_term']) && empty($_POST['search_term']) == false) {
        $search_term = sanitize_text_field($_POST['search_term']);

        global $wpdb, $table_prefix;
        $results = array();
        $results = $wpdb->get_results("SELECT * FROM " . $table_prefix . 'posts' . " WHERE post_title LIKE '%$search_term%'  AND post_status = 'publish' ", OBJECT);
        if (!empty($results)) {
            wp_send_json($results);
        } else {
            $results['emptysearch'] = 'موردی در بین عناوین مطالب یافت نشد (شاید کلمه کلیدی شما در محتوای مطالب سایت ما وجود داشته باشد!!!)';
            wp_send_json($results);
        }

    }
}


//*************************ls_sidebar_action1 via ajax***********************************/
add_action('wp_ajax_nopriv_ls_sidebar_action1', 'ls_sidebar_action1');
add_action('wp_ajax_ls_sidebar_action1', 'ls_sidebar_action1');
function ls_sidebar_action1()
{
    $pid = sanitize_text_field($_POST['uid']);
    $args = array(
        'p' => $pid
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        $o = '';

        while ($query->have_posts()) : $query->the_post();
            $o .= "<div class='summary_content_ajax' style='direction: rtl;'><a class='mo_redirect_link' href='" . get_the_permalink() . "'><p> لینک اصلی پست</p></a>
      <p class='title'>" . get_the_title() . "</p>
      <div class='ajax_main_content_div'>" . get_the_content() . "</div></div>";
        endwhile;
    endif;
    $result = array();
    $result['content'] = $o;
    wp_die(json_encode($result));
}

//*************************ls_linked_words_modal_action1 via ajax***********************************/
add_action('wp_ajax_nopriv_ls_linked_words_modal', 'ls_linked_words_modal');
add_action('wp_ajax_ls_linked_words_modal', 'ls_linked_words_modal');
function ls_linked_words_modal()
{
    global $wpdb, $table_prefix;
    $modal_id = sanitize_text_field($_POST['uid']);
    $modal_post = $wpdb->get_var("SELECT target_modal FROM {$table_prefix}linked_words WHERE id= $modal_id");
    $o = "<div class='summary_content_ajax' style='direction: rtl;'>

      <div class='ajax_main_content_div'>" . $modal_post . "</div></div>";

    $result = array();
    $result['content'] = $o;
    wp_die(json_encode($result));
}

//*************************ls_moat_featured***********************************/
add_action('wp_ajax_nopriv_ls_moat_featured', 'ls_moat_featured');
add_action('wp_ajax_ls_moat_featured', 'ls_moat_featured');
function ls_moat_featured()
{
    $time_amount = intval($_POST['tam']);
    $featureType = sanitize_text_field($_POST['featureType']);
    global $wpdb, $table_prefix;
    $chosen_amount = $time_amount * 24 * 60 * 60;
    ($chosen_amount == 0) ? $x_days_ago = 0 : $x_days_ago = time() - $chosen_amount;
    $arr = [];
    if ($featureType == 'like') {
        $css_class= 'thumbs-o-up';
        $table = $wpdb->get_results("SELECT * FROM {$table_prefix}post_likes_ WHERE date_liked >  $x_days_ago", OBJECT);
        foreach ($table as $key => $val) {
            $arr[] = $val->post_id;
        }
    } elseif ($featureType == 'comment') {
        $css_class= 'commenting';
        $table = $wpdb->get_results("SELECT * FROM {$table_prefix}comments WHERE UNIX_TIMESTAMP (comment_date) >  $x_days_ago ", OBJECT);
        foreach ($table as $key => $val) {
            $arr[] = $val->comment_post_ID;
        }
    } elseif ($featureType == 'view') {
        $css_class= 'eye';
        $table = $wpdb->get_results("SELECT * FROM {$table_prefix}user_visited_data WHERE date_visited >  $x_days_ago ", OBJECT);
        foreach ($table as $key => $val) {
            $arr[] = $val->post_id;
        }
    }
    $num_of_like_for_each_p = array_count_values($arr);
    arsort($num_of_like_for_each_p);
    $p_ids = array_keys($num_of_like_for_each_p);
    $all_post_args = array(
        'post_type' => array('post'),
        'post__in' => $p_ids,
        'orderby' => 'post__in',
        'order' => 'ASC',
        'posts_per_page' => 7
    );
    $o = '';
    $query = new WP_Query($all_post_args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        $o .= '
                  <li class="widget_li_745"><a href="' . get_the_permalink() . '">
                  ' . get_the_title() . ' <span class="fa fa-'.$css_class.' comment5213"><span>' . $num_of_like_for_each_p[get_the_ID()] . ' </span> </span> </a>
                  </li>';
    endwhile;
        wp_reset_postdata();
    endif;
    $result = array();
    if ($o !== null) {
        $result['content'] = $o;
        $result['success'] = true;
        wp_die(json_encode($result));
    } else {
        $result['error'] = 'error';
        wp_die(json_encode($result));
    }
}


//*************************ls_moat_featured***********************************/
add_action('wp_ajax_nopriv_ls_pagination_ajax', 'ls_pagination_ajax');
add_action('wp_ajax_ls_pagination_ajax', 'ls_pagination_ajax');
function ls_pagination_ajax()
{
   // $page_href = sanitize_text_field($_POST['page_href']);
    $paged_number = intval($_POST['paged_number']);
    $page_plus = $paged_number+1;
    $page_minus = $paged_number-1;
    $sri = sanitize_text_field($_POST['sri']);

    $maxnum = intval($_POST['maxnum']);


    $all_post_args = array(
        'post_type' => array('post'),
//        'order' => 'ASC',
//        'posts_per_page' =>9,
        'paged' => $paged_number,
    );
    $p = '';
$query = new WP_Query($all_post_args); ?>
<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $p .='<div class="one-third column post-loop">
	<div class="detailimg">
		<div class="bordered">
			<figure class="add-border">
				<a class="single-image picture-icon" rel="holder" href="'. get_the_permalink().'">'.get_the_post_thumbnail($query->post->ID, 'post-thumbnail') .'</a>
			</figure>
		</div>
		<a href="'. get_the_permalink().'"><h5>'. get_the_title(). '</h5></a>
		<div class="excerpt-absolute" style=";">
			'. get_the_excerpt().'
		</div>
	</div>
</div>';
 endwhile;
    wp_reset_postdata();
 endif;
    $result = array();
    $result['content'] = $p;










    //	$pagination .= '';
//    	    if( is_singular() )
//    	        return;
    	    global $wp_query;
    	    /*
    	    * Stop execution if there's only 1 page
    	     * */
//    	    if( $wp_query->max_num_pages <= 1 )
//    	        return;
    	    $paged =$paged_number;
    	    $max   = $maxnum;
    	    /*
    	    * Add current page to the array
    	    **/
    	    if ( $paged >= 1 )
    	        $links[] = $paged;
    	    /*
    	    * Add the pages around the current page to the array
    	    **/
    	    if ( $paged >= 3 ) {
    	        $links[] = $paged - 1;
    	        $links[] = $paged - 2;
    	    }
    	    if ( ( $paged + 2 ) <= $max ) {
    	        $links[] = $paged + 2;
    	        $links[] = $paged + 1;
    	    }
    	$o.= '<ul>' . "\n";
    	    /*
    	    * Previous Post Link
    	     * */

    if ( $paged !== 1  )
		$o.= '<li class="pagination_li before_pagination_li" data-numpage="'.$page_minus.'" data-maxnum="'.$max.'"><a href="'. home_url("?paged=$page_minus").'">«</a></li>  '."\n";
    	    /*
    	    * Link to first page, plus ellipses if necessary
    	     *  */
    	    if ( ! in_array( 1, $links ) ) {
    	        $class = 1 == $paged ? ' class="active"' : ' class="pagination_li"';
    			$o.= sprintf( '<li%s data-numpage="1" data-maxnum="'.$max.'"><a href="%s">%s</a></li>' . "\n", $class, home_url("?paged=1"), '1' );
    	        if ( ! in_array( 2, $links ) )
    				$o.= '<li>…</li>';
    	    }
    	    /*
    	     *  Link to current page, plus 2 pages in either direction if necessary
    	     *  */
    	    sort( $links );
    	    foreach ( (array) $links as $link ) {
    	        $class = $paged == $link ? ' class="active pagination_li"' : ' class="pagination_li"';
    			$o.= sprintf( '<li%s data-numpage="'.$link.'" data-maxnum="'.$max.'"><a href="%s">%s</a></li>' . "\n", $class, home_url("?paged=$link"), $link );
    	    }
    	    /*
    	    * Link to last page, plus ellipses if necessary
    	     *  */
    	    if ( ! in_array( $max, $links ) ) {
    	        if ( ! in_array( $max - 1, $links ) )
    				$o.= '<li>…</li>' . "\n";
    	        $class = $paged == $max ? ' class="active pagination_li"' : ' class="pagination_li"';
    			$o.= sprintf( '<li%s data-numpage="'.$max.'" data-maxnum="'.$max.'"><a href="%s">%s</a></li>' . "\n", $class, home_url("?paged=$max"), $max );
    	    }
    	    /*
    	    * Next Post Link
    	    **/
    	    if ( $paged !== $max  )
    			$o.= '<li class="next_pagination_li pagination_li" data-numpage="'.$page_plus.'" data-maxnum="'.$max.'"><a href="'. home_url("?paged=$page_plus").'">»</a></li> ';
    	$o.= "\n".'</ul>' . "\n";








    if ($o !== null) {

        $result['pagination'] = $o;
        $result['paged'] = $paged;
        $result['success'] = true;
        $result['max'] = $max;
        wp_die(json_encode($result));
    } else {
        $result['error'] = 'error';
        wp_die(json_encode($result));
    }
}