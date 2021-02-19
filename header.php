<?php
/**
 * The theme header.
 *
 * This is the template that displays all of the <head> section and everything up until <div class="corp-container">.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package siteorigin-corp
 * @license GPL 2.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
do_action( 'siteorigin_corp_body_top' );
?>

<div class="loader">
	<div class="logo"><span class="epitech"></span></div>
	<div class="uil-ring-css" style='transform:scale(0.67);'><div></div></div>
</div>

<!--div id="overlay-video-player" class="overlay-video-player">
    <div id="loading">Loading...</div>
    <div class="video-player">
        <div id="video-player"></div>
    </div>
    <button type="button" id="close-video-player" class="btn btn-primary close-video-player"><?php echo __('Fermer la vidéo', 'epitech'); ?></button>
</div-->

<!-- open/close -->
<div class="overlay overlay-hugeinc">
	<button type="button" class="overlay-close">Close</button>
	<nav>
	<?php if ( siteorigin_setting( 'navigation_header_menu' ) ) wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
	</nav>
	<div class="languages polylang">
		<ul><?php pll_the_languages(); ?></ul>
	</div>
</div>

<div class="container">
	<nav class="navigation">
		<div id="trigger-overlay" class="nav-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<em>MENU</em>
		</div>
		<div class="after"></div>
	</nav>
</div>

<?php if(is_front_page()) : ?>

<main>
    <div data-scroll>

<?php endif; ?>


<div id="page" class="site wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'siteorigin-corp' ); ?></a>

	<?php do_action( 'siteorigin_corp_header_before' ); ?>

	<header id="masthead" class="site-header<?php if ( siteorigin_setting( 'header_layout' ) == 'centered' ) echo ' centered';  if ( siteorigin_setting( 'header_sticky' ) ) echo ' sticky'; if ( siteorigin_setting( 'navigation_mobile_menu' ) ) echo ' mobile-menu'; ?>" <?php if ( siteorigin_setting( 'header_scales' ) ) echo 'data-scale-logo="true"' ?> >

		<?php if(is_front_page()) : ?>
		<section class="nav-header">

			<header class="header mobile">
				<div class="logo">
					<a href="<?php bloginfo('url'); ?>">
					<?php if ( isBodyClass( 'pll-en-gb' ) ) : ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/adn/logo_mobile_uk@2x.png" alt="">
					<?php endif; ?>

					<?php if ( isBodyClass( 'pll-fr-fr' ) ) : ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/adn/logo_mobile@2x.png" alt="">
					<?php endif; ?>

					</a>
				</div>
				<div id="particle-canvas-mobile"></div>
			</header>

			<div class="container">

				<nav class="navigation">
					<div class="languages">
						<ul>
							<li><a href="/" <?php if ( isBodyClass( 'pll-fr-fr' ) ) : ?> class="on"<?php endif; ?> title="version FR">FR</a></li>
							<li><a href="/en/" <?php if ( isBodyClass( 'pll-en-gb' ) ) : ?> class="on"<?php endif; ?> title="version EN">EN</a></li>
						</ul>
					</div>
				</nav>

				<header class="header desktop">
					<div class="logo">
						<a href="<?php bloginfo('url'); ?>">
						<?php if ( isBodyClass( 'pll-en-gb' ) ) : ?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/adn/logos-baseline_uk.svg" alt="">
						<?php endif; ?>

						<?php if ( isBodyClass( 'pll-fr-fr' ) ) : ?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/adn/logos-baseline.svg" alt="">
						<?php endif; ?>
						</a>
					</div>
					<div id="particle-canvas"></div>
				</header>

			</div>

		</section>
		<?php endif; ?>


		<?php if(!is_front_page()) : ?>

			<section class="nav-header">

				<div class="corp-container">

					<div class="site-branding">
						<?php siteorigin_corp_display_logo(); ?>
						<?php if ( siteorigin_setting( 'header_site_description' ) ) : ?>
							<p class="site-description"><?php bloginfo( 'description' ); ?></p>
						<?php endif ?>
					</div><!-- .site-branding -->

					<div class="site-header-inner">
						<div class="container">
							<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/adn/logo-interne.svg" class="logo-epitech" alt=""></a>
							<!--a href="<?php bloginfo('url'); ?>" class="backhome" title="Page d'acceuil"></a-->
							<div class="languages polylang">
								<ul><?php pll_the_languages(); ?></ul>
								<?php//if ( has_nav_menu( 'campus-international-menu' ) ) : ?>
								<?php
									/*wp_nav_menu ( array (
										'theme_location' => 'campus-international-menu' ,
										'menu_class' => 'target-en', // classe CSS pour customiser mon menu
									) );*/ ?>
								<?php //endif; ?>
							</div>
							<nav id="site-navigation" class="navigation">

								<?php //if ( siteorigin_setting( 'navigation_header_menu' ) ) wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

							</nav><!-- #site-navigation -->
						</div><!-- .container -->
					</div><!-- .site-header-inner -->

				</div><!-- .corp-container -->



		</section>


		<?php endif; ?>

	</header><!-- #masthead -->

	<?php do_action( 'siteorigin_corp_content_before' ); ?>

	<?php if(!is_front_page()) : ?>

	<div id="content" class="site-content">

		<div class="corp-container">

			<div class="header-bg">
				<div class="container">
					<div class="content"></div>
				</div>
			</div>

			<header class="main-header">
				<div class="container">
					<?php if ( function_exists('yoast_breadcrumb') ) : ?>
						<div class="main-breadcrumbs">
							<?php yoast_breadcrumb('<nav class="breadcrumbs"><p>','</p></nav>'); ?>
						</div>
					<?php endif; ?>
				</div>
			</header>


			<?php //do_action( 'siteorigin_corp_content_top' ); ?>

	<?php endif; ?>
