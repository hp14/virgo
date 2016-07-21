<?php
add_action('admin_menu', 'add_admin_menu');

function add_admin_menu()
{
    add_dashboard_page('My Plugin Dashboard', 'My Plugin', 'read', 'my-unique-identifier', 'my_plugin_function');
    $ls_theme_option_hook = add_menu_page('تنظیمات قالب', 'تنظیمات قالب', 'manage_options', 'ls_options_page_s', 'ls_options_page', 'dashicons-admin-generic');
    add_action("load-{$ls_theme_option_hook}", 'ls_theme_option_callback');
}

function ls_theme_option_callback()
{
    wp_enqueue_media();
}

function my_plugin_function()
{

}

function ls_options_page()
{
    $ls_options = get_option('lst_options');

    $whitelist = array('general', 'help', 'users', 'post','links');
       $default_tab = isset($_GET['tab']) && in_array($_GET['tab'], $whitelist) ? $_GET['tab'] : 'general';
    if (isset($_POST['submit_logo'])) {
        switch ($default_tab) {
            case 'general' :
                $ls_options['general']['ls_home_logo'] = sanitize_text_field($_POST['ls_home_logo']);
                foreach ($_POST as $key => $value) {
                    if ($key == 'submit_logo') {
                        continue;
                    }

                    if (!empty($_POST[$key])) {
                        $ls_options['general'][$key] = sanitize_text_field($_POST[$key]);
                    } else {
                        unset($ls_options['general'][$key]);
                    }
                }
                /* long version*/
//                $ls_options['general']['telegram'] = sanitize_text_field($_POST['telegram']);
//                $ls_options['general']['stumble'] = sanitize_text_field($_POST['stumble']);
//                $ls_options['general']['stumble'] = sanitize_text_field($_POST['stumble']);
//                $ls_options['general']['twitter'] = sanitize_text_field($_POST['twitter']);
//                $ls_options['general']['instagram'] = sanitize_text_field($_POST['instagram']);
                break;
            case 'help' :
                foreach ($_POST as $key => $value) {
                                   if ($key == 'submit_logo') {
                                       continue;
                                   }
                                   if (!empty($_POST[$key])) {
                                       $ls_options['help'][$key] = sanitize_text_field($_POST[$key]);
                                   } else {
                                       unset($ls_options['help'][$key]);
                                   }
                               }
                    /*export uptions from a file*/
                if(isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                    $file = $_FILES['file']['tmp_name'];
                    $settings = file_get_contents($file);
                    $ls_options = json_decode($settings, true);
                    update_option('lst_options', $ls_options);
                   // var_dump($settings_array);
                }
                break;
            case 'links' :
                foreach ($_POST as $key => $value) {
                                   if ($key == 'submit_logo') {
                                       continue;
                                   }
                                   if (!empty($_POST[$key])) {
                                       $ls_options['links'][$key] = sanitize_text_field($_POST[$key]);
                                   } else {
                                       unset($ls_options['links'][$key]);
                                   }
                               }
                break;

            case 'users' :
                foreach ($_POST as $key => $value) {
                                   if ($key == 'submit_logo') {
                                       continue;
                                   }
                                   if (!empty($_POST[$key])) {
                                       $ls_options['users'][$key] = sanitize_text_field($_POST[$key]);
                                   } else {
                                       unset($ls_options['users'][$key]);
                                   }
                               }
                break;
            case 'post' :
                foreach ($_POST as $key => $value) {
                                   if ($key == 'submit_logo') {
                                       continue;
                                   }
                                   if (!empty($_POST[$key])) {
                                       $ls_options['post'][$key] = sanitize_text_field($_POST[$key]);
                                   } else {
                                       unset($ls_options['post'][$key]);
                                   }
                               }
                break;
        }
        update_option('lst_options', $ls_options);
    }

    var_dump($ls_options);
    //var_dump($_FILES);
    ?>
    <div class="wrap">
        <h2>تنظیمات قالب</h2>

        <div class="panel-wrapper">
            <form method="get" action="admin-post.php">
                <input type="hidden" name="action" value="ls_theme_panel_setting_output">
                <input type="submit" class="" value="خروجی تنظیمات">

            </form>
            <div class="panel-inner">
                <div class="panel-sidebar">
                    <ul>
                        <li><a href="<?php echo add_query_arg('tab', 'general'); ?>">عمومی </a></li>
                        <li><a href="<?php echo add_query_arg('tab', 'post'); ?>">مطالب</a></li>
                        <li><a href="<?php echo add_query_arg('tab', 'users'); ?>">کاربران</a></li>
                        <li><a href="<?php echo add_query_arg('tab', 'help'); ?>">راهنما</a></li>
                        <li><a href="<?php echo add_query_arg('tab', 'links'); ?>">کلمات لینک دار</a></li>
                    </ul>
                </div>
                <form id="opt_panel" action="" method="post" enctype="multipart/form-data">
                    <div
                        class="panel-content"><?php include get_template_directory() . '/html/admin/' . $default_tab . '.php'; ?>
                    </div>



                </form>
            </div>
        </div>
    </div>
    <?php


}
//******exporting operation*************/
add_action('admin_post_ls_theme_panel_setting_output', 'ls_theme_panel_setting_output');
function ls_theme_panel_setting_output () {
    $settings_data = get_option('lst_options');
    $settings_data = json_encode($settings_data);
    header('Content-Description: File Transfer');
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="ls_settings.json"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . mb_strlen($settings_data));
    echo $settings_data;
}
//****** end of exporting operation*******/




//****** slider submenu operation*******/
add_action('admin_menu', 'submenu_page_options_page');
function submenu_page_options_page() {
    add_submenu_page(
        'ls_options_page_s',
        'تنظیمات اسلایدر',
        'تنظیمات اسلایدر',
        'manage_options',
        'settings_slider',
        'wpdocs_my_custom_submenu_page_callback' );
}
function wpdocs_my_custom_submenu_page_callback() {
    wp_enqueue_media();
    include get_template_directory() . '/html/admin/slider.php';
}
//******end  slider submenu operation*******/

