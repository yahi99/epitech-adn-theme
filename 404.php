<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package siteorigin-corp
 * @license GPL 2.0 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404', 'epitech-adn' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<a href="<?php bloginfo('url'); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/adn/txt_404@2x.png" alt="">
					</a>
					<?php //get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
