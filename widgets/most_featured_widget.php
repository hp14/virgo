<?php

class Most_featured_widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'Most_featured_widget', // Base ID
            'Most featured widget', // Name
            array( 'description' => __( 'Most featured widget shown after the main loop in index file', 'text_domain' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        global $post;
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }

















        ?>
        <section class="container">
        <section class="z1 holder clearfix">
            <!--            <div id="sep220"></div>-->

            <div class="one-third column">
                <div class="container715">
                    <h3 class="widget_title_h3">پر لایک ترین ترین مطالب</h3>

                    <form action="" method="get" class="most_liked_form">
                        <select name="most_liked"  id="most_liked_select">
                            <option id="most_liked" data-tam="7" data-featuretype="like" value="7" <?php selected($_GET['most_liked'], 7); ?>>در هفته</option>
                            <option id="most_liked" data-tam="30" data-featuretype="like" value="30" <?php selected($_GET['most_liked'], 30); ?>>در ماه</option>
                            <option id="most_liked" data-tam="9999999" data-featuretype="like" value="all" <?php selected($_GET['most_liked'], 'all'); ?>>کل</option>
                        </select>
                    </form>
                </div>
                <div class="clear"></div>
                <div class="cssload-thecube wait_most_like_by_time">
             				<div class="cssload-cube cssload-c1"></div>
             				<div class="cssload-cube cssload-c2"></div>
             				<div class="cssload-cube cssload-c4"></div>
             				<div class="cssload-cube cssload-c3"></div>
             			</div>
                <ul class="most_like_by_time">
                    <?php
                    if ($_GET['most_liked']) {
                        $days = intval($_GET['most_liked']);
                        ?>
                        <script>        $('html, body').animate({
                                scrollTop: $(".most_liked_form").offset().top
                            }, 2000);</script><?php
                    } else {
                        $days = 7;
                    }
                    global $wpdb, $table_prefix;
                    $chosen_amount = $days * 24 * 60 * 60;
                    ($chosen_amount == 0) ? $x_days_ago = 0 : $x_days_ago = time() - $chosen_amount;
                    $table = $wpdb->get_results("SELECT * FROM {$table_prefix}post_likes_ WHERE date_liked >  $x_days_ago", OBJECT);
                    $arr = [];
                    foreach ($table as $key => $val) {
                        $arr[] = $val->post_id;
                    }
                    $num_of_like_for_each_p = array_count_values($arr);
                    arsort($num_of_like_for_each_p);
                    $p_ids = array_keys($num_of_like_for_each_p);

                    $all_post_args = array(
                        'post_type' => array('post'),
                        'post__in' => $p_ids,
                        'orderby' => 'post__in',
                        'order' => 'ASC',
                        'posts_per_page' => 7
                    );
                    $query = new WP_Query($all_post_args);
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        <li class="widget_li_745"><a href="<?php the_permalink(); ?>"><?php the_title();
                                echo ' <i class="fa fa-thumbs-o-up comment5213" aria-hidden="true"><span>' . $num_of_like_for_each_p[$post->ID] . ' </i></span>  '; ?> </a>
                        </li>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </ul>
                <!--/ .widget-->

            </div>
            <!--/ .one-third-->
            <div id="sep221"></div>
            <div class="one-third column">
                <div class="container715">
                    <h3 class="widget_title_h3">پر کامنت ترین ترین مطالب</h3>

                    <form action="" method="get" class="most_commented_form">
                        <select name="most_commented" id="most_liked_select">
                            <option data-tam="7" data-featuretype="comment" value="7" <?php selected($_GET['most_commented'], 7); ?>>در هفته</option>
                            <option data-tam="30" data-featuretype="comment" value="30" <?php selected($_GET['most_commented'], 30); ?>>در ماه</option>
                            <option data-tam="99999999" data-featuretype="comment" value="all" <?php selected($_GET['most_commented'], 'all'); ?>>کل</option>
                        </select>
                    </form>
                </div>
                <div class="clear"></div>
                <ul class="most_like_by_time">
                    <?php
                    if ($_GET['most_commented']) {
                        $days = intval($_GET['most_commented']);
                    } else {
                        $days = 7;
                    }
                    global $wpdb, $table_prefix;
                    $chosen_amount = $days * 24 * 60 * 60;
                    ($chosen_amount == 0) ? $x_days_ago = 0 : $x_days_ago = time() - $chosen_amount;
                    $table = $wpdb->get_results("SELECT * FROM {$table_prefix}comments WHERE UNIX_TIMESTAMP (comment_date) >  $x_days_ago ", OBJECT);
                    //                        $table = $wpdb->get_results("SELECT * FROM {$table_prefix}comments WHERE date_liked >  $x_days_ago", OBJECT);
                    //var_dump($table);
                    $arr2 = [];
                    foreach ($table as $key => $val) {
                        $arr2[] = $val->comment_post_ID;
                    }
                    //var_dump($arr2);
                    $num_of_comment_for_each_p = array_count_values($arr2);
                    arsort($num_of_comment_for_each_p);
                    $p_ids2 = array_keys($num_of_comment_for_each_p);

                    $all_post_args2 = array(
                        'post_type' => array('post'),
                        'post__in' => $p_ids2,
                        'orderby' => 'post__in',
                        'order' => 'ASC',
                        'posts_per_page' => 7
                    );
                    $query2 = new WP_Query($all_post_args2);
                    if ($query2->have_posts()) : while ($query2->have_posts()) : $query2->the_post(); ?>
                        <li class="widget_li_745"><a href="<?php the_permalink(); ?>"><?php the_title();
                                echo ' <i class="fa fa-commenting comment5213" aria-hidden="true"><span>' . $num_of_comment_for_each_p[$post->ID] . ' </i></span>  '; ?> </a>
                        </li>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </ul>
                <!--/ .widget-->

            </div>
            <!--/ .one-third-->
            <div id="sep222"></div>
            <div class="one-third column">
                <div class="container715">
                    <h3 class="widget_title_h3">پر بازدید ترین ترین مطالب</h3>

                    <form action="" method="get" class="most_commented_form">
                        <select name="most_visited" id="most_liked_select">
                            <option data-tam="7" data-featuretype="view" value="7" <?php selected($_GET['most_visited'], 7); ?>>در هفته</option>
                            <option data-tam="30" data-featuretype="view" value="30" <?php selected($_GET['most_visited'], 30); ?>>در ماه</option>
                            <option data-tam="99999" data-featuretype="view" value="all" <?php selected($_GET['most_visited'], 'all'); ?>>کل</option>
                        </select>
                    </form>
                </div>
                <div class="clear"></div>
                <ul class="most_like_by_time">
                    <?php
                    if ($_GET['most_visited']) {
                        $days = intval($_GET['most_visited']);
                    } else {
                        $days = 7;
                    }
                    global $wpdb, $table_prefix;
                    $chosen_amount = $days * 24 * 60 * 60;
                    ($chosen_amount == 0) ? $x_days_ago = 0 : $x_days_ago = time() - $chosen_amount;
                    $table = $wpdb->get_results("SELECT * FROM {$table_prefix}user_visited_data WHERE date_visited >  $x_days_ago ", OBJECT);
                    //var_dump($table);
                    $arr3 = [];
                    foreach ($table as $key => $val) {
                        $arr3[] = $val->post_id;
                    }
                    $num_of_visit_for_each_p = array_count_values($arr3);
                    arsort($num_of_visit_for_each_p);
                    $p_ids3 = array_keys($num_of_visit_for_each_p);

                    $all_post_args3 = array(
                        'post_type' => array('post'),
                        'post__in' => $p_ids3,
                        'orderby' => 'post__in',
                        'order' => 'ASC',
                        'posts_per_page' => 7
                    );
                    $query3 = new WP_Query($all_post_args3);
                    if ($query3->have_posts()) : while ($query3->have_posts()) : $query3->the_post(); ?>
                        <li class="widget_li_745"><a href="<?php the_permalink(); ?>"><?php the_title();
                                echo ' <i class="fa fa-eye comment5213" aria-hidden="true"><span>' . $num_of_visit_for_each_p[$post->ID] . ' </i></span>  '; ?> </a>

                        </li>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    /*edit in 24 tir 95:
                        1- the functionality of reading for most visited almost completed... debugging still remain
                        2- the insert operation for visit for every visit in db is not started and has to be worked
                  */

                    ?>
                </ul>
                <!--/ .widget-->

            </div>
            <!--/ .one-third-->


        </section>
    </section>






        <?php
        echo $after_widget;



















    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {


        }
        else {

        }
        ?>
        <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

} // class Cat_Post_Widget

add_action( 'widgets_init', function(){
	register_widget( 'Most_featured_widget' );
});