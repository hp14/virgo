<?php

class Ls_Form_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'ls_form_widget', // Base ID
            'فرم اختصاصی برای ابزارک وردپرس', // Name
            array( 'description' => __( 'فرم اختصاصی', 'text_domain' ), ) // Args
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

        echo $instance['catt'];
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
       ?>
        <div class="ads-box">
            <div class="ads-item">
                <a href="<?php echo $instance['ads_url'] ?>">
                    <img src="<?php echo $instance['ads_image_url'] ?>" >
                </a>
            </div>
        </div>
<form name=""action="<?php get_permalink(); ?>">
<div class="form-row">
    <input type="text">
</div>
    <div class="form-row">
        <button class="button default" type="submit" id="submit" name="submit-form-wiget">ارسال</button>
    </div>
</form>
        <?php
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
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'عنوان ابزارک', 'text_domain' );
        }
        $catt_id=intval( $instance[ 'catt' ] );
        $catts = get_categories();

        ?>
        <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title ; ?>" />
        </p>
        <p>
                <label for="<?php echo $this->get_field_name( 'catt' ); ?>"><?php _e( 'دسته بندی:' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'catt' ); ?>" id="<?php echo $this->get_field_id( 'catt' ); ?>">
                <?php if (count($catts>0)) :
                foreach($catts as $c){ ?>
                    <option value="<?php echo $c->term_id; ?>"<?php selected($c->term_id,$catt_id); ?> ><?php echo $c->name; ?></option>
                <?php   } ?>
                <?php endif; ?>
            </select>
         </p>
        <div class="ads-wrapper">
<input type="text" placeholder="آدرس تصویر تبلیغ" name="<?php echo $this->get_field_name( 'ads_image_url' ); ?>" id="<?php echo $this->get_field_name( 'ads_image_url' ); ?>">
<input type="text" placeholder="آدرس تبلیغ" name="<?php echo $this->get_field_name( 'ads_url' ); ?>" id="<?php echo $this->get_field_name( 'ads_url' ); ?>">
        </div>
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
        $instance['catt'] = ( !empty( $new_instance['catt'] ) ) ? strip_tags( $new_instance['catt'] ) : '';
        $instance['ads_url'] = ( !empty( $new_instance['ads_url'] ) ) ? strip_tags( $new_instance['ads_url'] ) : '';
        $instance['ads_image_url'] = ( !empty( $new_instance['ads_image_url'] ) ) ? strip_tags( $new_instance['ads_image_url'] ) : '';

        return $instance;
    }

} // class Cat_Post_Widget

add_action( 'widgets_init', function(){	register_widget( 'Ls_Form_Widget' );});
