<?php
/**
 * Plugin Name: Lightweight Branded Login Screen
 * Plugin URI: https://github.com/Julianoe/lightweight-branded-login-screen
 * Description: Add basic text and images to login screen to fit your brand or mood from the Customizer
 * Version: 1.2
 * Author: Julianoe
 * Author URI: http://julien.gasbayet.fr
 * License: GPLv2
 * Textdomain: lightweight-branded-login-screen
 * Domain Path: lang/
*/

load_plugin_textdomain( 'lightweight-branded-login-screen', false, basename( dirname( __FILE__ ) ) . '/lang' );
define('LBLS_PLUGIN_DIR', plugin_dir_path(__FILE__));
require_once LBLS_PLUGIN_DIR . 'inc/customizer.php';


/**
 * Adding a branded login screen
 */
function lbls_login_branding_theme() { ?>
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
          <?php if ( get_option('lbls_background_opacity')) : ?>
            <?php $color = get_option('lbls_background_opacity'); ?>
            background: linear-gradient( rgba(0, 0, 0, <?php echo $color; ?>), rgba(0, 0, 0, <?php echo $color; ?>) ), url(<?php echo get_option( 'lbls_background' ); ?>) !important;
          <?php else: ?>
            background: url(<?php echo get_option( 'lbls_background' ); ?>) !important;
          <?php endif; ?>

          background-position: center center !important;
          background-repeat:no-repeat !important;
          background-size: cover !important;
        }
      <?php else : ?>
      <?php endif; ?>


    </style>
<?php }
add_action( 'login_enqueue_scripts', 'lbls_login_branding_theme' );

/**
 * If title text is set replace the default one
 */
if( get_option('lbls_title') ){
  function lbls_login_text() {
    $login_text = get_option('lbls_title');
    return $login_text;
  }
  add_filter('login_headertext', 'lbls_login_text');
}

/**
 * If a link is set replace the default Wordpress one
 */
if( get_option('lbls_link') ){
  function lbls_login_url() {
    $login_link = get_option('lbls_link');
    return $login_link;
  }
  add_filter('login_headerurl', 'lbls_login_url');
}
