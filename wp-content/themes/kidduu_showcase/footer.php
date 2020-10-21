
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
    				<div class='col_row col_logo'>
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


                    
                    <?php if( have_rows('footer_socials', 'option') ): ?>
    				<div class='col_row'>
    					<div class='socials_wrapper'>
    						<ul>
                                <?php while( have_rows('footer_socials' ,'option') ): the_row(); 
                                    $url = get_sub_field('url');
                                    ?>
    							     <li><a href="<?php echo $url; ?>"></a></li>
                                <?php endwhile; ?>
    							
    						</ul>
    					</div>
    				</div>
                    <?php endif; ?>
    			</div>
                <?Php
                $footer_google_maps = get_field('footer_google_maps','option');
                if(!empty($footer_google_maps)) {
                ?>
    			<div class='two_cols'>
    				<div class='col_row'>
    					<div class='gmap_wrapper'>
    						<div class="mapouter">
    							<div class="gmap_canvas">
                                    <?php echo $footer_google_maps; ?>
    								<!-- <iframe  id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> -->
    							</div>
    						</div>
    					</div>
    				</div>
    				
    			</div>
                <?php } ?>
    		</div>


			<div class='two_cols_wrapper'>
                <?php 
                $footer_description = get_field('footer_description', 'option');
                if(!empty($footer_description)){
                ?>
        			<div class='two_cols'>
        				<div class='col_row'>
        					<div class='content_short_desc'>
    	    					<?php echo $footer_description; ?>
    	    				</div>
        				</div>
    				</div>
                <?php } ?>

                <?php
                // footer_under_gmap
                 ?>
                <?php if( have_rows('footer_under_gmap', 'option') ): ?> 
        			<div class='two_cols'>
                        <?php 
                        $footer_under_gmap_heading = get_field('footer_under_gmap_heading','option');
                        if(!empty($footer_under_gmap_heading)){
                        ?>
                            <div class='mobile_heading_under_gmap'>
                                <h3><?php echo $footer_under_gmap_heading; ?></h3>
                            </div>
                        <?php  } ?>
        				<div class='col_row'>
        					<div class='two_cols_wrapper'>
                                <?php while( have_rows('footer_under_gmap' ,'option') ): the_row(); 
                                    $description = get_sub_field('description');
                                    ?>
        						    <div class='two_cols'>
            							<div class='col_row'>
            								<div class="gmap_box">
            									<?php echo $description; ?>
            								</div>
            							</div>
        							</div>
                                 <?php endwhile; ?>
    			    		</div>
        				</div>
        			</div>
                <?php endif; ?>
			</div>
    	</div>
    </section>
    <?php 
    $footer_copyright = get_field('footer_copyright','option');
    $footer_school_designed = get_field('footer_school_designed','option');
    if(!empty($footer_copyright) || !empty($footer_school_designed)){
    ?>
        <section class='content footer_blue_band'>
        	<div class='inner_wrapper'>
        		<div class='blue_band'>
        			<div class='col_left'><p><?php _e('Copyright');?> &#169; <?php echo date("Y"); ?> <?php if(!empty($footer_copyright)){ echo $footer_copyright; }else{ _e('All rights reserved.'); } ?></p></div>

        			<div class='col_right'><?php echo $footer_school_designed; ?></div>
        		</div>
        	</div>
        </section>
    <?php  } ?>
</footer>
<?php wp_footer(); ?>
<?php echo get_option('googleanalytics'); ?>
</body>
</html>