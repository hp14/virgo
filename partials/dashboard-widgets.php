<?php
function ls_add_dashboard_callback(){
    global $current_user;
    $u = new WP_User($current_user->ID);
    echo '<p>خوش آمدید:<span>'.$u->display_name.'</span></p>';
    var_dump($current_user);

}
function ls_add_dashboard_widge() {

	wp_add_dashboard_widget(
                 'ls_users_info',         // Widget slug.
                 'اطلاعات کاربران وبسایت',         // Title.
                 'ls_add_dashboard_callback' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'ls_add_dashboard_widge' );
