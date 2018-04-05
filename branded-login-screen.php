<?php
/*
Plugin Name: Lightweight Branded Login Screen
Plugin URI: https://github.com/Julianoe/lightweight-branded-login-screen
Description: Add basic text and images to login screen to fit your brand or mood from the Customizer
Version: 1.0
Author: Julien Gasbayet
Author URI: http://julien.gasbayet.fr
License: GPLv2
*/

/*
HOW TO USE
This plugin simply adds a custom panel in the customizer with 4 parameters :
 - to replace the wordpress logo on the login page
 - set a background image coupled with a nice linear-gradient
 - replace the title text
 - replace the logo link
*/

load_plugin_textdomain( 'lightweight_branded_login', false, basename( dirname( __FILE__ ) ) . '/lang' );
define('LBLS_PLUGIN_DIR', plugin_dir_path(__FILE__));
require_once LBLS_PLUGIN_DIR . 'inc/customizer.php';


/**
 * Adding a branded login screen
 */
function bls_login_branding_theme() { ?>
    <style type="text/css">
      <?php if ( get_option('lbls_logo') ) : ?>
        #login{
          padding:2% 0 0 !important ;
        }
        #login h1 a, .login h1 a {
          background-image: url(<?php echo get_option( 'lbls_logo' ); ?>);
          background-size: 200px;
          height:175px;
          width:200px;
        }
      <?php else : ?>
      <?php endif; ?>

      <?php if ( get_option('lbls_background') ) : ?>
        .login #backtoblog a, .login #nav a{
          color : white !important;
        }
        body{
          background: linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.4) ), url(<?php echo get_option( 'lbls_background' ); ?>) !important;
          background-position: center center !important;
          background-repeat:no-repeat !important;
          background-size: cover !important;
        }
      <?php else : ?>
      <?php endif; ?>


    </style>
<?php }
add_action( 'login_enqueue_scripts', 'bls_login_branding_theme' );

if( get_option('lbls_title') ){
  function bls_login_text() {
    $login_text = get_option('lbls_title');
    return $login_text;
  }
  add_filter('login_headertitle', 'bls_login_text');
}

if( get_option('lbls_link') ){
  function bls_login_url() {
    $login_link = get_option('lbls_link');
    return $login_link;
  }
  add_filter('login_headerurl', 'bls_login_url');
}
