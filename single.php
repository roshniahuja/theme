<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rosh-standard
 */

get_header();
?>

	<main id="primary" class="site-main rosh-standard-main u-padding-t80 site-main u-bg-lightgray">
		<div class="container">
			<div class="u-flex-columns u-flex-columns@mobile-max">
				<div class="u-flex-column u-flex-basis-7 u-flex-basis-7@mobile-max">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation(
							[
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'rosh-standard' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'rosh-standard' ) . '</span> <span class="nav-title">%title</span>',
							]
						);

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						endwhile; // End of the loop.
					?>
				</div>
				<div class="u-flex-column u-flex-basis-3 u-flex-basis-3@mobile-max">
					<div class="rosh-standard-sidebar u-margin-t50@mobile-max u-margin-t50 u-margin-b20">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
