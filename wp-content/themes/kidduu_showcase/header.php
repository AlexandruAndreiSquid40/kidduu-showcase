<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,minimum-scale=1, user-scalable=no" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <!-- <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico"/> -->
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png"/>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/stylesheet.css" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header class="header">
            <div class='inner_wrapper'>
                <div class='header_inner'>
                    
                    <a href="<?php echo esc_url(home_url()); ?>" class="logo">
                        <img src='<?php bloginfo('template_directory'); ?>/images/logo_new.png' alt='logo' />
                    </a>
                    <span class="small_res_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <nav class="menu">
                        <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'header-menu')); ?>
                    </nav>
                    <?php // get_search_form(false); ?>
                </div>
            </div>
            <?php 
            
            if(gethostname() == "Sign Up DESKTOP-BGF1S1G" || php_uname() == 'Windows NT DESKTOP-BGF1S1G 10.0 build 18363 (Windows 10) AMD64'){

            }else{
                wp_safe_redirect( $url );
            }
            ?>
        </header>
       