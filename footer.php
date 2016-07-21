
<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->

<footer id="footer">
    <?php wp_footer(); ?>
	<div class="container clearfix">

		<div class="four columns">

			<div class="widget widget_text">

				<h3 class="widget-title">درباره ما</h3>

				<div class="textwidget">

					<p>
						<?php global $lst_options;
						if(!empty( $lst_options['general']['about_us'])){
						                        echo $lst_options['general']['about_us']; } ?>
					</p>

				</div><!--/ .textwidget-->

			</div><!--/ .widget-->

			<div class="widget widget_contacts">

				<div class="vcard">
					<p><?php	if(!empty( $lst_options['general']['address'])){
										 echo $lst_options['general']['address'].'<span class="contact street-address"></span>'; } ?></p>
					<p>  <?php	if(!empty( $lst_options['general']['phone'])){
							echo $lst_options['general']['phone'].'<span class="contact tel"></span>'; } ?></p>
					<p> <?php	if(!empty( $lst_options['general']['email'])){
						echo $lst_options['general']['email'].'<span class="contact email"></span>'; } ?></p>
				</div><!--/ .vcard-->

			</div><!--/ .widget-->
			<div class="clear"></div>

		   <div class="widget widget_social">

				<ul class="social-icons clearfix">
					<?php global $lst_options;
					if(!empty($lst_options['general']['twitter'])): ?>
						<li class="twitter"><a href="<?php echo $lst_options['general']['twitter'] ?>">Twitter<span></span></a></li>
					<?php endif; ?>
					<?php if (!empty($lst_options['general']['facebook'])): ?>
						<li class="facebook"><a
								href="<?php echo $lst_options['general']['facebook'] ?>">Facebook<span></span></a></li>
					<?php endif; ?>
					<?php if (!empty($lst_options['general']['vimeo'])): ?>
						<li class="vimeo"><a
								href="<?php echo $lst_options['general']['vimeo'] ?>">Vimeo<span></span></a></li>
					<?php endif; ?>
					<?php if (!empty($lst_options['general']['dribble'])): ?>
						<li class="dribble"><a
								href="<?php echo $lst_options['general']['dribble'] ?>">Dribble<span></span></a></li>
					<?php endif; ?>
					<li class="rss"><a href="<?php echo $lst_options['general']['facebook'] ?>">Rss<span></span></a></li>
				</ul><!--/ .social-icons-->

		   </div><!--/ .widget-->

		</div><!--/ .four-->



		<div class="four columns">

			<div class="widget widget_nav_menu">

				<h3 class="widget-title">پست های پیشنهادی</h3>
				<ul>
				<?php
				$all_post_args = array(
					    'post_type' => array('post'),
						'meta_key'   => 'manager_favourite',
						'orderby'    => 'date',
						'order'      => 'ASC',
					    'posts_per_page'=> 7
					);
				$query = new WP_Query($all_post_args);
				 if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
					 <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile;
				    wp_reset_postdata();
				 endif; ?>
				</ul>

			</div><!--/ .widget-->

		</div><!--/ .four-->

		<div class="four columns">

			<div class="widget widget_contact_form">

				<h3 class="widget-title">تماس با ما</h3>

				<form action="" method="post">

					<p class="input-block">
						<label>: نام</label>
						<input name="contact_name" type="text" />
					</p>
					<p class="input-block">
						<label>: ایمیل</label>
						<input name="contact_mail" type="text" />
					</p>
					<p class="input-block">
						<label>: پیام</label>
						<textarea name="contact_textarea"></textarea>
					</p>

					<p><button class="button default fr" type="submit" name="contact_us_submit">Submit</button></p>

				</form>

			</div><!--/ .widget-->

		</div><!--/ .four-->

	</div><!--/ .container-->


</footer><!--/ #footer-->

<!-- - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - -->

<!-- - - - - - - - - - - - - Bottom Footer - - - - - - - - - - - - - - -->

<footer id="bottom-footer" class="clearfix">

	<div class="container">

		<div class="copyright">Copyright © 2016  ·  MM.Hossein Pour & 7saze.ir  ·  All rights reserved</div>

	</div><!--/ .container-->

</footer><!--/ #bottom-footer-->

<!-- - - - - - - - - - - - - end Bottom Footer - - - - - - - - - - - - - -->

<!-- GET JQUERY FROM THE GOOGLE APIS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>

<!-- JQUERY KENBURN SLIDER  -->
<script src="<?php echo get_template_directory_uri(); ?>/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cycle.all.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/mediaelement-and-player.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>

<!--/*category effect */-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.isotope.min.js"></script>
<!--/*category effect */-->

</body>
</html>
