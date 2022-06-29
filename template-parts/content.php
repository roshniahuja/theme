<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rosh-standard
 */

$template_tags_class = \rosh_standard\Inc\Template_Tags::get_instance();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="rosh-standard-post-article u-margin-t50 u-margin-b50 u-margin-t50@mobile-max u-margin-b50@mobile-max u-bg-white u-padding-a15">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title u-margin-b10">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title u-margin-b10"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					$template_tags_class->posted_on();
					$template_tags_class->posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php $template_tags_class->post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'rosh-standard' ),
						[
							'span' => [
								'class' => [],
							],
						]
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				[
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rosh-standard' ),
					'after'  => '</div>',
				]
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php $template_tags_class->entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>	
</article><!-- #post-<?php the_ID(); ?> -->
