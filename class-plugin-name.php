<?php

namespace Plugin_Name;

/**
 * The functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the stylesheet and JavaScript.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @author     Your Name <email@example.com>
 */
class Plugin_Name {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param    string    $plugin_name       The name of the plugin.
     * @param    string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the Stylesheets of the site.
     *
     * @since    1.0.0
     * @access public
     * @see wp_enqueue_scripts
     */
    public function enqueue_styles() {

        wp_enqueue_style( $this->plugin_name, PLUGIN_NAME_PLUGIN_URL . 'assets/plugin-name.css', [], $this->version, 'all' );

    }

    /**
     * Register the JavaScript of the site.
     *
     * @since    1.0.0
     * @access public
     * @see wp_enqueue_scripts
     */
    public function enqueue_scripts() {

        wp_enqueue_script( $this->plugin_name, PLUGIN_NAME_PLUGIN_URL . 'assets/plugin-name.js', ['jquery'], $this->version, false );

    }

}
