<?php global $post;
get_header(); ?>
    <!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->
<?php if (have_posts()):
    cat_set_post_view($post->ID);
    while (have_posts()):the_post(); ?>
        <section class="page-header">

            <div class="container">

                <h1><?php the_title(); ?></h1>

            </div>
            <!--/ .container-->

        </section><!--/ .page-header-->

        <!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->

        <!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->

        <section class="main container sbr clearfix">

            <div class="clear"></div>

            <!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->

            <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

            <section id="content" class="ten columns">

                <article class="entry">

                    <!--			<div class="bordered">-->
                    <!--				<figure class="add-border">-->
                    <!--					<img src="images/blog/blog-img-1.jpg" alt="" />-->
                    <!--				</figure>-->
                    <!--			</div>             -->
                    <!--/ .bordered-->

                    <div class="entry-meta">

                        <span class="date"><?php echo get_the_date('j'); ?></span>
                        <span class="month"><?php echo get_the_date('M'); ?></span>
                        <span class="month"><?php echo get_the_date('Y'); ?></span>
                        <?php global $wpdb, $table_prefix, $current_user;
                        $is_liked = $wpdb->get_row("SELECT * FROM {$table_prefix}post_likes_ WHERE user_id = '$current_user->ID' AND post_id = $post->ID", OBJECT);
                        ?>
                    </div>
                    <!--/ .entry-meta-->

                    <div class="entry-body" dir="rtl">

                        <div class="entry-title">




                            <span><span><p id="like_number">بازدید : <?php echo cat_get_post_view(get_the_ID()); ?></p></span></span>
                        </div>
                        <!--/ .entry-title-->
                        <div class="clear"></div>

<!--                        <section class="container">-->

                            <!-- - - - - - - - - - - - - Holder - - - - - - - - - - - - - - -->

                            <section class="z1 holder clearfix main_content_container">

                                <?php the_content(); ?>

                            </section>
<!--                        </section>-->


                        <span><a <?php echo isset($_COOKIE['post-' . get_the_ID()]) && intval($_COOKIE['post-' . get_the_ID()]) ? 'data-liked=0' : 'data-liked=0'; ?>
                                         href="#" data-pid="<?php echo get_the_ID() ?>" class="like-post"><i class="fa fa-thumbs-o-up single_like_i
                                <?php if ($is_liked) {
                                             echo 'is_liked';
                                         } ?>
                                "><p id="like_number"><?php echo get_post_like(get_the_ID()); ?></p></i></a>
                        			</span>
                        <p class="show_cats">
                            دسته بندی : <?php the_category(' ,') ?>
                        </p>
                        <p class="tags">
                            برچسب ها : <?php the_tags('', ',') ?>
                        </p>
                    </div>
                    <!--/ .entry-body -->
                    <div class="post-autor">
                        <div class="author"><p><span>نویسنده  :</span><a
                                    href="#"><?php echo get_the_author_posts_link(); ?></a></p></div>
                        <div class="avatar">
                            <div class="bordered author-b">
                                <figure class="add-border">
                                    <a class="single-image modal" data-uid="<?php echo get_the_author_meta('ID'); ?>"
                                       data-action="ls_action_author1"
                                       href="#"><?php echo get_avatar(get_the_author_meta('ID')); ?></a>
                                </figure>
                            </div>
                            <!--/ .bordered-->
                        </div>
                        <div class="author-profile">
                        </div>
                        <div class="author-profile">
                            <?php // echo get_the_author_meta('description');
                            ?>
                        </div>
                    </div>
                </article>
                <!--/ .entry-->
		<span class="comments number_of_comments"><a href="#"></a> <?php
            comments_popup_link('بدون دیدگاه', '۱ دیدگاه', '% دیدگاه', 'comments-link', 'دیدگاه ها غیرفعال'); ?></span>
                <hr>
                <?php comments_template(null, true) ?>


            </section>
            <!--/ #content-->

            <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->

            <!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->

            <aside id="sidebar" class="one-third column">


                <?php get_sidebar(); ?>


            </aside>
            <!--/ #sidebar-->

            <!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->


        </section><!--/ .main -->
        <?php
    endwhile;
endif;
?>
    <!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->
<?php get_footer(); ?>