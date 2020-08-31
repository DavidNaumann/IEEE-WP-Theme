<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Davids_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'davids-bootstrap' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header sticky-top <?php echo davids_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'davids_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'davids_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?>
                        <small><?php esc_url(bloginfo('description')); ?></small></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'davids_bootstrap_navwalker::fallback',
                'walker'          => new davids_bootstrap_navwalker()
                ));
                ?>
                <div id="social-nav" class="collapse navbar-collapse justify-content-end">
                    <ul id="social-menu" class="navbar-nav">
                        <?php if(get_theme_mod('discord_setting')) { ?>
                            <li id="twitter-social" class="menu-item nav-item">
                                <a href="<?php echo get_theme_mod('discord_setting') ?>" class="social-link">
                                    <span class="fab fa-discord"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(get_theme_mod('facebook_setting')) { ?>
                            <li id="twitter-social" class="menu-item nav-item social-links">
                                <a href="<?php echo get_theme_mod('facebook_setting') ?>" class="social-link">
                                    <span class="fab fa-facebook"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(get_theme_mod('instagram_setting')) { ?>
                            <li id="twitter-social" class="menu-item nav-item social-links">
                                <a href="<?php echo get_theme_mod('instagram_setting') ?>" class="social-link">
                                    <span class="fab fa-instagram"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(get_theme_mod('linkedin_setting')) { ?>
                            <li id="twitter-social" class="menu-item nav-item social-links">
                                <a href="<?php echo get_theme_mod('linkedin_setting') ?>" class="social-link">
                                    <span class="fab fa-linkedin"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(get_theme_mod('twitter_setting')) { ?>
                            <li id="twitter-social" class="menu-item nav-item social-links">
                                <a href="<?php echo get_theme_mod('twitter_setting') ?>" class="social-link">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
	</header><!-- #masthead -->
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo get_theme_mod( 'header_banner_title_setting' );
                    }else{
                        echo 'WordPress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo get_theme_mod( 'header_banner_tagline_setting' );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','davids-bootstrap');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <?php endif; ?>