<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rosh-standard
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="rosh-standard-post-article u-margin-t50 u-margin-b50 u-margin-t50@mobile-max u-margin-b50@mobile-max u-bg-white u-padding-a15">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<?php \rosh_standard\Inc\Template_Tags::get_instance()->post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				[
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rosh-standard' ),
					'after'  => '</div>',
				]
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'rosh-standard' ),
							[
								'span' => [
									'class' => [],
								],
							]
						),
						wp_kses_post( get_the_title() )
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>	
</article><!-- #post-<?php the_ID(); ?> -->
