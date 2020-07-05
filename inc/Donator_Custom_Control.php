<?php

if (!class_exists('WP_Customize_Image_Control'))
{
    return null;
}

class Diamond_Donator_Custom_Control extends WP_Customize_Control
{
    public function enqueue()
    {
        wp_enqueue_script('diamond-donator-script', get_template_directory_uri().'/inc/assets/js/diamond-donator-control.js', array( 'jquery' ), rand(), true);
    }

    public function render_content()
    { ?>
        <div id="diamond-donator-control-items">
            <div class='actions'>
                <a id="add-diamond" class="button-secondary upload">Add Diamond Donator</a>
            </div>
        </div>

        <input class="wp-editor-area" id="diamond-donators-input" <?php $this->link(); ?>>
    <?php
    }
}

class Gold_Donator_Custom_Control extends WP_Customize_Control
{
    public function enqueue()
    {
        wp_enqueue_script('gold-donator-script', get_template_directory_uri().'/inc/assets/js/gold-donator-control.js', array( 'jquery' ), rand(), true);
    }

    public function render_content()
    { ?>
        <div id="gold-donator-control-items">
            <div class='actions'>
                <a id="add-gold" class="button-secondary upload">Add Gold Donator</a>
            </div>
        </div>

        <input class="wp-editor-area" id="gold-donators-input" <?php $this->link(); ?>>
        <?php
    }
}

class Silver_Donator_Custom_Control extends WP_Customize_Control
{
    public function enqueue()
    {
        wp_enqueue_script('silver-donator-script', get_template_directory_uri().'/inc/assets/js/silver-donator-control.js', array( 'jquery' ), rand(), true);
    }

    public function render_content()
    { ?>
        <div id="silver-donator-control-items">
            <div class='actions'>
                <a id="add-silver" class="button-secondary upload">Add Silver Donator</a>
            </div>
        </div>

        <input class="wp-editor-area" id="silver-donators-input" <?php $this->link(); ?>>
        <?php
    }
}
?>