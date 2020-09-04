<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Davids_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="sticky-footer" class="py-4 footer-bg text-white-50" role="contentinfo">
		<div class="container">
            <div class="site-info">
                <div class="row">
                    <div class="pull-left col">
                        <p>
                        <?php if ( get_theme_mod( 'davids_bootstrap_starter_logo' ) ): ?>
                            <a href="<?php echo esc_url( home_url( '/' )); ?>">
                                <img src="<?php echo esc_url(get_theme_mod( 'davids_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                            </a>
                        <?php else : ?>
                            &copy; 2020 Copyright: <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?>
                                <small><?php esc_url(bloginfo('description')); ?></small></a>
                        <?php endif; ?>
                        </p>
                    </div>
                    <div class="col footer-social">
                        <nav class="navbar navbar-expand-xl p-0">
                            <div id="social-nav" class="collapse navbar-collapse justify-content-end">
                                <ul id="social-menu" class="navbar-nav">
                                    <?php if(get_theme_mod('discord_setting')) { ?>
                                        <li id="social" class="menu-item nav-item">
                                            <a href="<?php echo get_theme_mod('discord_setting') ?>" class="social-link">
                                                <span class="fab fa-discord"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('facebook_setting')) { ?>
                                        <li id="social" class="menu-item nav-item social-links">
                                            <a href="<?php echo get_theme_mod('facebook_setting') ?>" class="social-link">
                                                <span class="fab fa-facebook"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('instagram_setting')) { ?>
                                        <li id="social" class="menu-item nav-item social-links">
                                            <a href="<?php echo get_theme_mod('instagram_setting') ?>" class="social-link">
                                                <span class="fab fa-instagram"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('linkedin_setting')) { ?>
                                        <li id="social" class="menu-item nav-item social-links">
                                            <a href="<?php echo get_theme_mod('linkedin_setting') ?>" class="social-link">
                                                <span class="fab fa-linkedin"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('twitter_setting')) { ?>
                                        <li id="social" class="menu-item nav-item social-links">
                                            <a href="<?php echo get_theme_mod('twitter_setting') ?>" class="social-link">
                                                <span class="fab fa-twitter"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>