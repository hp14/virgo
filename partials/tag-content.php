<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->

<section class="page-header">

	<div class="container">

        <h1>مطالب برچسب زده شده با:    <?php single_tag_title(); ?></h1>
           <div class="clear"></div>

	</div><!--/ .container-->

</section><!--/ .page-header-->

<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->

<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->

<section class="main container clearfix">

	<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->

	<div class="breadcrumbs">
           <span> <?php single_cat_title();  ?></span>

		<a title="صفحه اصلی" href="<?php echo esc_url(  home_url() ); ?>">صفحه اصلی</a>

	</div><!--/ .breadcrumbs-->

	<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->


	<!-- - - - - - - - end Portfolio Filter - - - - - - - - - - -->

	<section id="gallery" class="gallery">
           <?php
           if ( have_posts() ) {
           	while ( have_posts() ) {
           		the_post(); 	?>

                   <article class="one-third column" data-categories="sermons people">

                   				<div class="project-thumb">


                   					<div class="bordered">
                                           <a>xxx</a>
                   						<figure class="add-border">
                   							<a class="single-image picture-icon" rel="gallery" href="images/full/08.jpg"><?php  the_post_thumbnail('post-thumbnail') ?></a>
                   						</figure>
                                           <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                   					</div><!--/ .bordered-->

                   				</div><!--/ .project-thumb-->

                   			</article><!--/ .one-third-->


                   <?php
           	} // end while
           } // end if
           ?>



	</section><!--/ #portfolio-items-->

</section><!--/ .main -->

<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->


<!-- - - - - - - - - - - - - - - extra script - - - - - - - - - - - - - - - - -->

   <!-- - - - - - - - - - - - - - - end extra script - - - - - - - - - - - - - - - - -->
