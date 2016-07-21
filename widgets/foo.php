<?php

class Cat_Post_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'Cat_Post_Widget', // Base ID
            'Cat Post Widget', // Name
            array( 'description' => __( 'A Foo Widget', 'text_domain' ), ) // Args
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

        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        $cat_id=  get_the_category()[0]->cat_ID;
        global $post;
        $pID = $post->ID;
        $term_id = get_the_terms($pID,'genre')[0]->term_id;
        $term_name = get_the_terms($pID,'genre')[0]->name;
        $argss = array(
            'tax_query' => array(
                       		array(
                       			'taxonomy' => 'genre',
                                'field'    => 'term_id',
                                'terms'    => $term_id
                       		)
                   )
        );
        $q = new WP_Query($argss );
        if($q->have_posts()):
            echo '<div class="w34"><h2>'.$term_name.'</h2></div>';
            echo '<ul dir="rtl">';
            while ($q->have_posts()):
            $q->the_post();
            echo '<li class="';
               if( $pID ==$q->post->ID){ echo 'current-page';}
                echo ' cat-item widget220"><a class="modal" data-uid="'.$q->post->ID.'" data-action="ls_sidebar_action1" href=" '.get_the_permalink($q->post->ID).' ">'.get_the_title($q->post->ID).'</a></li>';
            endwhile;
            echo '</ul dir="rtl">';
        endif;
        wp_reset_postdata();
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
            //$title = $instance[ 'title' ];
            $title = get_the_category()[0]->name;
        }
        else {
            //$title = __( 'ÓÊ åÇ? Ï?Ñ? ˜å ÏÑ Ç?ä ÏÓÊå ÞÑÇÑ ÏÇÑäÏ', 'text_domain' );
            $title = get_the_category()[0]->name;
        }
        ?>
        <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<!--        <input class="widefat" id="--><?php //echo $this->get_field_id( 'title' ); ?><!--" name="--><?php //echo $this->get_field_name( 'title' ); ?><!--" type="text" value="--><?php //echo  $title ; ?><!--" />-->
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
	register_widget( 'Cat_Post_Widget' );
});