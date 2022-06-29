<?php
/**
 * Register Post Types
 *
 * @package rosh-standard
 */

namespace rosh_standard\Inc;

use rosh_standard\Inc\Traits\Singleton;

/**
 * Class for register post types.
 */
class Register_Post_Types {
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
		add_action( 'init', [ $this, 'register_movie_cpt' ], 0 );

	}

	/**
	 * Register Custom Post Type Movie.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function register_movie_cpt() {

		$labels = [
			'name'                  => _x( 'Movies', 'Post Type General Name', 'rosh-standard' ),
			'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'rosh-standard' ),
			'menu_name'             => _x( 'Movies', 'Admin Menu text', 'rosh-standard' ),
			'name_admin_bar'        => _x( 'Movie', 'Add New on Toolbar', 'rosh-standard' ),
			'archives'              => __( 'Movie Archives', 'rosh-standard' ),
			'attributes'            => __( 'Movie Attributes', 'rosh-standard' ),
			'parent_item_colon'     => __( 'Parent Movie:', 'rosh-standard' ),
			'all_items'             => __( 'All Movies', 'rosh-standard' ),
			'add_new_item'          => __( 'Add New Movie', 'rosh-standard' ),
			'add_new'               => __( 'Add New', 'rosh-standard' ),
			'new_item'              => __( 'New Movie', 'rosh-standard' ),
			'edit_item'             => __( 'Edit Movie', 'rosh-standard' ),
			'update_item'           => __( 'Update Movie', 'rosh-standard' ),
			'view_item'             => __( 'View Movie', 'rosh-standard' ),
			'view_items'            => __( 'View Movies', 'rosh-standard' ),
			'search_items'          => __( 'Search Movie', 'rosh-standard' ),
			'not_found'             => __( 'Not found', 'rosh-standard' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'rosh-standard' ),
			'featured_image'        => __( 'Featured Image', 'rosh-standard' ),
			'set_featured_image'    => __( 'Set featured image', 'rosh-standard' ),
			'remove_featured_image' => __( 'Remove featured image', 'rosh-standard' ),
			'use_featured_image'    => __( 'Use as featured image', 'rosh-standard' ),
			'insert_into_item'      => __( 'Insert into Movie', 'rosh-standard' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'rosh-standard' ),
			'items_list'            => __( 'Movies list', 'rosh-standard' ),
			'items_list_navigation' => __( 'Movies list navigation', 'rosh-standard' ),
			'filter_items_list'     => __( 'Filter Movies list', 'rosh-standard' ),
		];
		$args   = [
			'label'               => __( 'Movie', 'rosh-standard' ),
			'description'         => __( 'The movies', 'rosh-standard' ),
			'labels'              => $labels,
			'menu_icon'           => 'dashicons-admin-post',
			'supports'            => [
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
				'author',
				'comments',
				'trackbacks',
				'page-attributes',
				'custom-fields',
			],
			'taxonomies'          => [],
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		];

		register_post_type( 'movies', $args );

	}


}
