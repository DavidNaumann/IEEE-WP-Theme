<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Davids_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

			endwhile; // End of the loop.
			?>

<?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )):
    $diamond_donators_json = stripslashes(get_theme_mod('diamond_donators_info'));
    $diamond_donators_info = json_decode($diamond_donators_json, true);
    $gold_donators_json = stripslashes(get_theme_mod('gold_donators_info'));
    $gold_donators_info = json_decode($gold_donators_json, true);
    $silver_donators_json = stripslashes(get_theme_mod('silver_donators_info'));
    $silver_donators_info = json_decode($silver_donators_json, true);

    // Counts
    $diamond_donators_count = count($diamond_donators_info);
    $gold_donators_count = count($gold_donators_info);
    $silver_donators_count = count($silver_donators_info);

    ?>
    <div id="page-sub-header">
        <div class="container donator-box">
            <?php if (($diamond_donators_count + $gold_donators_count + $silver_donators_count) > 0) { ?>
                <h1>Donators</h1>
                <?php if ($diamond_donators_count > 0) { ?>
                <h2 class="donator diamond">Diamond Donators</h2>
                <div class="row justify-content-center">
                    <div class="card-deck">
                        <?php
                        foreach ($diamond_donators_info as $diamond_donator) { ?>
                        <div class="card donator-card">
                            <img class="card-img-top" src="<?php echo $diamond_donator['donator_image'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $diamond_donator['donator_name'] ?></h5>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php } ?>
                <?php if ($gold_donators_count > 0) { ?>
                    <h2 class="donator gold">Gold Donators</h2>
                    <div class="row justify-content-center  ">
                        <div class="card-deck">
                            <?php
                            foreach ($gold_donators_info as $gold_donator) { ?>
                                <div class="card donator-card">
                                    <img class="card-img-top" src="<?php echo $gold_donator['donator_image'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $gold_donator['donator_name'] ?></h5>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($silver_donators_count > 0) { ?>
                    <h2 class="donator silver">Silver Donators</h2>
                    <div class="row justify-content-center">
                        <div class="card-deck">
                            <?php
                            foreach ($silver_donators_info as $silver_donator) { ?>
                                <div class="card donator-card">
                                    <img class="card-img-top" src="<?php echo $silver_donator['donator_image'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $silver_donator['donator_name'] ?></h5>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>

            <?php  } ?>
            <?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
