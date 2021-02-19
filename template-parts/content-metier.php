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
	<div class="content-metier">
        <header class="entry-header">

			<?php the_post_thumbnail(); ?>

            <div class="subtitle">
				<?php the_field('subtitle'); ?>
            </div>

			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
			<?php the_excerpt(); ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->
