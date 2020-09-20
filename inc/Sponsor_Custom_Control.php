<?php

if (!class_exists('WP_Customize_Image_Control'))
{
    return null;
}

class Diamond_Donator_Custom_Control extends WP_Customize_Control
{
    public function enqueue()
    {
        wp_enqueue_script('diamond-sponsor-script', get_template_directory_uri().'/inc/assets/js/diamond-sponsor-control.js', array( 'jquery' ), rand(), true);
    }

    public function render_content()
    { ?>
        <div id="diamond-sponsor-control-items">
            <div class='actions'>
                <a id="add-diamond" class="button-secondary upload">Add Diamond Donator</a>
            </div>
        </div>

        <input class="wp-editor-area" type="hidden" id="diamond-sponsors-input" <?php $this->link(); ?>>
    <?php
    }
}

class Gold_Donator_Custom_Control extends WP_Customize_Control
{
    public function enqueue()
    {
        wp_enqueue_script('gold-sponsor-script', get_template_directory_uri().'/inc/assets/js/gold-sponsor-control.js', array( 'jquery' ), rand(), true);
    }

    public function render_content()
    { ?>
        <div id="gold-sponsor-control-items">
            <div class='actions'>
                <a id="add-gold" class="button-secondary upload">Add Gold Donator</a>
            </div>
        </div>

        <input class="wp-editor-area" type="hidden" id="gold-sponsors-input" <?php $this->link(); ?>>
        <?php
    }
}

class Silver_Donator_Custom_Control extends WP_Customize_Control
{
    public function enqueue()
    {
        wp_enqueue_script('silver-sponsor-script', get_template_directory_uri().'/inc/assets/js/silver-sponsor-control.js', array( 'jquery' ), rand(), true);
    }

    public function render_content()
    { ?>
        <div id="silver-sponsor-control-items">
            <div class='actions'>
                <a id="add-silver" class="button-secondary upload">Add Silver Donator</a>
            </div>
        </div>

        <input class="wp-editor-area" type="hidden" id="silver-sponsors-input" <?php $this->link(); ?>>
        <?php
    }
}
?>