<?php
global $lst_options;

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;


if($_GET['sort'] == 'most_viewed' ){
	$all_post_args = array(
	    'post_type' => array('post'),
	    'meta_key' => 'views',
	    'orderby' => 'meta_value_num',
	    'order' => 'DESC',
		'paged' => $paged,

	);
}elseif($_GET['sort'] == 'most_liked'){
	$all_post_args = array(
	    'post_type' => array('post'),
	    'meta_key' => 'likes',
	    'orderby' => 'meta_value_num',
	    'order' => 'DESC',
		'paged' => $paged,

	);
}elseif($_GET['sort'] == 'most_commented'){
	$all_post_args = array(
	    'post_type' => array('post'),
	    'orderby' => 'comment_count',
	    'order' => 'DESC',
		'paged' => $paged,

	);
}
else{
	$all_post_args = array(
	    'post_type' => array('post'),
		'paged' => $paged,

	//,    'posts_per_page'=> $lst_options['post']['posts_number']
	);
}

//$all_post_args = array(
//    'post_type' => array('post'),
//	'paged' => $paged
////,    'posts_per_page'=> $lst_options['post']['posts_number']
//);
$query = new WP_Query($all_post_args); ?>
<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
<div class="one-third column post-loop">
	<div class="detailimg">
		<div class="bordered">
			<figure class="add-border">
				<a class="single-image picture-icon" rel="holder" href="<?php the_permalink(); ?>"><?php  echo get_the_post_thumbnail($query->post->ID, 'post-thumbnail') ?></a>
			</figure>
		</div><!--/ .bordered-->
		<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
		<div class="excerpt-absolute" style=";">
			<?php the_excerpt(); ?>
		</div>
	</div><!--/ .detailimg-->

</div><!--/ .one-third-->
<?php endwhile;
    wp_reset_postdata();
 endif; ?>