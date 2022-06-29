<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rosh-standard
 */

?>

<section class="no-results not-found rosh-standard-post-article u-margin-t50 u-margin-b50 u-margin-t50@mobile-max u-margin-b50@mobile-max u-bg-white u-padding-a15">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'rosh-standard' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'rosh-standard' ),
					[
						'a' => [
							'href' => [],
						],
					]
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p class="u-margin-t10 u-margin-b10"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rosh-standard' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rosh-standard' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
