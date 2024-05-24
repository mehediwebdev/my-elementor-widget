<?php
/**
 * Plugin Name: My Elementor Widget
 * Description: Custom Elementor addon.
 * Plugin URI:  https://wordpress.org
 * Version:     1.0.0
 * Author:      Mehedi Hasan
 * Author URI:  https://wordpress.org
 * Text Domain: my-elementor-widget
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor extension main class
 * @since 1.0.0
 */

 final class My_Elementor_Widget{

    // Plugin version
    const VERSION = '1.0.0';

    // Minimum Elementor Version
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    
    // Minimum PHP Version
    const MINIMUM_PHP_VERSION = '7.0';

    // Instance
    private static $_instance = null;

    /**
     * Singletone Instance Method
     * @since 1.0.0
     */
     
     public static function instance(){
        if( is_null( self::$_instance) ){
            self::$_instance = new self();
        }
        return self::$_instance;
     }


     /**
      * Construct Method
      *@since 1.0.0
      */

      public function __construct(){

       // Call Constants Method
       $this->define_constants();

       // Register stylesheet
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts_styles' ] );

      //  Internationalization
      add_action( 'init', [ $this, 'i18n' ] );


      }


      /**
       * Define Plugin constants
       * @since 1.0.0
       */

       public function define_constants(){
       
        define( 'MYEW_PLUGIN_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
        define( 'MYEW_PLUGIN_PATH', trailingslashit( plugin_dir_path( '/', __FILE__ ) ) );
        add_action( 'elementor/init', [ $this, 'init' ] );
        
       }
      
    /**
     * Load scripts and styles
     * @since 1.0.0
     */

     public function scripts_styles(){
       // wp_register_style( 'myew-style', MYEW_PLUGIN_URL .  'assets/dist/css/public.min.css', [], rand(), 'all' );
       // wp_register_script('myew-script', MYEW_PLUGIN_URL . 'assets/dist/js/public.min.js' [ 'jquery' ],  rand(), true);
        
        // wp_register_style( 'myew-style' );
         //wp_register_script( 'myew-script' );
     }



    /**
    * Load plugin textdomain
    *@since 1.0.0
    */
     public function i18n() {
    load_plugin_textdomain( 'my-elementor-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
    }

    /**
     * Initialize the Plugin
     * @since 1.0.0
     */

     public function init(){
      add_action('elementor/init', [ $this, 'init_category'] );
      add_action('elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
     }

     /**
      * Init Widgets
      * @since 1.0.0
      */

      public function init_widgets(){
        // require_once MYEW_PLUGIN_PATH . '/widgets/example.php';
        require_once( __DIR__ . '/widgets/example.php' );
      }

      /**
       * Init Category Section
       * @since 1.0.0
       */

       public function init_category(){
          Elementor\Plugin::instance()->elements_manager->add_category(
            'myew-for-elementor',
            [
               'title' => esc_html__( 'My Elementor Widget', 'my-elementor-widget' ),
            ]
          );
       }
 }

 My_Elementor_Widget::instance();