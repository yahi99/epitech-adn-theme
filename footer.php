<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package siteorigin-corp
 * @license GPL 2.0 
 */

?>

	<?php if(!is_front_page()) : ?>	
	
		</div><!-- .corp-container -->
	</div><!-- #content -->

	<?php endif; ?>

	</div><!-- #page -->

	<?php do_action( 'siteorigin_corp_footer_before' ); ?>

	<footer id="colophon" class="site-footer">

		<?php do_action( 'siteorigin_corp_footer_top' ); ?>

		<?php if ( siteorigin_page_setting( 'footer_widgets' ) ) : ?>
			<div class="container">
				<?php
					if ( is_active_sidebar( 'sidebar-footer' ) ) {
						$corp_sidebars = wp_get_sidebars_widgets();
						?>
						<div class="widgets widgets-<?php echo count( $corp_sidebars['sidebar-footer'] ) ?>" aria-label="<?php esc_attr_e( 'Footer Widgets', 'siteorigin-corp' ); ?>">
							<?php dynamic_sidebar( 'sidebar-footer' ); ?>
						</div>
						<?php
					}
				?>
			</div><!-- .corp-container -->
		<?php endif; ?>

		<!-- WIDGETS EPITECH -->
		<?php
		 if(is_active_sidebar('footer')) : ?>
			<div class="container">
				<div class="widgets widgets-4" aria-label="Footer Widgets">
					<?php dynamic_sidebar('footer'); ?>
				</div>
			</div>
		<?php endif; 
		?>
		<!-- .WIDGETS EPITECH -->
		
		<?php 
			$widget = siteorigin_setting( 'footer_social_widget' ); 
			if ( has_nav_menu( 'menu-2' ) || ! empty( $widget['networks'] ) ) : ?>
			<div class="container">
				<div class="footer-menu">
					<?php //wp_nav_menu( array( 'theme_location' => 'menu-2', 'depth' => 1, 'fallback_cb' => '' ) ); ?>

					<?php if ( ! empty( $widget['networks'] ) && class_exists( 'SiteOrigin_Widget_SocialMediaButtons_Widget' ) ) {
						the_widget( 'SiteOrigin_Widget_SocialMediaButtons_Widget', $widget );
					} 
				?>
				</div><!-- .footer-menu -->
			</div>
		<?php endif; ?>

	
		
		

	<?php do_action( 'siteorigin_corp_footer_bottom' ); ?>
		
	</footer><!-- #colophon -->

	<footer id="ecoles">
		<div class="bottom-bar">
			<!--div class="corp-container"-->
			<div class="container">
			<?php if ( isBodyClass( 'pll-en-gb' ) ) : ?>
				<p>Private higher education establishment. Registration at the Rectorate of Créteil. This school is a member of IONIS Education Group.</p>
			<?php endif; ?>

			<?php if ( isBodyClass( 'pll-fr-fr' ) ) : ?>
				<p>Etablissement d'enseignement supérieur privé. Inscription au Rectorat de Créteil. Cette école est membre de IONIS Education Group.</p>
			<?php endif; ?>
				
				<div id="footer-ecoles"></div>
				<div class="site-info">
					<?php

					siteorigin_corp_footer_text();

					if ( function_exists( 'the_privacy_policy_link' ) && siteorigin_setting( 'footer_privacy_policy_link' ) ) {
						the_privacy_policy_link( '<span>', '</span>' );
					}
					
					?>
				</div><!-- .site-info -->
			</div><!-- .container -->
				
		</div><!-- .bottom-bar -->
	</footer>

	<?php if(is_front_page()) : ?>
	</div><!-- .data-scroll-->
</main>
	<?php endif; ?>


<?php if ( siteorigin_setting( 'navigation_scroll_to_top' ) ) : ?>
	<div id="scroll-to-top">
		<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'siteorigin-corp' ); ?></span>
		<?php siteorigin_corp_display_icon( 'up-arrow' ); ?>
	</div>
<?php endif; ?>

<?php wp_footer(); ?>

<?php do_action( 'siteorigin_corp_footer_after' ); ?>

<script type="text/javascript">
    jQuery('#footer-ecoles').ecoles({
        'ecole' : 'epitech',
        'element' : "p",
        'separation' : ' - '
    });
</script>	

</body>
</html>
