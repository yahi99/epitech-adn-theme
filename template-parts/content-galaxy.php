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
	<div class="article-ctn">
        <header class="entry-header">

            <a href="<?php echo esc_url( get_permalink() ); ?>">
                <?php the_post_thumbnail(); ?>
            </a>

            <div class="additionnal-logo">
                <img src="<?php echo get_field( 'logo' )['url']; ?>" alt="">
            </div>

            <h3 class="entry-title">
                <a href="<?php echo get_category_link(get_the_category()[0]); ?>">
                    { <?php echo get_the_category()[0]->name; ?> }
                </a>
            </h3>
        </header><!-- .entry-header -->

        <div class="entry-content">
			<?php the_excerpt(); ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->