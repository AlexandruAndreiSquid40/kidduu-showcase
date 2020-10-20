
<footer class="footer">
    <!-- Text © 2013
    <?php //_e('Copyright');?> &#169; <?php //echo date("Y"); ?>
    -->
    <?php
    $footer_logo = get_field('footer_logo', 'option');
    $footer_menu = get_field('footer_menu', 'option');
    ?>
    <section class='content footer'>
    	<div class='inner_wrapper'>
    		<div class='two_cols_wrapper'>
    			<div class='two_cols'>
                    
                    <?php if(!empty($footer_logo)){ ?>
    				<div class='col_row'>
    					<div class='footer_school_logo'>
	    					<a href="<?php echo esc_url(home_url()); ?>" class="logo">
		                        <img src='<?php echo $footer_logo['url']; ?>' alt='logo' />
		                    </a>
	    				</div>
    				</div>
                    <?php  } ?>

                    <?php  if(!empty($footer_menu)) { ?>
        				<div class='col_row'>
        					<div class='footer_menus'>
                                <?php wp_nav_menu(array('theme_location' => $footer_menu, 'menu_class' => 'footer_menu')); ?>
        						
        					</div>
        				</div>
                    <?php  } ?>


                    footer_socials
                    <?php if( have_rows('contact_right_documents',$frontpage_id) ): ?>
    				<div class='col_row'>
    					<div class='socials_wrapper'>
    						<ul>
                                <?php while( have_rows('contact_right_documents' ,$frontpage_id) ): the_row(); 
                                    $file = get_sub_field('file');

                                    ?>
    							<li><a href="#"><img src='<?php bloginfo('template_directory'); ?>/images/icon_instagram.svg' alt='' /></a></li>
                                <?php endwhile; ?>
    							
    						</ul>
    					</div>
    				</div>
                    <?php endif; ?>
    			</div>
    			<div class='two_cols'>
    				<div class='col_row'>
    					<div class='gmap_wrapper'>
    						<div class="mapouter">
    							<div class="gmap_canvas">
    								<iframe  id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    							</div>
    						</div>
    					</div>
    				</div>
    				
    			</div>
    		</div>


			<div class='two_cols_wrapper'>
    			<div class='two_cols'>
    				
    				<div class='col_row'>
    					<div class='content_short_desc'>
	    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id imperdiet lectus, vel ultrices odio. Nam eu eleifend ex. Proin viverra id libero ac mattis. Nullam nec lorem auctor, suscipit erat eu, volutpat lectus. Sed mattis blandit mi, sit amet pulvinar quam tincidunt id. Praesent in finibus nisl. Curabitur lobortis fringilla magna, et euismod tortor sodales eget. In hac habitasse platea dictumst. Sed mollis, elit nec ultrices fringilla, justo tortor cursus mi, in egestas libero metus sed orci. Vestibulum dictum vulputate arcu sed suscipit.</p>
	    				</div>
    				</div>
				</div>
    			<div class='two_cols'>
    				<div class='col_row'>
    					<div class='two_cols_wrapper'>
    						<div class='two_cols'>
    							<div class='col_row'>
    								<div class="gmap_box">
    									<h4>School location</h4>
    									<p>2222  Coburn Hollow Road, London UK <br>309-450-6532 <br><a href="mailto:contact@school-website.co.uk">contact@school-website.co.uk</a></p>
    								</div>
    							</div>
							</div>
							<div class='two_cols'>
    							<div class='col_row'>
    								<div class="gmap_box">
    									<h4>After-school care</h4>
    									<p>2222  Coburn Hollow Road, London UK <br>309-450-6532 <br><a href="mailto:contact@school-website.co.uk">contact@school-website.co.uk</a></p>
    								</div>
    							</div>
			    			</div>
			    		</div>
    				</div>
    			</div>
			</div>
    	</div>
    </section>
    <section class='content footer_blue_band'>
    	<div class='inner_wrapper'>
    		<div class='blue_band'>
    			<div class='col_left'><p><?php _e('Copyright');?> &#169; <?php echo date("Y"); ?> <?php _e('All rights reserved.'); ?></p></div>
    			<div class='col_right'><p>School website design by <a href="#">Squid40</a></p></div>
    		</div>
    	</div>
    </section>
</footer>
<?php wp_footer(); ?>
<?php echo get_option('googleanalytics'); ?>
</body>
</html>