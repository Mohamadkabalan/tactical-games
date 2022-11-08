<?php
/**
 * Plugin Name: Formidable WooCommerce
 * Plugin URI: https://formidableforms.com
 * Description: Use Formidable Forms on individual WooCommerce product pages to create customizable products. Requires the Formidable Forms plugin.
 * Author: Strategy11
 * Author URI: https://formidableforms.com
 * Version: 1.10
 * Text Domain: formidable-woocommerce
 * Domain Path: /languages/
 * WC requires at least: 3.0.0
 * WC tested up to: 3.6.4
 *
 * @package   WC-Formidable
 * @author    Strategy11
 * @copyright Copyright (c) 2015, Strategy11
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Formidable' ) ) {

/**
 * WooCommerce Formidable Forms Product Addons main class.
 *
 * @since 1.0
 */
class WC_Formidable {

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance;


	/**
	 * Initialize the plugin.
	 */
	private function __construct() {
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		$dir = dirname( __FILE__ );
		require_once $dir . '/helpers/class-wc-formidable-app-helper.php';

		// no sense in doing this if WC & FP aren't active
		if ( ! WC_Formidable_App_Helper::is_woocommerce_active() || ! function_exists( 'frm_forms_autoloader' ) ) {
			// add admin notice about plugin requiring other plugins
			add_action( 'admin_notices', array( $this, 'required_plugins_error' ) );
			return;
		}

		require_once $dir . '/classes/class-wc-formidable-admin.php';
		require_once $dir . '/classes/class-wc-formidable-product.php';

		add_action( 'admin_init', array( $this, 'include_updater' ), 1 );

		new WC_Formidable_Admin();
		new WC_Formidable_Product();

		if ( class_exists( 'FrmRegShortcodesController' ) ) {
			require_once $dir . '/classes/class-wc-formidable-settings.php';
			new WC_Formidable_Settings();
		}
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return WC_Formidable A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function include_updater() {
		if ( class_exists( 'FrmAddon' ) ) {
			include_once( dirname( __FILE__ ) . '/woo-includes/FrmWooUpdate.php' );
			FrmWooUpdate::load_hooks();
		}
	}

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'formidable-woocommerce' );

		load_textdomain( 'formidable-woocommerce', trailingslashit( WP_LANG_DIR ) . 'woocommerce-formidable-product-addons/woocommerce-formidable-product-addons-' . $locale . '.mo' );
		load_plugin_textdomain( 'formidable-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Display an error to the user that the plugin has been disabled
	 *
	 * @since 1.0
	 */
	public function required_plugins_error() {
		?>
		<div class="error">
			<p><?php esc_html_e( 'WooCommerce Formidable Forms Product Addons requires both Formidable Forms & WooCommerce to be active.', 'formidable-woocommerce' ); ?></p>
		</div>
		<?php
	}
}

add_action( 'plugins_loaded', array( 'WC_Formidable', 'get_instance' ) );

// constants
define( 'WC_FP_PRODUCT_ADDONS_PLUGIN_FILE', __FILE__ );

}
