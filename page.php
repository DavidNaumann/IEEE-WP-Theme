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

            <?php if(is_front_page()):
                    $diamond_sponsors_json = stripslashes(get_theme_mod('diamond_sponsors_info'));
                    $diamond_sponsors_info = json_decode($diamond_sponsors_json, true);
                    $gold_sponsors_json = stripslashes(get_theme_mod('gold_sponsors_info'));
                    $gold_sponsors_info = json_decode($gold_sponsors_json, true);
                    $silver_sponsors_json = stripslashes(get_theme_mod('silver_sponsors_info'));
                    $silver_sponsors_info = json_decode($silver_sponsors_json, true);

                    if(is_null($diamond_sponsors_info))
                    {
                        $diamond_sponsors_info = [];
                    }
                    if(is_null($gold_sponsors_info))
                    {
                        $gold_sponsors_info = [];
                    }
                    if(is_null($silver_sponsors_info))
                    {
                        $silver_sponsors_info = [];
                    }

                    // Counts
                    $diamond_sponsors_count = count($diamond_sponsors_info);
                    $gold_sponsors_count = count($gold_sponsors_info);
                    $silver_sponsors_count = count($silver_sponsors_info);

            ?>

            <div id="page-sub-header" style="text-align: center; margin: auto">
            <?php if (($diamond_sponsors_count + $gold_sponsors_count + $silver_sponsors_count) > 0) { ?>
                <h2 class="sponsor text-center">Sponsors</h2>
                <div class="row justify-content-center align-items-center">
                    <?php foreach ($diamond_sponsors_info as $diamond_sponsor) { ?>
                    <div class="col-sm-2">
                        <div class="card sponsor-card diamond-card">
                            <div class="embed-responsive embed-responsive-1by1">
                                <img class="card-img-top embed-responsive-item" src="<?php echo $diamond_sponsor['sponsor_image'] ?>" alt="<?php echo $diamond_sponsor['sponsor_alt'] ?>">
                            </div>
                            <div class="card-body">
                                <p class="diamond mt-auto">Diamond</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php foreach ($gold_sponsors_info as $gold_sponsor) { ?>
                    <div class="col-sm-2">
                        <div class="card sponsor-card gold-card">
                            <div class="embed-responsive embed-responsive-1by1">
                                <img class="card-img-top embed-responsive-item" src="<?php echo $gold_sponsor['sponsor_image'] ?>" alt="<?php echo $gold_sponsor['sponsor_alt'] ?>">
                            </div>
                            <div class="card-body">
                                <p class="gold mt-auto">Gold</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php foreach ($silver_sponsors_info as $silver_sponsor) { ?>
                    <div class="col-sm-2">
                        <div class="card sponsor-card silver-card">
                            <div class="embed-responsive embed-responsive-1by1">
                                <img class="card-img-top embed-responsive-item" src="<?php echo $silver_sponsor['sponsor_image'] ?>" alt="<?php echo $silver_sponsor['sponsor_alt'] ?>">
                            </div>
                            <div class="card-body">
                            <p class="silver mt-auto">Silver</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <?php endif; ?>


        </main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
