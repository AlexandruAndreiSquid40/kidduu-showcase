<?php
/*
  Template Name: Home
 */

get_header();
$frontpage_id = get_option( 'page_on_front' );

?>
<section class="content home">
	<?php if( have_rows('banner_repeater',$frontpage_id) ): ?>
		<section class='content banner'>    
			<div class='banner_slider'>
			    <?php while( have_rows('banner_repeater' ,$frontpage_id) ): the_row(); 
			        $image = get_sub_field('image');
			        $heading = get_sub_field('heading');
			        $description = get_sub_field('description');

			        
			        ?>
			        <div class='slide' style='background-image:url("<?php echo $image; ?>");'>
						<div class='inner_wrapper'>
							<div class='mobile_image'>
								<img src='<?php echo $image; ?>' />
							</div>
							<div class='main_banner'>
								
								<?php if(!empty($heading)){ ?>
									<h1 class='heading'><?php echo $heading; ?></h1>
								<?php } ?>
								<?php if(!empty($description)){ ?>
									<div class='description'>
										<?php echo $description; ?>
									</div>
								<?php } ?>
								<?php 
								if( have_rows('buttons') ): ?>
									<div class='buttons'>
									<?php 
										while( have_rows('buttons') ): the_row();
											$label = get_sub_field('label');
											$link = get_sub_field('link');
											$external = get_sub_field('external');
											$target="";
											// pr($external);
											if($external == 'Yes'){
												$target="_blank";
											}else{
												$target="";
											}
											?>
												<a class='btn' href='<?php echo $link; ?>' target="<?php echo $target; ?>"><?php echo $label; ?></a>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
			    <?php endwhile; ?>
			</div>
		</section>    
	<?php endif; ?>

		
	
	<!-- GLOBAL ANNOUNCEMENT -->
	<?php
	$cookie_message = get_field('cookie_message',$frontpage_id);
	$cookie_close_button = get_field('cookie_close_button',$frontpage_id);
	?>
	<?php if(!empty($cookie_message)){ ?>
		<section class='content gl_announcement'>
	         <div class='global_announcement'>
	         	<div class='inner_wrapper'>
	                <div class='global_announcement_inner'>
	                	<?php echo $cookie_message; ?>
	                    <a href="#" class='btn btn-learn_more'><?php echo $cookie_close_button; ?></a>
	                </div>
                </div>
	        </div>
	    </section>
	<?php } ?>
    <!-- END GLOBAL ANNOUNCEMENT -->

    <!-- CARDS -->
    <?php
    $pages_section_heading_mobile = get_field('pages_section_heading_mobile',$frontpage_id);
    $pages_section_description_mobile = get_field('pages_section_description_mobile',$frontpage_id);
     if( have_rows('pages_repeater',$frontpage_id) ): ?>
	<section class='content cards'>
		<div class='inner_wrapper'>
			<div class='cards_holder'>
				<?php if(!empty($pages_section_heading_mobile) || !empty($pages_section_description_mobile)){ ?>
		    		<div class='pages_top_mobile'>
		    			<?php if(!empty($pages_section_heading_mobile)){ ?>
		    				<h2><?php echo $pages_section_heading_mobile; ?></h2>
		    			<?php } ?>
		    			<?php if(!empty($pages_section_description_mobile)) { ?>
		    				<?php echo $pages_section_description_mobile; ?>
		    			<?php } ?>
		    		</div>
				<?php } ?>
				<!-- CARD -->
				<?php while( have_rows('pages_repeater' ,$frontpage_id) ): the_row(); 
			        $custom_image = get_sub_field('image');
			        $custom_label = get_sub_field('custom_label');
			        $page_selection = get_sub_field('page_selection');

			        

			        $page_id_pull = $page_selection[0]->ID;

			        $page_title_pull = $page_selection[0]->post_title;
			        $page_url_pull = $page_selection[0]->post_title;

			        $page_excerpt_pull = $page_selection[0]->post_excerpt;
			        $page_content_pull = strip_tags($page_selection[0]->post_content);
			        //get_cotent;
			        $page_content_pull = substr($page_content_pull,0,500);

			        ?>
					<div class='card'>
						<div class='card_wrapper'>
							<div class='card-image'>
								<?php if (!empty($custom_image)) { ?>
					                <img src='<?php echo $custom_image; ?>' alt='' />
					            <?php } else { ?>
					                <?php echo get_the_post_thumbnail( $page_id_pull, 'pages_select', ); ?>
					            <?php } ?>

							</div>
							<div class='card-heading'>
								<?php if(!empty($custom_label)) { ?>
									<h5><a href="<?php get_permalink( $page_id_pull );?>"><?php echo $custom_label; ?></a></h5>
								<?php }else{ ?>
									<h5><a href="<?php get_permalink( $page_id_pull );?>"><?php echo $page_title_pull; ?></a></h5>
								<?php } ?>
							</div>
							<div class='card-description'>
								<?php if(!empty($page_excerpt_pull)){ ?>
									<p><?php echo $page_excerpt_pull; ?></p>
								<?php  }else { ?>
									<p><?php echo $page_content_pull; ?></p>
								<?php  } ?>
							</div>
							<!-- <div class='card-button'>
								<a href="#">Learn more</a>
							</div> -->
						</div>
					</div>
			    <?php endwhile; ?>
				<!-- END CARD -->
				
			</div>
		</div>
	</section>
	<?php endif; ?>
    <!-- END CARDS -->

    <!-- LATEST NEWS -->
    <?php 
    $latest_news_section_heading = get_field('latest_news_section_heading',$frontpage_id);
    ?>
    <section class='content latest_news'>
    	<div class='inner_wrapper'>
    		<?php if(!empty($latest_news_section_heading)){ ?>
	    		<div class='content_heading'>
	    			<h2>Keep track of the latest news at Southwark</h2>
	    		</div>
    		<?php } ?>
			<div class='tabs_holder'>
				<div class='tabs_navigation'>
					<?php if( have_rows('latest_news_select_categories_repeater',$frontpage_id) ): 
						$count_categs = 1;
						?>
						<ul>
						    <?php while( have_rows('latest_news_select_categories_repeater' ,$frontpage_id) ): the_row(); 
						        $select_category = get_sub_field('select_category');
						        $select_category_name = $select_category->name;
						        $select_category_slug = $select_category->slug;
						        $select_category_id = $select_category->term_id;
						        ?>
								<li data-tab='tab-<?php echo $select_category_slug; ?>' class='<?php if($count_categs == 1){ echo "active"; } ?>'><?php echo $select_category_name; ?></li>
							<?php 
							$count_categs++;
							endwhile; 
							?>
						</ul>
					<?php endif; ?>
				</div>
				<?php if( have_rows('latest_news_select_categories_repeater',$frontpage_id) ): 
					$count_categss = 1;
				?>
					<div class='tabs_wrp'>
						<!-- TAB -->
						<?php while( have_rows('latest_news_select_categories_repeater' ,$frontpage_id) ): the_row(); 
						        $select_category = get_sub_field('select_category');
						        $select_category_slug = $select_category->slug;
						        $select_category_id = $select_category->term_id;
						        
						        ?>
								<div class='tab <?php if($count_categss == 1){ echo "active"; } ?>' data-tab='tab-<?php echo $select_category_slug; ?>'>
									<?php
								    $custom_query = new WP_Query(array(
								        'post_type' => 'post',
								        'posts_per_page' => 3,
								        'tax_query' => array(
								            array(
								                'taxonomy' => 'category',
								                'field' => 'term_id',
								                'terms' => $select_category_id
								            )
								        )
								    ));
								    $count_posts= $custom_query->post_count;

								    ?>
									<div class='card_wrapper <?php echo "count_".$count_posts;?>'>
										<!-- CARD -->
										

									    <?php 

									    

									    if ($custom_query->have_posts()) : 
									    	
									    	while ($custom_query->have_posts()) : $custom_query->the_post(); 
									    	
									    	$custom_post_id = $custom_query->post->ID;
									    	$custom_post_title = $custom_query->post->post_title;

									    	$custom_post_excerpt = $custom_query->post->post_excerpt;
									        $custom_post_content = strip_tags($custom_query->post->post_content);
									        //get_cotent;
									        $$custom_post_content = substr($custom_post_content,0,500);
									    	?>
									    		<div class='card'>
													<div class='card-image'>
														<a href="<?php echo get_permalink($custom_post_id );?>">
															<?php echo get_the_post_thumbnail( $custom_post_id, 'latest_news_home', ); ?>
														</a>
													</div>
													<div class='card-desc'>
														<h4><a href="<?php echo get_permalink($custom_post_id );?>"><?php echo $custom_post_title; ?></a></h4>
														<?php if(!empty($custom_post_excerpt)) { ?>
															<p><?php echo $custom_post_excerpt; ?></p>
														<?php }else { ?>
															<p><?php echo $custom_post_content; ?></p>
														<?php  } ?>
													</div>
												</div>
									            <?php
									            
									        endwhile;
									        wp_reset_query();
									    endif;
									    ?>
										
										<!-- END CARD -->
										
									</div>
								</div>
						<?php 
							$count_categss++;
							endwhile; 
						?>
						<!-- END TAB -->

					</div>
				<?php endif; ?>
			</div>
		</div>
    </section>
    <!-- END LATEST NEWS -->
	<?php 
	$events_heading =get_field('events_heading', $frontpage_id);
	$events_content =get_field('events_content', $frontpage_id);
	?>
    <section class='content events'>
    	<div class='inner_wrapper'>
    		<?php if(!empty($events_heading) || !empty($events_content)){ ?>
	    		<div class='events_top'>
	    			<?php if(!empty($events_heading)){ ?>
	    				<h2><?php echo $events_heading; ?></h2>
	    			<?php } ?>
	    			<?php if(!empty($events_content)) { ?>
	    				<?php echo $events_content; ?>
	    			<?php } ?>
	    		</div>
			<?php } ?>
    	</div>


    	<?php

    	$today = date('Ymd');

    	$event_date_future = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE `meta_key` LIKE 'event_date' AND `meta_value` >=  CURDATE()");
    	
    	$event_array = [];
    	$event_i = 0;
    	foreach($event_date_future as $event){
    		
    		$event_array[$event_i]['event_date'] = strtotime($event->meta_value);
    		$event_array[$event_i]['event_date_old'] = $event->meta_value;
    		$event_array[$event_i]['post_id']  = $event->post_id;
    		$event_i++;
    	}
    	arsort($event_array);
    	// pr($event_array);
    	$reverse_event_array = array_reverse($event_array);
    	// pr($reverse_event_array);
    	$count_events = count($reverse_event_array);
    	

	    ?>

	    	<div class='event_slider_wrapper'>
	    		<div class='events_slider'>
		    		<?php 
		    		if( $count_events > 0 ) {
    					foreach( $reverse_event_array as $event ) {
    						

				    		
				    		// $event_bg_image = wp_get_attachment_image_url( $post->ID, 'events_home' );
				    		$event_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $event['post_id'] ), 'events_home' );
				    		
				    		if($event_bg_image){
				    			$event_f_image = $event_bg_image[0];
				    		}else{
				    			$event_f_image = get_bloginfo('template_directory').'/images/event_placeholder.png';
				    		}
				    		$event_post_excerpt = get_the_excerpt($event['post_id']);
					        $event_post_content = strip_tags(get_the_content($event['post_id']));
					        
					        $event_post_content = substr($event_post_content,0,500);

					        $event_post_date = get_field('event_date',$event['post_id']);
					        
					        $event_post_time_start = get_field('event_time_start',$event['post_id']);
					        $event_post_time_end = get_field('event_time_end',$event['post_id']);
					        $event_post_date = strtotime($event_post_date);
					        
					        
					        $format_event_date = date('D jS, M');
					        

		    			?>
			    		<div class='event_box'>
			    			<div class='event_box_pic' style='background-image:url(<?php echo $event_f_image; ?>'>
			    				<a href="<?php echo get_permalink($event['post_id'] );?>"></a>
			    			</div>
			    			<div class='event_box_desc'>
			    				<div class='date_time'>
			    					<span class='date'><?php echo $format_event_date; ?></span>
		    						<?php if(!empty($event_post_time_start)){ ?>
			    						<span class='time'>
			    							<?php if(!empty($event_post_time_end)){
			    								echo $event_post_time_start . ' - '.$event_post_time_end;	
			    							}else{
			    								echo $event_post_time_start;	
			    							} ?>
			    						</span>
	    							 <?php } ?>
			    				</div>
			    				<h5><a href="<?php echo get_permalink($event['post_id'] );?>"><?php echo get_the_title($event['post_id']); ?></a></h5>

			    				<?php if(!empty($custom_post_excerpt)) { ?>
									<p><?php echo $custom_post_excerpt; ?></p>
								<?php }else { ?>
									<p><?php echo $custom_post_content; ?></p>
								<?php  } ?>
			    			</div>
			    		</div>
		    		<?php
									            
				       }
					}
					
				    ?>
		    		
		    		
		    		
	    		</div>
	    		
	    	</div>
    	
    </section>
    <section class='content twitter_feed'>
    	<div class='inner_wrapper'>
    		<div class='content_heading'>
    			<h2>Social Media Feed</h2>
    		</div>
    	</div>
    	<div class='feed_holder_wrapper'>
			<div class='feed_holder'>
				

	    		<?php
	            // $twitter_username = get_field('twitter_username', 359);
	            // $twitter_api_key = get_field('twitter_api_key', 359);
	            // $twitter_api_secret_key = get_field('twitter_api_secret_key', 359);
	            // $twitter_oauth_access_token = get_field('twitter_oauth_access_token', 359);
	            // $twitter_oauth_access_token_secret = get_field('twitter_oauth_access_token_secret', 359);


	            $twitter_username = 'BohuntSchool';
	            $twitter_api_key = 'gxOF3AcT2rIuXjHbYaB0qRepZ';
	            $twitter_api_secret_key = 'aSu6II1jG0ClXlV7gku4QUBAFFwNgKdPpABYbR4P35D0WtmGOD';
	            $twitter_oauth_access_token = '4127023497-71icCI0Thq8B9yfMMnjWsNmkD8sNBgwcFYtwMYB';
	            $twitter_oauth_access_token_secret = '606b7y2yOr6YMRb0LzzPeF0DmQCZQbq4Ff7SXBWgyabhy';
	            
	            if (!empty($twitter_username)) {
	                ?>
	                <?php
	                require_once('inc/TwitterAPIExchange.php');
	                
	                $settings = array(
	                    'oauth_access_token' => $twitter_oauth_access_token,
	                    'oauth_access_token_secret' => $twitter_oauth_access_token_secret,
	                    'consumer_key' => $twitter_api_key,
	                    'consumer_secret' => $twitter_api_secret_key
	                );
	                $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	                $requestMethod = "GET";
	                $user = $twitter_username;
	                $count = 10;
	                $getfield = "?screen_name=$user&count=$count&tweet_mode=extended";
	                $twitter = new TwitterAPIExchange($settings);
	                $string = json_decode($twitter->setGetfield($getfield)
	                                ->buildOauth($url, $requestMethod)
	                                ->performRequest(), true);
	                if ($string["errors"][0]["message"] != "") {
	                    echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $string[errors][0]["message"] . "</em></p>";
	                    exit();
	                }
	                
	                // pr($string);
	                foreach ($string as $items) {
	                	// pr($items);
	                	

	                	$date = strtotime($items['created_at']);
	                	$date = date("M j",$date);


	                	//get full text , replace @ and # whereve it encounters and put links to it 
	                	$t_full_text = $items['full_text'];
	                	$t_dummy_text = $t_full_text;
	                	$t_array_hastegs = $items['entities']['hashtags']; // ->['text']

	                	$t_array_users = $items['entities']['user_mentions']; // ->['screen_name']

	                	foreach($t_array_hastegs as $hastag){
	                		$hastag= $hastag['text'];
	                		$t_full_text = str_replace('#'. $hastag, '<a href="https://twitter.com/hashtag/'.$hastag.'?src=hashtag_click">#'.$hastag.'</a>',$t_full_text);
	                	}
	                	foreach($t_array_users as $user){
	                		$user = $user['screen_name'];
	                		$t_full_text = str_replace('@'. $user, '<a href="https://twitter.com/'.$user.'">@'.$user.'</a>',$t_full_text);
	                	}

	                	//replace last link to tweet
	                	// $t_full_text = substr($t_full_text,0,strpos($t_full_text,'https://t.co/'));

	                	//get logo of the school
	                	$t_logo =  $items['user']['profile_image_url'];
	                	// name of the school [short]
	                	$t_school_name = $items['user']['name'];
	                	// screen_name of the school 
	                	$t_school_screen_name = $items['user']['screen_name'];


	                	//check for 1 image
	                	$t_post_image = $items['entities']['media'];
	                	$t_post_images = $items['extended_entities']['media']; // -> ['media_url']
	                	$t_post_video = $items['entities']['urls'][0]['display_url'];

	                	// https://i.ytimg.com/vi/qqC3PVjLEk0/hqdefault.jpg
	                	$t_post_video_thumb = array_pop(explode( '/', $t_post_video));

	                	$t_post_video_thumb = 'https://i.ytimg.com/vi/'.$t_post_video_thumb.'/hqdefault.jpg';
	                	

	                	
	                	$type='';

	                	
	                	if(is_array($items['retweeted_status'])){

	                		// if video 
	            			if($items['retweeted_status']['entities']['urls'][0]['url'] && $items['retweeted_status']['entities']['media'][0]['media_url'] && $items['retweeted_status']['extended_entities']['media'][0]['id'] && $items['retweeted_status']['extended_entities']['media'][0]['video_info']){
								
		                		$sub_type='video';
		                	}
	                		// if link
	                		//check if link
		                	if(is_array($items['retweeted_status']['entities']['urls']) && count($items['retweeted_status']['entities']['urls']) > 0){
		                		$sub_type='link';
		                	}
	                		// if gallery 
	                		// if image
	                		if($items['retweeted_status']['entities']['media'][0]['media_url'] && $items['retweeted_status']['extended_entities']['media'][1]['media_url']) {
		                		$type='gallery';
		                	}else if($items['retweeted_status']['entities']['media'][0]['media_url']){
		                		$type='image';
		                	}

	                		$type = 'retweet';
	                	}else if($items['entities']['urls'][0]['url'] && $items['entities']['media'][0]['media_url'] && $items['extended_entities']['media'][0]['id'] && $items['extended_entities']['media'][0]['video_info']['duration_millis']){
	                		// check video
		                 		$type='video';
	                 	}else if(is_array($items['entities']['urls']) && $items['entities']['urls'][1]['url'] || is_array($items['entities']['urls']) && $items['entities']['urls'][0]['url'] ){
	                 		// check link
	                		$type='link';
	                	}else if($items['entities']['media'][0]['media_url'] && $items['extended_entities']['media'][1]['media_url']) {
	                		// check gallery
	                		$type='gallery';
	                	}else if($items['entities']['media'][0]['media_url']){
	                		// check image
	                		$type='image';
	                	}
	               //  	//check if retweet
	                	

	                	// check if is gallery
	                	

	                	// pr($type. '  - ID:'. $items['id']);
	                	
	                	if($type== 'retweet'){
	                		$items = $items['retweeted_status'];
	                	}


	                    
	                    ?>
	                    <div class='feed_box'>

	                    	<?php if($type == 'image' || $type== 'retweet' && $sub_type== 'image'){?>

							    <div class='twitter_top'>
							        <div class='twitter_user_icon'>
							        	<?php if($t_logo){ ?>
							            	<img src='<?php echo $t_logo; ?>' alt='logo <?php echo $t_school_name; ?>' />
							        	<?php }else{

							        	} ?>
							        </div>
							        <div class='twitter_post_desc'>
							            <div class='twitter_user_info'>

							            	<b><a href="https://twitter.com/<?php echo $t_school_screen_name; ?>"><?php echo $t_school_name; ?></a></b> <span class='t_user'>@<?php echo $t_school_screen_name; ?></span><span class='t_date'> <?php echo $date; ?></span> 
							            </div>
							            <?php if($t_full_text) { ?>
								            <div class='twitter_post_description'>
								                <p><?php echo $t_full_text; ?></p>
								                
								            </div>
							        	<?php } ?>
							        	<div class='twitter_post_description'>
							            	<a href="https://twitter.com/i/web/status/<?php echo $items['id']; ?>" target='_blank' rel="external">Read More</a>
							            </div>
							        </div>
							    </div>
							    <div class='twitter_bottom'>
							        <!-- case image -->
							        <div class='twitter_post twitter_post_images border_rad_full'>
							        	<a href="https://twitter.com/i/web/status/<?php echo $items['id']; ?>" target='_blank' rel="external">
							        		<div class='t_post_image' style='background-image:url(<?php echo $items['entities']['media'][0]['media_url']?>);'></div>
							        	</a>
							        </div>
							        <!-- END case image -->
							    </div>
							<?php }else if($type=='gallery' || $type== 'retweet' && $sub_type== 'gallery'){
								?>

								<div class='twitter_top'>
							        <div class='twitter_user_icon'>
							        	<?php if($t_logo){ ?>
							            	<img src='<?php echo $t_logo; ?>' alt='logo <?php echo $t_school_name; ?>' />
							        	<?php }else{

							        	} ?>
							        </div>
							        <div class='twitter_post_desc'>
							            <div class='twitter_user_info'>

							            	<b><a href="https://twitter.com/<?php echo $t_school_screen_name; ?>"><?php echo $t_school_name; ?></a></b> <span class='t_user'>@<?php echo $t_school_screen_name; ?></span><span class='t_date'> <?php echo $date; ?></span> 
							            </div>
							            <?php if($t_full_text) { ?>
								            <div class='twitter_post_description'>
								                <p><?php echo $t_full_text; ?></p>
								                
								            </div>
							        	<?php } ?>
							        	<div class='twitter_post_description'>
							            	<a href="https://twitter.com/i/web/status/<?php echo $items['id']; ?>" target='_blank' rel="external">Read More</a>
							            </div>
							        </div>
							    </div>
							    <div class='twitter_bottom'>
							        <!-- case image -->
							        <?php 
						        		
						        		$gall_count = count($items['extended_entities']['media']);
						        		$gall_final_class = '';
						        		if($gall_count == 2){ 
						        			$gall_final_class = 'gallery_twitter_2';
						        		}else if($gall_count == 3){
						        			$gall_final_class = 'gallery_twitter_3';
						        		}else if($gall_count == 4){
						        			$gall_final_class = 'gallery_twitter_4';
						        		}else if($gall_count > 4){
						        			$gall_final_class = 'gallery_twitter_4';
						        		}
							        ?>
							        <a href="https://twitter.com/i/web/status/<?php echo $items['id']; ?>" target='_blank' rel="external">
								        <div class='twitter_post twitter_post_images border_rad_full gallery_twiiter <?php echo $gall_final_class; ?>'>
								        	<?php 
								        	if($gall_count == 2){ 
							        			?>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][0]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][1]['media_url']?>);'></div>
							        			<?php 
							        		}else if($gall_count == 3){
							        			?>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][0]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][1]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][2]['media_url']?>);'></div>
							        			<?php 
							        		}else if($gall_count == 4){
							        			?>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][0]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][1]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][2]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][3]['media_url']?>);'></div>
							        			<?php 
							        		}else if($gall_count > 4){
							        			?>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][0]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][1]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][2]['media_url']?>);'></div>
							        			<div class='t_post_image' style='background-image:url(<?php echo $items['extended_entities']['media'][3]['media_url']?>);'></div>
							        			<?php 
							        		}
								        	?>
								        	
								        </div>
							    	</a>
							        <!-- END case image -->
							    </div>
								
							<?php }else if($type=='link' || $type== 'retweet' && $sub_type== 'link'){ ?>

								<?php
								// pr($items['entities']['urls'][1]);
								// pr('<br>');
								// pr($items['entities']['urls'][0]);
								// pr('<br>');
								if($items['entities']['urls'][1]){
									$items_new = $items['entities']['urls'][1];
								}else{
									$items_new = $items['entities']['urls'][0];
								}
								// pr($items_new);

								// $curlSession = curl_init();
							 //    curl_setopt($curlSession, CURLOPT_URL, $items_new['expanded_url']);
							 //    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
							 //    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
							 //    curl_setopt($curlSession, CURLOPT_FOLLOWLOCATION, true);

							 //    $jsonData = curl_exec($curlSession);

							 //    // echo "<pre>".$jsonData."</pre>";
							 //    preg_match_all('/\<meta\sname\=\"(twitter\:.+)\".+content\=\"(.+)\".+\>/',$jsonData,$matches);

							 //    if(count($matches)){
							 //    	$twitter_desc ='';
							 //    	$twitter_title ='';
							 //    	$twitter_image ='';
							 //    	$label = $matches[1];
								//     $content = $matches[2];
							 //    	foreach($label as $key => $item){
							 //    		if($item == 'twitter:description'){
							 //    			$twitter_desc = $content[$key];
							 //    		}
							 //    		if($item == 'twitter:title'){
							 //    			$twitter_title = $content[$key];
							 //    		}
							 //    		if($item == 'twitter:image'){
							 //    			// $twitter_image = urldecode($content[$key]);
							 //    			$twitter_image = str_replace('&amp;', '&', $content[$key]);
							 //    		}
							 //    	}
								    
							 //    }

							 //    curl_close($curlSession);
								?>
								<div class='twitter_top'>
							        <div class='twitter_user_icon'>
							        	<?php if($t_logo){ ?>
							            	<img src='<?php echo $t_logo; ?>' alt='logo <?php echo $t_school_name; ?>' />
							        	<?php }else{

							        	} ?>
							        </div>
							        <div class='twitter_post_desc'>
							            <div class='twitter_user_info'>

							            	<b><a href="https://twitter.com/<?php echo $t_school_screen_name; ?>"><?php echo $t_school_name; ?></a></b> <span class='t_user'>@<?php echo $t_school_screen_name; ?></span><span class='t_date'> <?php echo $date; ?></span> 
							            </div>
							            <?php if($t_full_text) { ?>
								            <div class='twitter_post_description'>
								                <p><?php echo $t_full_text; ?></p>
								                
								            </div>
							        	<?php } ?>
							            <div class='twitter_post_description'>
							            	<a href="https://twitter.com/i/web/status/<?php echo $items['id']; ?>" target='_blank' rel="external">Read More</a>
							            </div>
							        </div>
							    </div>
							    <div class='twitter_bottom share_link'>
							        <div class='twitter_post twitter_post_link'>
							            <div class='t_p_top'>
							            	
							            	<svg viewBox="0 0 24 24"><g><path d="M14 11.25H6c-.414 0-.75.336-.75.75s.336.75.75.75h8c.414 0 .75-.336.75-.75s-.336-.75-.75-.75zm0-4H6c-.414 0-.75.336-.75.75s.336.75.75.75h8c.414 0 .75-.336.75-.75s-.336-.75-.75-.75zm-3.25 8H6c-.414 0-.75.336-.75.75s.336.75.75.75h4.75c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z"></path><path d="M21.5 11.25h-3.25v-7C18.25 3.01 17.24 2 16 2H4C2.76 2 1.75 3.01 1.75 4.25v15.5C1.75 20.99 2.76 22 4 22h15.5c1.517 0 2.75-1.233 2.75-2.75V12c0-.414-.336-.75-.75-.75zm-18.25 8.5V4.25c0-.413.337-.75.75-.75h12c.413 0 .75.337.75.75v15c0 .452.12.873.315 1.25H4c-.413 0-.75-.337-.75-.75zm16.25.75c-.69 0-1.25-.56-1.25-1.25v-6.5h2.5v6.5c0 .69-.56 1.25-1.25 1.25z"></path></g></svg>
							            </div>
							            <div class='t_p_bottom'>
							                <a href="<?php echo $items_new['expanded_url'];?>">
							                	<?php /*if($twitter_title && $twitter_title !=""){ ?>
							                    <span class='link_seo'><?php echo $twitter_title; ?></span>
							                	<?php } ?>
							                    <?php if($twitter_desc && $twitter_desc !=""){ ?>
							                    	<span class='link_desc'><?php echo $twitter_desc; ?></span>
							                	<?php } */?>
							                    <span class='link_url'>
							                    		<?php echo $items_new['expanded_url'];?>
							                    </span>
							                </a>
							            </div>
							        </div>
							    </div>
							<?php }else if($type=='video' || $type== 'retweet' && $sub_type== 'video'){ ?>
								
							    <div class='twitter_top'>
							        <div class='twitter_user_icon'>
							            <?php if($t_logo){ ?>
							            	<img src='<?php echo $t_logo; ?>' alt='logo <?php echo $t_school_name; ?>' />
							        	<?php }else{

							        	} ?>
							        </div>
							        <div class='twitter_post_desc'>
							            <div class='twitter_user_info'>
							            	<b><a href="https://twitter.com/<?php echo $t_school_screen_name; ?>"><?php echo $t_school_name; ?></a></b> <span class='t_user'>@<?php echo $t_school_screen_name; ?></span><span class='t_date'> <?php echo $date; ?></span> 
							            </div>
							            <?php if($t_full_text) { ?>
								            <div class='twitter_post_description'>
								                <p><?php echo $t_full_text; ?></p>
								                
								            </div>
							        	<?php } ?>
							        	<div class='twitter_post_description'>
							            	<a href="https://twitter.com/i/web/status/<?php echo $items['id']; ?>" target='_blank' rel="external">Read More</a>
							            </div>
							        </div>
							    </div>
							    <div class='twitter_bottom'>
							        <!-- case video -->
							        <div class='twitter_post twitter_post_video'>
							            <div class='t_p_top'></div>
							            <div class='t_p_bottom'>
							                <video aria-label="Embedded video" poster="<?php echo $items['extended_entities']['media'][0]['media_url']; ?>" controls style="width: 100%; height: 100%;  background-color: black;">
							                    <source src="<?php echo $items['extended_entities']['media'][0]['video_info']['variants'][0]['url']?>" type="<?php echo $items['extended_entities']['media'][0]['video_info']['variants'][0]['content_type']?>">
							                </video>
							            </div>
							        </div>
							        <!-- END case video -->
							    </div>
								
							<?php }else{
								?>
								<div class='twitter_top'>
							        <div class='twitter_user_icon'>
							        	<?php if($t_logo){ ?>
							            	<img src='<?php echo $t_logo; ?>' alt='logo <?php echo $t_school_name; ?>' />
							        	<?php }else{

							        	} ?>
							        </div>
							        <div class='twitter_post_desc'>
							            <div class='twitter_user_info'>

							            	<b><a href="https://twitter.com/<?php echo $t_school_screen_name; ?>"><?php echo $t_school_name; ?></a></b> <span class='t_user'>@<?php echo $t_school_screen_name; ?></span><span class='t_date'> <?php echo $date; ?></span> 
							            </div>
							            <?php if($t_full_text) { ?>
								            <div class='twitter_post_description'>
								                <p><?php echo $t_full_text; ?></p>
								                
								            </div>
							        	<?php } ?>
							        	<div class='twitter_post_description'>
							            	<a href="https://twitter.com/i/web/status/<?php echo $items['id']; ?>" target='_blank' rel="external">Read More</a>
							            </div>
							        </div>
							    </div>
								<?php 
							} ?>
						</div>
	                    <?php
	                  	
	                }
	            }

	            
	            ?>

	    	</div>
    	</div>
    	
    </section>
    <?php 

    $contact_heading = get_field('contact_heading',$frontpage_id);
    $contact_show_section = get_field('contact_show_section',$frontpage_id);
    $contact_right_content = get_field('contact_right_content',$frontpage_id);
    if($contact_show_section == 'Yes'){ 
    ?>
	    <section class='content contact'>
	    	<div class='inner_wrapper'>
	    		<div class='two_cols_wrapper'>
	    			<div class='two_cols'>
	    				<?php if(!empty($contact_heading)) {?>
				    		<div class='content_heading'>
				    			<h2><?php echo $contact_heading; ?></h2>
				    		</div>
			    		<?php } ?>
			    		<div class='form_wrapper'>
			    			<?php echo do_shortcode( '[contact-form-7 id="20" title="Home Form"]' ); ?>
			    		</div>
		    		</div>
		    		<div class='two_cols'>
		    			<div class='extra_content_description'>
		    				<?php echo $contact_right_content; ?>
		    				<?php if( have_rows('contact_right_documents',$frontpage_id) ): ?>
		    					<div class='download_files'>
			    					<?php while( have_rows('contact_right_documents' ,$frontpage_id) ): the_row(); 
								        $file = get_sub_field('file');
								        // pr($file);
								        ?>
								        <a href="<?php echo $file['url']?>" target="_blank" class='download_file'><?php echo $file['filename']?> (<?php echo formatSizeUnits($file['filesize']); ?>)</a>
						        	<?php endwhile; ?>
					        	</div>
				         	<?php endif; ?>
		    				
		    			</div>
		    		</div>
		    	</div>
	    	</div>
	    </section>
	<?php } ?>
</section>

<?php get_footer(); ?>