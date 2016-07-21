<!-- - - - - - - - - - - - - Slider - - - - - - - - - - - - - - - -->	
	
	<div class="fullwidthbanner-container">	
		
		<div class="fullwidthbanner">
			
			<ul>
				<?php $main_slider_query_args = array(
					'meta_key' =>'slider_image_url',
					'meta_value' =>'',
					'meta_compare' =>'!=',
					'post_type' => array('post'),
					'posts_per_page' =>'5'
				);
				$slider_query = new WP_Query($main_slider_query_args);
				if($slider_query->have_posts()){
					while($slider_query->have_posts()){
						$slider_query->the_post();?>

						<li 	data-transition="slideup" data-slotamount="7" data-thumb="images/thumbs/thumb2.jpg">

							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo get_post_meta(get_the_ID(),'slider_image_url',true); ?>" alt="" >







													<div class="caption lft big_yellow_dark_back"  data-x="20" data-y="100" data-speed="400" data-start="1300" data-easing="easeOutExpo">Whatever it takes to do</div>
													<div class="caption lft big_white_back"  data-x="20" data-y="146" data-speed="300" data-start="1550" data-easing="easeOutExpo">whatever God says</div>
													<div class="caption sfb medium_text"  data-x="20" data-y="240" data-speed="800" data-start="1800" data-easing="easeOutBack">Lorem ipsum dolor consectetur adipiscing</div>
													<div class="caption sfb medium_text"  data-x="20" data-y="276" data-speed="800" data-start="1800" data-easing="easeOutBack">nulla aliquet varius purus</div>

							</a>

										</li>

						<?php
					}
				}
				?>

				<!-- FADE -->
<!--				<li data-transition="fade" data-slotamount="10">-->
<!---->
<!--					<img src="--><?php //echo get_template_directory_uri(); ?><!--/images/slides/thumb1.jpg" alt=""  data-thumb="images/thumbs/thumb1.jpg">-->
<!--					<div class="caption sfb" data-x="150" data-y="-50" data-speed="900" data-easing="easeOutSine" data-start="500"><img src="--><?php //echo get_template_directory_uri(); ?><!--/images/slides/cloud.jpg" alt=""></div>-->
<!--					<div class="caption lfr" data-x="365" data-y="20" data-speed="400" data-start="800"><img src="--><?php //echo get_template_directory_uri(); ?><!--/images/slides/men.png" alt=""></div>-->
<!--					<div class="caption sft big_black"  data-x="20" data-y="100" data-speed="900" data-start="1300" data-easing="easeOutBack">Shared on www.MafiaShare.net</div>-->
<!--					<div class="caption sft medium_black"  data-x="20" data-y="145" data-speed="900" data-start="1300" data-easing="easeOutBack">Start a New Way of Living!</div>-->
<!--					<div class="caption sft small_text"  data-x="20" data-y="210" data-speed="900" data-start="1500" data-easing="easeOutBack">Lorem ipsum dolor sit amet, consectetur adipisc nulla iaculis aliquet augue, eu varius purus.</div>-->
<!--					<div class="caption sfb" data-x="20" data-y="320" data-speed="750" data-start="1900" data-easing="easeOutExpo"><a class="button dark small" href="#">Learn More</a></div>-->
<!--				</li>-->
<!---->
<!--				<!-- SLIDEUP -->-->
<!--				<li data-transition="slideup" data-slotamount="7" data-thumb="images/thumbs/thumb2.jpg">-->
<!---->
<!--					<img src="--><?php //echo get_template_directory_uri(); ?><!--/images/slides/slide-2.jpg" alt="">-->
<!---->
<!--					<div class="caption lft big_yellow_dark_back"  data-x="20" data-y="100" data-speed="400" data-start="1300" data-easing="easeOutExpo">Whatever it takes to do</div>-->
<!--					<div class="caption lft big_white_back"  data-x="20" data-y="146" data-speed="300" data-start="1550" data-easing="easeOutExpo">whatever God says</div>-->
<!--					<div class="caption sfb medium_text"  data-x="20" data-y="240" data-speed="800" data-start="1800" data-easing="easeOutBack">Lorem ipsum dolor consectetur adipiscing</div>-->
<!--					<div class="caption sfb medium_text"  data-x="20" data-y="276" data-speed="800" data-start="1800" data-easing="easeOutBack">nulla aliquet varius purus</div>-->
<!--				</li>-->
<!---->
<!--				<!-- SLIDELEFT -->-->
<!--				<li data-transition="slideleft" data-slotamount="15" data-thumb="images/thumbs/thumb3.jpg">-->
<!---->
<!--					<img src="--><?php //echo get_template_directory_uri(); ?><!--/images/slides/slide-3.jpg" alt="">-->
<!---->
<!--					<div class="caption lft very_big_white"  data-x="80" data-y="300" data-speed="900" data-start="1200" data-easing="easeOutBack">choose your right way</div>-->
<!--				</li>-->
<!---->
<!--				<!-- SLIDERIGHT -->-->
<!--				<li data-transition="slideright" data-slotamount="10" data-thumb="images/thumbs/thumb4.jpg">-->
<!---->
<!--					<img src="--><?php //echo get_template_directory_uri(); ?><!--/images/slides/slide-4.jpg" alt="">-->
<!---->
<!--					<div class="caption lfb boxshadow" data-x="20" data-y="80" data-speed="900" data-start="1300" data-easing="easeOutBack">-->
<!--						<iframe src="--><?php //echo get_template_directory_uri(); ?><!--/http://player.vimeo.com/video/32001208?title=0&amp;byline=0&amp;portrait=0" width="500" height="320"></iframe>-->
<!--					</div>-->
<!---->
<!--					<div class="caption lft medium_white_back"  data-x="580" data-y="120" data-speed="300" data-start="1500" data-easing="easeOutExpo">Video Support</div>-->
<!--					<div class="caption sfb medium_dark_back"  data-x="580" data-y="165" data-speed="300" data-start="1650" data-easing="easeOutExpo">Vimeo Example</div>-->
<!--					<div class="caption lft medium_text"  data-x="580" data-y="250" data-speed="300" data-start="1950" data-easing="easeOutBack">You can easily add</div>-->
<!--					<div class="caption lft medium_text"  data-x="580" data-y="286" data-speed="300" data-start="2400" data-easing="easeOutBack">Vimeo & Youtube Videos</div>-->
<!--					<div class="caption lft medium_text"  data-x="580" data-y="322" data-speed="300" data-start="2800" data-easing="easeOutBack">to your Slides</div>-->
<!---->
<!--				</li>-->
<!---->
<!--				<!-- SLIDEUP -->-->
<!--				<li data-transition="slideup" data-slotamount="15" data-thumb="images/thumbs/thumb5.jpg">-->
<!---->
<!--					<img src="--><?php //echo get_template_directory_uri(); ?><!--/images/slides/slide-5.jpg" alt="">-->
<!---->
<!--					<div class="caption lfl big_dark_back"  data-x="580" data-y="165" data-speed="500" data-start="1650" data-easing="easeOutBack">Powerful</div>-->
<!--					<div class="caption lfr big_dark_back"  data-x="580" data-y="217" data-speed="500" data-start="2000" data-easing="easeOutBack">Responsive</div>-->
<!--					<div class="caption sfb big_dark_back"  data-x="580" data-y="269" data-speed="500" data-start="2350" data-easing="easeOutBack">Theme</div>-->
<!--				</li>-->
								
			</ul>
			
		</div><!--/ .fullwidthbanner-->	
		
	</div><!--/ .fullwidthbanner-container-->

	<!-- - - - - - - - - - - - - end Slider - - - - - - - - - - - - - - -->