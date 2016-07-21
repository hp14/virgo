<?php get_header(); ?>
	<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->
	
	<section class="page-header">
		
		<div class="container">
			
			<h1>ظ…ط·ط§ظ„ط¨ ط¯ط³طھظ‡ ط¨ظ†ط¯غŒ ط´ط¯ظ‡:    <?php single_cat_title(); ?></h1>
            <div class="clear"></div>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">
            <span> <?php get_the_archive_title();  ?></span>

			<a title="طµظپط­ظ‡ ط§طµظ„غŒ" href="<?php echo esc_url(  home_url() ); ?>">طµظپط­ظ‡ ط§طµظ„غŒ</a>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		

		<!-- - - - - - - - end Portfolio Filter - - - - - - - - - - -->	

		<section id="portfolio-items" class="portfolio-items pl-col-3">
            <?php
            if ( have_posts() ) {
            	while ( have_posts() ) {
            		the_post(); 	?>

                    <article class="one-third column" data-categories="sermons people">

                    				<div class="project-thumb">

                    					<div class="bordered">
                    						<figure class="add-border">
                    							<a class="single-image picture-icon" rel="gallery_group" href="<?php the_permalink(); ?>">
                                                    <?php  the_post_thumbnail('post-thumbnail') ?>
                    							</a>
                    						</figure>
                    					</div><!--/ .bordered-->

                    				</div><!--/ .project-thumb-->

                    				<div class="project-meta detailimg">

                    					<h5 class="title-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
<!--                                        <div class="excerpt-absolute">-->
<!--                    					--><?php //the_excerpt(); ?>
<!--                                        </div>-->
                    				</div><!--/ .project-meta-->

                    			</article><!--/ .one-third-->


                    <?php
            	} // end while
            } // end if
            ?>



		</section><!--/ #portfolio-items-->



        <!-- - - - - - - - - - - - - Pagenavi - - - - - - - - - - - - - - -->

        		<div class="wp-pagenavi clearfix">
                   <?php get_template_part('partials/pagination'); ?>
   		        </div><!--/ .wp-pagenavi-->


        		<!-- - - - - - - - - - - end Pagenavi - - - - - - - - - - - - - -->

	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			
		

	<!-- - - - - - - - - - - - - - - extra script - - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - - end extra script - - - - - - - - - - - - - - - - -->

<?php get_footer(); ?>