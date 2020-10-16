
<footer class="footer">
    <!-- Text © 2013
    <?php //_e('Copyright');?> &#169; <?php //echo date("Y"); ?>
    -->
    <section class='content footer'>
    	<div class='inner_wrapper'>
    		<div class='two_cols_wrapper'>
    			<div class='two_cols'>
    				<div class='col_row'>
    					<div class='footer_school_logo'>
	    					<a href="<?php echo esc_url(home_url()); ?>" class="logo">
		                        <img src='<?php bloginfo('template_directory'); ?>/images/footer_logo.png' alt='logo' />
		                    </a>
	    				</div>
    				</div>
    				<div class='col_row'>
    					<div class='footer_menus'>
    						<div class='footer_menu'>
    							<h4>Product</h4>
    							<ul>
    								<li><a href="#">Platform</a></li>
    								<li><a href="#">Pricing</a></li>
    								<li><a href="#">Security</a></li>
    								<li><a href="#">Features</a></li>
    								<li><a href="#">Integration</a></li>
    							</ul>
    						</div>
    						<div class='footer_menu'>
    							<h4>Developers</h4>
    							<ul>
    								<li><a href="#">Sandbox</a></li>
    								<li><a href="#">Developer Docs</a></li>
    								<li><a href="#">API Updates</a></li>
    								<li><a href="#">Developer Forum</a></li>
    							</ul>
    						</div>
    						<div class='footer_menu'>
    							<h4>Resources</h4>
    							<ul>
    								<li><a href="#">Resource Library</a></li>
    								<li><a href="#">Blog</a></li>
    								<li><a href="#">Case Studies</a></li>
    								<li><a href="#">Industries</a></li>
    								<li><a href="#">Partnerships</a></li>
    								<li><a href="#">Form 1099-k</a></li>
    							</ul>
    						</div>
    						<div class='footer_menu'>
    							<h4>Company</h4>
    							<ul>
    								<li><a href="#">About Us</a></li>
    								<li><a href="#">Careers</a></li>
    								<li><a href="#">Press</a></li>
    								<li><a href="#">Contact Sales</a></li>
    								<li><a href="#">Provide a Referal</a></li>
    							</ul>
    						</div>
    						<div class='footer_menu'>
    							<h4>Legal</h4>
    							<ul>
    								<li><a href="#">Terms of Service</a></li>
    								<li><a href="#">Privacy Policy</a></li>
    							</ul>
    						</div>
    					</div>
    				</div>
    				<div class='col_row'>
    					<div class='socials_wrapper'>
    						<ul>
    							<li><a href="#"><img src='<?php bloginfo('template_directory'); ?>/images/icon_instagram.svg' alt='' /></a></li>
    							<li><a href="#"><img src='<?php bloginfo('template_directory'); ?>/images/icon_facebook.svg' alt='' /></a></li>
    							<li><a href="#"><img src='<?php bloginfo('template_directory'); ?>/images/icon_twitter.svg' alt='' /></a></li>
    							<li><a href="#"><img src='<?php bloginfo('template_directory'); ?>/images/icon_linkedin.svg' alt='' /></a></li>
    						</ul>
    					</div>
    				</div>
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