<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.orionorigin.com/
 * @since      0.1
 *
 * @package    Wad
 * @subpackage Wad/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wad
 * @subpackage Wad/public
 * @author     ORION <support@orionorigin.com>
 */
class Wad_Public {

    /**
     * The ID of this plugin.
     *
     * @since    0.1
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    0.1
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    0.1
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    0.1
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wad_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wad_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wad-public.css', array(), $this->version, 'all');
        wp_enqueue_style("o-tooltip", WAD_URL . 'public/css/tooltip.min.css', array(), $this->version, 'all');
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    0.1
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wad_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wad_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wad-public.js', array('jquery'), $this->version, false);
        wp_enqueue_script("o-tooltip", WAD_URL . 'public/js/tooltip.min.js', array('jquery'), $this->version, false);
    }

    function init_globals() {
        global $wad_discounts;
        global $wad_settings;
        $wad_settings = get_option("wad-options");
        
        $cache_enabled=  get_proper_value($wad_settings, "enable-cache", 0);
        if($cache_enabled)
        {
            $cached_discounts = get_transient( 'orion_wad_discounts_transient' );
            if($cached_discounts)
            {
                $wad_discounts=$cached_discounts;
                return;
            }
        }
        
        $discount_obj = new WAD_Discount(false);
        $all_discounts = $discount_obj->get_active_discounts(true);
        foreach ($all_discounts as $discount_type => $discounts) {
            $wad_discounts[$discount_type] = array();
            foreach ($discounts as $discount_id) {
                $wad_discounts[$discount_type][$discount_id] = new WAD_Discount($discount_id);
            }
        }

        if($cache_enabled)
            set_transient( 'orion_wad_discounts_transient', $wad_discounts, 12 * HOUR_IN_SECONDS );
    }

}
