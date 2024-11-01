<?php
/**
 * Plugin Name: SK-Elib
 * Description: This simple plugin takes care of the rest, with zero configuration. Transparent backgrounds work best. Crop it tight, with a width of 312 pixels, for best results.
 * Version: 2.0.0
 * Author: ООО «ЭйВиДи-системы»
 * Author URI: https://open4u.ru
 * Text Domain: sk-elib
 * 
 * ==========================================================================
 * 
 * Copyright (c) 2022 Ivan Molvinskikh (email: i.molvinskih@gmail.com)
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WC_PLUGIN_FILE' ) ) {
	define( 'WC_PLUGIN_FILE', __FILE__ );
}

class SK_ELIB {
	public static $instance;
	
	public function __construct() {
		self::$instance = $this;
		add_action('login_head', array( $this, 'login_head' ));
	}

	public function login_headerurl() {
		return esc_url(trailingslashit(get_bloginfo('url')));
	}

	public function login_headertitle() {
		return esc_attr(get_bloginfo('name'));
	}

	public function login_head() {
		add_filter('login_headerurl', array( $this, 'login_headerurl' ));
		add_filter(
			version_compare(get_bloginfo('version'), '5.2', '>=') ? 'login_headertext' : 'login_headertitle',
			array( $this, 'login_headertitle' )
		);
		
		$attachment_id = absint( get_theme_mod( 'custom_logo' ) );
		$logo_attributes  = wp_get_attachment_image_src($attachment_id , array(312,312) );
		if ( ! empty( $logo_attributes ) ){
		$logo_url = $logo_attributes[0];
		$logo_width = $logo_attributes[1];
		$logo_height = $logo_attributes[2];
		$logo_is_intermediate = $logo_attributes[3];
		
		?>
		<style>
			.login h1 a {
				background: url(<?php echo esc_url_raw( $logo_url ); ?>) no-repeat top center;
				width:  <?php echo absint($logo_width); ?>px;
				height: <?php echo absint($logo_height); ?>px;
				background-size: cover;
			}
		</style>
		<?php
		}
	}
}

// Bootstrap
new SK_ELIB;

/* TEST */

// страница админки
add_action( 'admin_menu', function(){

	add_options_page( __('Demo translation','sk-elib'), __('Demo translation','sk-elib'), 'manage_options', 'sk-elib_plugin', function(){

		_nx_noop( '%s noop star','%s noop stars','Контекст _nx_noop','sk-elib' );
		_n_noop( '%s noop star','%s noop stars','sk-elib' );

		?>
		<div class="wrap">
			<h2><?php echo get_admin_page_title() ?></h2>
		</div>

		<h3><?= __( 'Different variants of translation in WordPress.','sk-elib') ?></h3>
		<p class="description"><?= __( 'WordPress translation functions.','sk-elib') ?></p>

		<p>_e() — <?php _e( 'Some translation text.','sk-elib' ); ?></p>

		<p>_ex() — <?php _ex( 'Some translation text.','Фраза контекста _ex','sk-elib' ); ?></p>

		<p>_x() — <?php echo _x( 'Some translation text.','Контенкст echo _x','sk-elib' ); ?></p>

		<p>_n(1) — <?php printf( _n( '%s star','%s stars', 1, 'sk-elib' ), 1 ); ?></p>
		<p>_n(3) — <?php printf( _n( '%s star','%s stars', 3, 'sk-elib' ), 3 ); ?></p>
		<p>_n(10) — <?php printf( _n( '%s star','%s stars', 10, 'sk-elib' ), 10 ); ?></p>

		<p>_nx(1) — <?php printf( _nx( '%s star','%s stars', 1, 'Фраза контекста для множественного числа _nx','sk-elib' ), 1 ); ?></p>
		<p>_nx(3) — <?php printf( _nx( '%s star','%s stars', 3, 'Фраза контекста для множественного числа _nx','sk-elib' ), 3 ); ?></p>
		<p>_nx(10) — <?php printf( _nx( '%s star','%s stars', 10, 'Фраза контекста для множественного числа _nx','sk-elib' ), 10 ); ?></p>

		<p>esc_attr__() — <?php echo esc_attr__('string 1','sk-elib') ?></p>
		<p>esc_attr_e() — <?php esc_attr_e('string 2','sk-elib') ?></p>
		<p>esc_html__() — <?php echo esc_html__('string 3','sk-elib') ?></p>
		<p>esc_html_e() — <?php esc_html_e('string 4','sk-elib') ?></p>

		<?php

	} );

} );