<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->

<section class="container">

    <!-- - - - - - - - - - - - - Holder - - - - - - - - - - - - - - -->

    <section class="z1 holder clearfix">


        <form class="search_form" action="" method="get" id="searchform">
<div class="clear"></div>



            <i class="fa fa-search search_icon_span" style="font-size: 18px;" aria-hidden="true"></i>
            <input class="autosuggest" data-action="auto_suggest_action1"
                   placeholder="جستجو کنید" type="text" name="s"/>
            <button class="search_button" type="submit" title="Search"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>

            <img id="autosuggest_pic" src=" <?php echo get_template_directory_uri() . '/images/rolling.gif'; ?>" alt="">
            <div class="dropdown">
                <ul class="result_drop">
                </ul>
            </div>


        </form>
        <!--/ #searchform-->
        <div class="loops_all">
        <?php get_template_part('partials/loops/post-loop');   ?>
        </div>
        <div class="clear"></div>
        <div class="pagination">
            <?php get_template_part('partials/pagination'); ?>

        </div>
    </section>
    <!--/ .holder-->
    <!--	<a data-page="2" href="#" class="button default load-more">مطالب بیشتر</a>-->


    <!-- - - - - - - - - - - - end Holder - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - - Bottom Sidebar - - - - - - - - - - - - - - - - -->
    <!--    <aside id="bottom-sidebar" class="clearfix">-->
    <?php
     if ( is_active_sidebar( 'after_main_content_loop_widget' ) ) : ?>
    	<ul id="sidebar">
    		<?php dynamic_sidebar( 'after_main_content_loop_widget' ); ?>
    	</ul>
    <?php endif; ?>
    <!--    </aside>-->
    <!--/ #bottom-sidebar-->

    <!-- - - - - - - - - - - - - end Bottom Sidebar - - - - - - - - - - - - - - - -->

</section><!--/ .main -->

<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->