<?php global $post;
cat_set_post_view($post->ID);
get_header(); ?>
    <!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->
<?php if (have_posts()):
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

            <!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->

            <div class="breadcrumbs">
                <?php the_category(' ,') ?>
                <a title="Home" href="<?php echo esc_url(home_url()); ?>">صفحه اصلی</a>

                <p style="display: inline;"><?php the_title(); ?></p>


            </div>
            <!--/ .breadcrumbs-->
            <div class="clear"></div>

            <!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->

            <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

            <section id="content" class="ten columns">

                <article class="entry">

                    <!--			<div class="bordered">-->
                    <!--				<figure class="add-border">-->
                    <!--					<img src="images/blog/blog-img-1.jpg" alt="" />-->
                    <!--				</figure>-->
                    <!--			</div><!--/ .bordered-->

                    <div class="entry-meta">

                        <span class="date"><?php echo get_the_date('j'); ?></span>
                        <span class="month"><?php echo get_the_date('M'); ?></span>
                        <span class="month"><?php echo get_the_date('Y'); ?></span>

                    </div>
                    <!--/ .entry-meta-->

                    <div class="entry-body" dir="rtl">

                        <div class="entry-title" style="float: right;">




                        </div>
                        <!--/ .entry-title-->
                        <div class="clear"></div>

                        <?php the_content(); ?>






                    </div>
                    <!--/ .entry-body -->


                </article>
                <!--/ .entry-->





            </section>
            <!--/ #content-->

            <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->

            <!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->

            <aside id="sidebar" class="one-third column">


                <?php get_sidebar(); ?>

                <!--		<div class="widget widget_search">-->
                <!---->
                <!--			<form action="/" method="post" id="searchform">-->
                <!---->
                <!--				<fieldset>-->
                <!---->
                <!--					<input type="text" />-->
                <!---->
                <!--					<button type="submit" title="Search">Search</button>-->
                <!---->
                <!--				</fieldset>-->
                <!---->
                <!--			</form><!--/ #searchform-->-->
                <!---->
                <!--		</div><!--/ .widget-->-->

                <div class="widget widget_popular_posts">

                    <h3 class="widget-title">Popular Posts</h3>

                    <ul>
                        <li>
                            <div class="bordered alignleft">
                                <figure class="add-border">
                                    <a class="single-image" href="#"><img src="images/temp/recent-img-1.jpg"
                                                                          alt=""/></a>
                                </figure>
                            </div>
                            <!--/ .bordered-->
                            <h6><a href="#">Donec rutrum lobortis nulla</a></h6>

                            <div class="entry-meta">Sep, 15, <a href="#">2 Comments</a></div>
                        </li>
                        <li>
                            <div class="bordered alignleft">
                                <figure class="add-border">
                                    <a class="single-image" href="#"><img src="images/temp/recent-img-2.jpg"
                                                                          alt=""/></a>
                                </figure>
                            </div>
                            <!--/ .bordered-->
                            <h6><a href="#">Consequuntur magni dolores eos qui ratione</a></h6>

                            <div class="entry-meta">Sep, 15, <a href="#">2 Comments</a></div>
                        </li>
                        <li>
                            <div class="bordered alignleft">
                                <figure class="add-border">
                                    <a class="single-image" href="#"><img src="images/temp/recent-img-3.jpg"
                                                                          alt=""/></a>
                                </figure>
                            </div>
                            <!--/ .bordered-->
                            <h6><a href="#">Nulla vitae elit libero, a pharetra augue</a></h6>

                            <div class="entry-meta">Sep, 15, <a href="#">2 Comments</a></div>
                        </li>
                    </ul>

                </div>
                <!--/ .widget-->

                <div class="widget widget_categories">

                    <h3 class="widget-title">Categories</h3>

                    <ul>
                        <li><a href="#">Announcements</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">Ministries</a></li>
                        <li><a href="#">Missions</a></li>
                    </ul>

                </div>
                <!--/ .widget-->

                <div class="widget widget_latest_tweets">

                    <h3 class="widget-title">Latest Tweets</h3>

                    <div id="tweet"></div>

                </div>
                <!--/ .widget-->

                <div class="widget widget_flickr">

                    <h3 class="widget-title">Flickr Feed</h3>

                    <ul id="flickr-badge" class="flickr-badge clearfix"></ul>

                </div>
                <!--/ .widget-->

                <div class="widget widget_video">

                    <h3 class="widget-title">Video</h3>

                    <video width="300" height="160" style="width: 100%; height: 100%;" id="player1"
                           poster="media/echo-hereweare.jpg" controls="controls" preload="none">
                        <!-- MP4 source must come first for iOS -->
                        <source type="video/mp4" src="media/echo-hereweare.mp4"/>
                        <!-- WebM for Firefox 4 and Opera -->
                        <source type="video/webm" src="media/echo-hereweare.webm"/>
                        <!-- OGG for Firefox 3 -->
                        <source type="video/ogg" src="media/echo-hereweare.ogv"/>
                        <!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
                        <object width="300" height="160" type="application/x-shockwave-flash"
                                data="js/flashmediaelement.swf">
                            <param name="movie" value="js/flashmediaelement.swf"/>
                            <param name="flashvars"
                                   value="controls=true&poster=media/echo-hereweare.jpg&file=media/echo-hereweare.mp4"/>
                            <!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
                            <img src="media/echo-hereweare.jpg" width="300" height="160" alt="Here we are"
                                 title="No video playback capabilities"/>
                        </object>
                    </video>

                </div>
                <!--/ .widget-->

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