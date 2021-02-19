
<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package epitech
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="news-list">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="news-cta">
            <div class="news-overlay"><span>+</span></div>
            <div class="news-image"><?php the_post_thumbnail('event-news'); ?></div>
            <header class="entry-header">
                <?php
                $region = wp_get_post_terms(get_the_ID(), 'region');
                ?>

                <div>
                    <span class="map"><?php echo $region[0]->name; ?></span>
                    <?php if (get_field('date_event')) : ?>
                    <span class="date">- <?php the_field('date_event'); ?></span>
                    <?php else : ?>
                    <span class="date">- <?php echo get_the_date('d.m.y'); ?></span>
                    <?php endif; ?>
                    
                </div>

                <?php
                if ( is_single() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title( '<h4 class="entry-title ellipsis"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
                endif;
                ?>
                <div class="excerpt">
                    <?php the_excerpt(); ?>
                </div>

            </header><!-- .entry-header -->
        </a>
    </div>
</article><!-- #post-## -->