<?php
/**
 * Template Name: Full Width Page
 */
get_header(); ?>
<?php

$first_name = sanitize_text_field($_POST['first']);
$last_name = sanitize_text_field($_POST['last']);
$mobile = sanitize_text_field($_POST['mobile']);
$u_mail = sanitize_email($_POST['email']);
$u_description = sanitize_text_field($_POST['description']);
$uid = get_current_user_id();
if (isset($_POST['user_submit'])) {
    update_user_meta($uid, 'mobile', $mobile);
    update_user_meta($uid, 'first_name', $first_name);
    update_user_meta($uid, 'last_name', $last_name);
    update_user_meta($uid, 'email', $u_mail);
    update_user_meta($uid, 'description', $u_description);
    wp_update_user(array('ID' => $uid, 'user_email' => $u_mail));
} ?>
    <!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->

    <section class="page-header">

        <div class="container">

            <h1><?php the_title(); ?></h1>

        </div>
        <!--/ .container-->

    </section><!--/ .page-header-->

    <!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->

    <section class="main container sbr clearfix">

        <!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->

        <div class="breadcrumbs">
            <?php the_category(' ,') ?>
            <a title="Home" href="<?php echo esc_url(home_url()); ?>">صفحه اصلی</a>

            <p style="display: inline;">مشخصات شخصی</p>


        </div>
        <!--/ .breadcrumbs-->
        <div class="clear"></div>

        <!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

        <div class="content-tabs tabs-style-3">


            <!--/ .tabs-nav -->

            <div class="tabs-container">

                <div class="tab-content" id="tab9">

                    <?php //var_dump(wp_get_current_user()) ?>
                    <form class="personal_info_form" action="" method="post">

                        <div class="bordered" style="float: right;">
                     												<figure class="add-border">
                     													<a class="single-image modal" data-uid="<?php echo get_current_user_id(); ?>" data-action="ls_action_author1" href="#"><?php echo get_avatar(get_current_user_id()); ?></a>
                     												</figure>
                     	</div><!--/ .bordered-->

                        <div class="clear"></div>
                        <p class="fr">
                            شما میتوانید تصویر پروفایل خود  را <a style="color: #bf000b;" href="https://fa.gravatar.com">اینجا</a>  عوض کنید
                        </p>
                        <div class="clear"></div>
                        <p class="input-block">
                            <label>نام</label>
                            <input placeholder="...نام"
                                   value="<?php echo get_user_meta(get_current_user_id(), 'first_name', true) ?>"
                                   name="first" type="text"/>
                        </p>

                        <p class="input-block">
                            <label>نام خانوادگی</label>
                            <input placeholder="...نام خانوادگی"
                                   value="<?php echo get_user_meta(get_current_user_id(), 'last_name', true) ?>"
                                   name="last" type="text"/>
                        </p>

                        <p class="input-block">
                            <label>تاریخ تولد</label>
                            <input placeholder="...تاریخ تولد" name="birth" type="text"/>
                        </p>

                        <p class="input-block">
                            <label>موبایل</label>
                            <input placeholder="...موبایل"
                                   value="<?php echo get_user_meta(get_current_user_id(), 'mobile', true) ?>"
                                   name="mobile" type="text"/>
                        </p>

                        <p class="input-block">
                            <label>ایمیل</label>
                            <input placeholder="...ایمیل" value="<?php echo get_user_meta(get_current_user_id(), 'email', true) ?>"
                                   name="email" type="text"/>
                        </p>

                        <p class="input-block">
                            <label>password</label>
                            <input
                                   value="<?php echo wp_get_current_user()->user_pass; ?>"
                                   name="pass" type="password"/>
                        </p>
                        <p class="input-block">
                            <label>درباره خودتان:</label>
                            <textarea cols="30" rows="10" placeholder="...درباره خودتان"
                                   name="description"><?php echo get_user_meta(get_current_user_id(), 'description', true) ?></textarea>
                        </p>

                        <?php wp_nonce_field('user-profile-save'); ?>
                        <p>
                            <button class="button default" type="submit" name="user_submit">Submit</button>
                        </p>
                    </form>
                </div>
                <!--/ .tab-content -->

                <div class="tab-content" id="tab10">

                    <div class="bordered alignleft">
                        <figure class="add-border">
                            <a href="#"><img src="images/temp/recent-img-3.jpg" alt=""/></a>
                        </figure>
                    </div>
                    <!--/ .bordered-->

                    <h5>Pellentesque condimentum</h5>

                    <p>
                        Etiam malesuada velit bibendum luctus. Donec sit amet orci augue, sed tristique eros.
                        Nam ut dui sit amet risus mollis malesuada quis quis nulla. Vestibulum ante ipsum primis in.
                    </p>

                </div>
                <!--/ .tab-content -->

                <div class="tab-content" id="tab11">

                    <p>
                        Donec nunc ipsum, loboris non convallis laoret amet hendrerit rutrum iaculis. Aliquam
                        vitae odio elit. Nullam sed nisi ac arcu condimentum var ius. Etiam malesuada velit bibendum
                        luctus.
                    </p>

                    <ul class="list type-1">
                        <li>Nullam a ligula justo, quis varius ante</li>
                        <li>Curabitur molestie, elit mattis tempus pharetra</li>
                        <li>Mauris nisl tristique sem, nec lobortis ligula nulla</li>
                        <li>Aliquam nec purus sit amet turpis</li>
                    </ul>

                </div>
                <!--/ .tab-content -->

                <div class="tab-content" id="tab12">

                    <p>
                        Donec nunc ipsum, loboris non convallis laoret amet hendrerit rutrum iaculis. Aliquam
                        vitae odio elit. Nullam sed nisi ac arcu condimentum var ius. Etiam malesuada velit bibendum
                        luctus.
                    </p>

                    <ul class="ordered type-1">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Cconsectetur adipisicing elit eiusmod</li>
                        <li>Tempor incididunt ut labore</li>
                        <li>Curabitur molestie, elit mattisa</li>
                        <li>Mauris nisl tristique sem, lobortis</li>
                    </ul>

                </div>
                <!--/ .tab-content -->

            </div>
            <!--/ .tabs-container -->

        </div>
        <!--/ .content-tabs-->

        <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->


    </section><!--/ .main -->

    <!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->

<?php get_footer(); ?>