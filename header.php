<?php
/**
 * The header for our theme
 *
 * @package rosh-standard
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rosh-standard' ); ?></a>

	<header id="masthead" class="rosh-standard-header site-header u-bg-white">
		<div class="container">
			<div class="u-flex-columns u-align-items-center u-justify-content-space-between">
				<div class="u-flex-column u-flex-basis-3 u-flex-basis-6@mobile-max">
					<div class="site-branding u-padding-t10 u-padding-b10">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a class="u-primary-text-color" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a class="u-primary-text-color" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						?>
					</div><!-- .site-branding -->
				</div>
				<div class="u-flex-column u-flex-basis-7 u-flex-basis-4@mobile-max">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle " aria-label="Menu" aria-controls="primary-menu" aria-expanded="false"><svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="30px" height="30px"><path d="M 3 7 A 1.0001 1.0001 0 1 0 3 9 L 27 9 A 1.0001 1.0001 0 1 0 27 7 L 3 7 z M 3 14 A 1.0001 1.0001 0 1 0 3 16 L 27 16 A 1.0001 1.0001 0 1 0 27 14 L 3 14 z M 3 21 A 1.0001 1.0001 0 1 0 3 23 L 27 23 A 1.0001 1.0001 0 1 0 27 21 L 3 21 z"/></svg></button>
						<div class="rosh-standard-menu">
							<?php
								wp_nav_menu(
									[
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									]
								);
								?>
						</div>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
