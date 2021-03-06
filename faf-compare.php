<?php

/*
Plugin Name: FAF Compare
Plugin URI: https://github.com/fafiebig/faf-compare
Description: Show images before/after comparison of your WordPress images (based on TwentyTwenty).
Version: 1.0
Author: F.A. Fiebig
Author URI: http://fafworx.com
License: GNU GENERAL PUBLIC LICENSE
*/

defined( 'ABSPATH' ) or die( 'No direct script access allowed!' );

/**
 * load translation domain
 */
function fafCompareLoadTextdomain()
{
    load_plugin_textdomain('faf-compare', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'fafCompareLoadTextdomain');

/**
 * add scripts and styles
 */
function fafCompareEnqueueScriptsStyles()
{
    wp_enqueue_script('tt-event-move-js', plugins_url('twentytwenty/js/jquery.event.move.js', __FILE__), array(), '1.0', true);
    wp_enqueue_script('tt-jquery-js', plugins_url('twentytwenty/js/jquery.twentytwenty.js', __FILE__), array(), '1.0', true);
    wp_enqueue_script('tt-compare-js', plugins_url('twentytwenty/js/jquery.compare.js', __FILE__), array(), '1.0', true);

    wp_enqueue_style('tt-foundation-css', plugins_url('twentytwenty/css/foundation.css', __FILE__));
    wp_enqueue_style('tt-css', plugins_url('twentytwenty/css/twentytwenty.css', __FILE__), array('tt-foundation-css'));
}
add_action('wp_enqueue_scripts', 'fafCompareEnqueueScriptsStyles');

/**
 * add scripts and styles to admin
 */
function fafCompareEnqueueAdminScriptsStyles()
{
    wp_enqueue_script('faf-compare-editor-js', plugins_url('editor/editor.js', __FILE__), array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'fafCompareEnqueueAdminScriptsStyles');

/**
 * add editor button
 */
function fafCompareAddEditorButton()
{
    echo '<a href="#" id="faf-compare-short" class="button">'.__('FAF Image Compare', 'faf-compare').'</a>';
}
add_action('media_buttons', 'fafCompareAddEditorButton', 101);

/**
 * add short code
 *
 * @param $atts
 * @return string
 */
function fafCompareShort( $atts )
{
    if (isset($atts['before']) && isset($atts['after'])) {
        $orientation    = (isset($atts['orientation'])) ? $atts['orientation'] : 'horizontal';
        $size           = (isset($atts['size'])) ? $atts['size'] : 'thumbnail';
        $before         = $atts['before'];
        $after          = $atts['after'];

        $html  = '<div class="twentytwenty-container" data-orientation="'.$orientation.'">';
        $html .= wp_get_attachment_image($before, $size);
        $html .= wp_get_attachment_image($after, $size);
        $html .= '</div>';

        return $html;
    }
}
add_shortcode('compare', 'fafCompareShort');
