<?php if( post_password_required() ){	return;}?>
<!--<h4>تعداد کامنت ها : --><?php //echo get_comments_number(); ?><!--</h4>-->

<section id="comments">
<?php if(have_comments()): ?>
			<ol class="comments-list">
<?php wp_list_comments(array(
    'callback' =>'comments_callback' ,
    'style'       =>'ol'
)); ?>

			</ol>
<?php endif;
$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = ($req ? "aria-required='true' " : '');
$required_text= "<span class='cf11 required'>&nbsp;*&nbsp;</span>"
?>
</section><!--/ #comments-->

	<section id="respond">


<!--		<form method="post" action="" class="comments-form" name="testform">-->
			<?php $fields = array(
				'author' =>'
			<p class="input-block">
				' .($req ? "<span class='cf11 required'>&nbsp;*&nbsp;</span>" : "" ) . '<label class="cf11" for="name"> : نام </label>
				<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '"            '.$aria_req.'   />
			</p>
			','email'=>'
			<p class="input-block">
				' .($req ? "<span class='cf11 required'>&nbsp;*&nbsp;</span>" : "" ) . '<label class="cf11" for="name"> : ایمیل </label>
				<input type="text" name="email" id="email"  value="' . esc_attr( $commenter['comment_author_email'] ) . '"          '.$aria_req.'/>
			</p>
		'
		/*,'text'=>'
			<p class="input-block">
				<label for="message">Message:</label>' .($req ? "<span class='required'>*</span>" : "" ) . '
			<textarea name="message" id="message" cols="30" rows="10"></textarea>
			</p>
            ','submit'=>'
		<p class="input-block">
				<button class="button default" type="submit" id="submit">Submit</button>
			</p>
            '*/
            ); ?><!--   </form>/ .comments-form-->

                    	</section><!--/ #respond-->

<?php
    $comments_args = array(
    'fields'=>$fields,
    'title_reply'=> '',
    'label_submit'=>'ارسال',
    'comments_form_before_send'=>'',
		'comment_notes_before'=>'',
		'comment_notes_after'=>'<p class="input-block">
								<button class="button default" type="submit" id="submit" name="submit">ارسال</button>
							</p>',
    'comments_form_after_send'=>''

    );
    comment_form($comments_args); ?>


