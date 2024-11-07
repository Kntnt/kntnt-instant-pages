<?php

declare( strict_types=1 );

namespace Kntnt\Instant_Pages;

/**
 * Plugin main class.
 */
class Plugin {

	/**
	 * Constructor.
	 *
	 * @param string $plugin_file Path to the plugin's main file
	 */
	public function __construct( string $plugin_file, private string $plugin_url = '', private string $plugin_version = '' ) {

		$this->plugin_url     = plugin_dir_url( $plugin_file );
		$this->plugin_version = get_file_data( $plugin_file, [ 'Version' => 'Version' ] )['Version'] ?? '';

		add_action( 'wp_enqueue_scripts', $this->enqueue_scripts( ... ) );

	}

	/**
	 * Register and enqueue scripts.
	 */
	public function enqueue_scripts(): void {

		/**
		 * Filters whether to skip loading instant pages functionality.
		 *
		 * @param bool $is_skipping Whether to skip loading the instant pages script. Default false.
		 */
		$is_skipping = apply_filters( 'kntnt-instant-pages-skip', false );

		// Skip if $is_skipping is true or in admin or customizer
		if ( $is_skipping || is_admin() || is_customize_preview() ) {
			return;
		}

		// Enqueue the checker script in footer for proper loading order
		wp_enqueue_script( handle: 'kntnt-instant-pages', src: "{$this->plugin_url}js/kntnt-instant-pages.js", deps: [], ver: $this->plugin_version, args: true );

		// Configure script
		wp_localize_script( handle: 'kntnt-instant-pages', object_name: 'kntntInstantPages', l10n: [
			'speculationActive' => is_plugin_active( 'speculation-rules/load.php' ),
			'instantPageUrl'    => "{$this->plugin_url}js/instant.page.js",
		] );

	}

}