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
                <a title="Home" href="<?php echo esc_url(home_url()); ?>">صفحه اصل?</a>

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

                            <h2 class="title"><?php the_title(); ?></h2>

                            <span class="author">نوشته شده توسط <a href="#"><?php echo get_the_author(); ?></a></span>,
					<span class="comments"><a href="#"></a> <?php
                        comments_popup_link('بدون دیدگاه', '۱ دیدگاه', '% دیدگاه', 'comments-link', 'دیدگاه ها غیرفعال'); ?></span>

                        </div>
                        <!--/ .entry-title-->
                        <div class="clear"></div>

                        <?php the_content(); ?>


                        <p>
                            دسته بندی : <?php the_category(' ,') ?>
                        </p>

                        <p class="tags">
                            برچسب ها : <?php the_tags('', ',') ?>
                        </p>

                    </div>
                    <!--/ .entry-body -->

                    <div class="post-autor">
                        <div class="avatar">
                            <div class="bordered author-b">
                                <figure class="add-border">
                                    <a class="single-image"
                                       href="#"><?php echo get_avatar(get_the_author_meta('ID')); ?></a>
                                </figure>
                            </div>
                            <!--/ .bordered-->
                        </div>
                        <div class="author-profile">
                            <p style="display: inline; float: right">نویسنده:</p>
                            <?php echo get_the_author_posts_link(); ?>

                        </div>
                        <div class="author-profile">
                            <?php// echo get_the_author_meta('description');
                            ?>
                        </div>
                    </div>
                </article>
                <!--/ .entry-->

                <section id="comments">

                    <h4>2 Comments</h4>

                    <ol class="comments-list">

                        <li class="comment">

                            <article>

                                <div class="bordered alignleft">
                                    <figure class="add-border">
                                        <a class="single-image" href="#"><img src="images/gravatar.png" alt=""/></a>
                                    </figure>
                                </div>
                                <!--/ .bordered-->

                                <div class="comment-body">

                                    <div class="comment-meta">

                                        <div class="author">Maggy</div>
                                        <div class="date">September 27, 2012 at 21:55</div>

                                    </div>
                                    <!--/ .comment-meta -->

                                    <p>
                                        Etiam malesuada velit bibendum luctus. Donec sit amet orci augue, sed tristique
                                        eros.
                                        Nam ut dui sit amet risus mollis malesuada quis quis nulla.
                                    </p>

                                    <a class="comment-reply-link button default align-btn-right" href="#">Reply</a>

                                </div>
                                <!--/ .comment-body -->

                            </article>

                            <ul class="children">

                                <li class="comment">

                                    <article>

                                        <div class="bordered alignleft">
                                            <figure class="add-border">
                                                <a class="single-image" href="#"><img src="images/gravatar.png" alt=""/></a>
                                            </figure>
                                        </div>
                                        <!--/ .bordered-->

                                        <div class="comment-body">

                                            <div class="comment-meta">

                                                <div class="author">Maggy</div>
                                                <div class="date">September 27, 2012 at 21:55</div>

                                            </div>
                                            <!--/ .comment-meta -->

                                            <p>
                                                Etiam malesuada velit bibendum luctus. Donec sit amet orci augue, sed
                                                tristique eros.
                                                Nam ut dui sit amet risus mollis malesuada quis quis nulla.
                                            </p>

                                            <a class="comment-reply-link button default align-btn-right"
                                               href="#">Reply</a>

                                        </div>
                                        <!--/ .comment-body -->

                                    </article>

                                </li>

                            </ul>
                            <!--/ .children-->

                        </li>

                        <li class="comment">

                            <article>

                                <div class="bordered alignleft">
                                    <figure class="add-border">
                                        <a class="single-image" href="#"><img src="images/gravatar.png" alt=""/></a>
                                    </figure>
                                </div>
                                <!--/ .bordered-->

                                <div class="comment-body">

                                    <div class="comment-meta">

                                        <div class="author">Maggy</div>
                                        <div class="date">September 27, 2012 at 21:55</div>

                                    </div>
                                    <!--/ .comment-meta -->

                                    <p>
                                        Etiam malesuada velit bibendum luctus. Donec sit amet orci augue, sed tristique
                                        eros.
                                        Nam ut dui sit amet risus mollis malesuada quis quis nulla.
                                    </p>

                                    <a class="comment-reply-link button default align-btn-right" href="#">Reply</a>

                                </div>
                                <!--/ .comment-body -->

                            </article>

                        </li>

                    </ol>

                </section>
                <!--/ #comments-->

                <section id="respond">

                    <h4>Leave a Reply</h4>

                    <form method="post" action="" class="comments-form">

                        <p class="input-block">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name"/>
                        </p>

                        <p class="input-block">
                            <label for="email">E-mail:</label>
                            <input type="text" name="email" id="email"/>
                        </p>

                        <p class="input-block">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" cols="30" rows="10"></textarea>
                        </p>

                        <p class="input-block">
                            <button class="button default" type="submit" id="submit">Submit</button>
                        </p>

                    </form>
                    <!--/ .comments-form-->

                </section>
                <!--/ #respond-->

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