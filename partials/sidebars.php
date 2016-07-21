<?php

global $post;
$ls_default_args = array(
	'name'         					 => 'پست های مربوط به این دسته بندی',
	'id'            						 => 'ls_sidebar',
	'description'  					 => 'اولین ساید با قالب ورد پرس ',
    'class'        						 => '',
	'before_widget'			 => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  				 => '</li>',
	'before_title'  				 => '<h2 class="widgettitle">',
	'after_title'   					 => '</h2>',
	'post_id' 						 =>$post->ID);
?>
<?php register_sidebar( $ls_default_args ); ?>
<?php

$ls_default_args2 = array(
	'name'         					 => 'پست های مربوط به این دسته بندی',
	'id'            						 => 'after_main_content_loop_widget',
	'description'  					 => 'ابزارک بعد از لوپ اصلی در صفحه اصلی',
    'class'        						 => '',
	'before_widget'			 => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  				 => '</li>',
	'before_title'  				 => '<h2 class="widgettitle">',
	'after_title'   					 => '</h2>',
	'post_id' 						 =>$post->ID);
?>
<?php register_sidebar( $ls_default_args2 ); ?>


