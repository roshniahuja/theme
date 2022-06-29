<?php
/**
 * Register Custom Taxonomies
 *
 * @package rosh-standard
 */

namespace rosh_standard\Inc;

use rosh_standard\Inc\Traits\Singleton;

/**
 * Class for register taxonomies.
 */
class Register_Taxonomies {
	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'register_year_taxonomy' ] );

	}

	/**
	 * Register Taxonomy Year.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function register_year_taxonomy() {

		$labels = [
			'name'              => _x( 'Years', 'taxonomy general name', 'rosh-standard' ),
			'singular_name'     => _x( 'Year', 'taxonomy singular name', 'rosh-standard' ),
			'search_items'      => __( 'Search Years', 'rosh-standard' ),
			'all_items'         => __( 'All Years', 'rosh-standard' ),
			'parent_item'       => __( 'Parent Year', 'rosh-standard' ),
			'parent_item_colon' => __( 'Parent Year:', 'rosh-standard' ),
			'edit_item'         => __( 'Edit Year', 'rosh-standard' ),
			'update_item'       => __( 'Update Year', 'rosh-standard' ),
			'add_new_item'      => __( 'Add New Year', 'rosh-standard' ),
			'new_item_name'     => __( 'New Year Name', 'rosh-standard' ),
			'menu_name'         => __( 'Year', 'rosh-standard' ),
		];
		$args   = [
			'labels'             => $labels,
			'description'        => __( 'Movie Release Year', 'rosh-standard' ),
			'hierarchical'       => false,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
		];
		register_taxonomy( 'movie-year', [ 'movies' ], $args );

	}

}
