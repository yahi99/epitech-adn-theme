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
	<div class="news-elm">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="news-link">
	        <?php the_post_thumbnail('event-news'); ?>
        </a>

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
				the_title( '<h1 class="title xlarge">', '</h1>' );
			else :
				the_title( '<h2 class="title medium"><a href="' . esc_url( get_permalink() ) . '" class="cta-secondary" rel="bookmark">', '</a></h2>' );
			endif;
			?>

            <div class="excerpt">
                <?php the_excerpt(); ?>
            </div>

            <div class="entry-footer">
                <div class="social-share">
                    <div class="social-share-ctn">
                        <ul>
                            <li><?php echo __('Partager', 'epitech'); ?></li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/epitech-corp/assets/images/logo-facebook.png" alt="" width="24" height="24"></a></li>
                            <li><a href="https://twitter.com/home?status=<?php echo esc_url( get_permalink() ); ?>  via @epitech" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/epitech-corp/assets/images/logo-twitter.png" alt="" width="24" height="24"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header><!-- .entry-header -->
    </div>

</article><!-- #post-## -->