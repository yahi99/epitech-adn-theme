<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package epitech
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div class="title-prefix"><?php echo __('Le Programme', 'epitech'); ?></div>
		<?php the_title( '<h3 class="entry-title">{ ', ' }</h3>' ); ?>
	</header><!-- .entry-header -->

    <div class="badge-tr">
        <div class="badge-ttl"><?php the_field('badge_title'); ?></div>
        <div class="badge-txt"><?php the_field('badge_text'); ?></div>
    </div>

	<div class="entry-content">
        <div class="admission-title"><?php the_field('admission_title'); ?></div>
		<div class="admission-txt">
			<?php the_excerpt(); ?>
        </div>
        <div class="title-epitech">
            <span><?php the_field('title_epitech'); ?></span>
            <div class="service-title"><?php the_field('service_title'); ?></div>
        </div>
	</div><!-- .entry-content -->
    <div class="entry-footer">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-lg btn-primary">
            <?php echo __('Découvrir le programme', 'epitech'); ?>
        </a>
    </div>
</article><!-- #post-## -->
