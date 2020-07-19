<?php
/**
 * Davids Bootstrap Starter Theme Customizer
 *
 * @package Davids_Bootstrap_Starter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

require_once('Donator_Custom_Control.php');

function themeslug_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function donators_customize_register( $wp_customize ) {

// Create our panels

    $wp_customize->add_panel( 'donators', array(
        'title' => 'Donators',
    ) );

// Create our sections

    $wp_customize->add_section( 'diamond_donators' , array(
        'title' => 'Diamond Donators',
        'panel' => 'donators',
    ) );

    $wp_customize->add_section( 'gold_donators' , array(
        'title' => 'Gold Donators',
        'panel' => 'donators',
    ) );

    $wp_customize->add_section( 'silver_donators' , array(
        'title'             => 'Silver Donators',
        'panel' => 'donators',
    ) );

// Create our settings

    $wp_customize->add_setting( 'diamond_donators_info', array(
        'default' => __( '[]' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new Diamond_Donator_Custom_Control( $wp_customize, 'diamond_donators_info', array(
        'label'    => __( 'Diamond Donators Image', 'davids-bootstrap' ),
        'section'  => 'diamond_donators',
        'settings' => 'diamond_donators_info',
        'type' => 'text'
    ) ) );

    $wp_customize->add_setting( 'gold_donators_info', array(
        'default' => __( '[]' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new Gold_Donator_Custom_Control( $wp_customize, 'gold_donators_info', array(
        'label'    => __( 'Gold Donators', 'davids-bootstrap' ),
        'section'  => 'gold_donators',
        'settings' => 'gold_donators_info',
        'type' => 'text'
    ) ) );

    $wp_customize->add_setting( 'silver_donators_info', array(
        'default' => __( '[]' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new Silver_Donator_Custom_Control( $wp_customize, 'silver_donators_info', array(
        'label'    => __( 'Silver Donators', 'davids-bootstrap' ),
        'section'  => 'silver_donators',
        'settings' => 'silver_donators_info',
        'type' => 'text'
    ) ) );

}

function davids_bootstrap_starter_customize_register( $wp_customize ) {
    /*Banner*/
    $wp_customize->add_section(
        'header_image',
        array(
            'title' => __( 'Header Banner', 'davids-bootstrap' ),
            'priority' => 30,
        )
    );


    $wp_customize->add_control(
        'header_img',
        array(
            'label' => __( 'Header Image', 'davids-bootstrap' ),
            'section' => 'header_images',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'header_bg_color_setting',
        array(
            'default'     => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label'      => __( 'Header Banner Background Color', 'davids-bootstrap' ),
                'section'    => 'header_image',
                'settings'   => 'header_bg_color_setting',
            ) )
    );

    $wp_customize->add_setting( 'header_banner_title_setting', array(
        'default' => __( 'Davids Bootstrap Framework', 'davids-bootstrap' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
        'label' => __( 'Banner Title', 'davids-bootstrap' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_title_setting',
        'type' => 'text'
    ) ) );

    $wp_customize->add_setting( 'header_banner_tagline_setting', array(
        'default' => __( 'To customize the contents of this header banner and other elements of your site go to Dashboard - Appearance - Customize','davids-bootstrap' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_tagline_setting', array(
        'label' => __( 'Banner Tagline', 'davids-bootstrap' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_tagline_setting',
        'type' => 'text'
    ) ) );
    $wp_customize->add_setting( 'header_banner_visibility', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'themeslug_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_visibility', array(
        'settings' => 'header_banner_visibility',
        'label'    => __('Remove Header Banner', 'davids-bootstrap'),
        'section'    => 'header_image',
        'type'     => 'checkbox',
    ) ) );


    //Site Name Text Color
   $wp_customize->add_section(
        'site_name_text_color',
        array(
            'title' => __( 'Other Customizations', 'davids-bootstrap' ),
            //'description' => __( 'This is a section for the header banner Image.', 'davids-bootstrap' ),
            'priority' => 40,
        )
    );
    $wp_customize->add_section(
        'colors',
        array(
            'title' => __( 'Background Color', 'davids-bootstrap' ),
            //'description' => __( 'This is a section for the header banner Image.', 'davids-bootstrap' ),
            'priority' => 50,
            'panel' => 'styling_option_panel',
        )
    );
    $wp_customize->add_section(
        'background_image',
        array(
            'title' => __( 'Background Image', 'davids-bootstrap' ),
            //'description' => __( 'This is a section for the header banner Image.', 'davids-bootstrap' ),
            'priority' => 60,
            'panel' => 'styling_option_panel',
        )
    );

    // Bootstrap and Fontawesome Option
    $wp_customize->add_setting( 'cdn_assets_setting', array(
        'default' => __( 'no','davids-bootstrap' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( 
        'cdn_assets',
        array(
            'label' => __( 'Use CDN for Assets', 'davids-bootstrap' ),
            'description' => __( 'All Bootstrap Assets and FontAwesome will be loaded in CDN.', 'davids-bootstrap' ),
            'section' => 'site_name_text_color',
            'settings' => 'cdn_assets_setting',
	        'type'    => 'select',
	        'choices' => array(
	            'yes' => __( 'Yes', 'davids-bootstrap' ),
	            'no' => __( 'No', 'davids-bootstrap' ),
        	)
        )
    );
	
	/*Social Links*/
    $wp_customize->add_section(
        'social_links',
        array(
            'title' => __( 'Social Links', 'davids-bootstrap' ),
            'priority' => 70,
        )
    );
	$wp_customize->add_setting( 'discord_setting', array(
        'default' => __( '' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'discord_setting', array(
        'label' => __( 'Discord Link', 'davids-bootstrap' ),
        'section'    => 'social_links',
        'settings'   => 'discord_setting',
        'type' => 'text'
    ) ) );
    $wp_customize->add_setting( 'facebook_setting', array(
        'default' => __( '' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'facebook_setting', array(
        'label' => __( 'Facebook Link', 'davids-bootstrap' ),
        'section'    => 'social_links',
        'settings'   => 'facebook_setting',
        'type' => 'text'
    ) ) );
	$wp_customize->add_setting( 'instagram_setting', array(
        'default' => __( '' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'instagram_setting', array(
        'label' => __( 'Instagram Link', 'davids-bootstrap' ),
        'section'    => 'social_links',
        'settings'   => 'instagram_setting',
        'type' => 'text'
    ) ) );
	$wp_customize->add_setting( 'linkedin_setting', array(
        'default' => __( '' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'linkedin_setting', array(
        'label' => __( 'Linkedin Link', 'davids-bootstrap' ),
        'section'    => 'social_links',
        'settings'   => 'linkedin_setting',
        'type' => 'text'
    ) ) );
	$wp_customize->add_setting( 'twitter_setting', array(
        'default' => __( '' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'twitter_setting', array(
        'label' => __( 'Twitter Link', 'davids-bootstrap' ),
        'section'    => 'social_links',
        'settings'   => 'twitter_setting',
        'type' => 'text'
    ) ) );

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
    $wp_customize->get_control( 'header_textcolor'  )->section = 'site_name_text_color';
    $wp_customize->get_control( 'background_image'  )->section = 'site_name_text_color';
    $wp_customize->get_control( 'background_color'  )->section = 'site_name_text_color';

    // Add control for logo uploader
    $wp_customize->add_setting( 'davids_bootstrap_starter_logo', array(
        //'default' => __( '', 'davids-bootstrap' ),
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'davids_bootstrap_starter_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'davids-bootstrap' ),
        'section'  => 'title_tagline',
        'settings' => 'davids_bootstrap_starter_logo',
    ) ) );

}

add_action('customize_register', 'donators_customize_register');
add_action( 'customize_register', 'davids_bootstrap_starter_customize_register' );

add_action( 'wp_head', 'davids_bootstrap_starter_customizer_css');
function davids_bootstrap_starter_customizer_css()
{
    ?>
    <style type="text/css">
        #page-sub-header { background: <?php echo get_theme_mod('header_bg_color_setting', '#fff'); ?>; }
    </style>
    <?php
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function davids_bootstrap_starter_customize_preview_js() {
    wp_enqueue_script( 'davids_bootstrap_starter_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'davids_bootstrap_starter_customize_preview_js' );
