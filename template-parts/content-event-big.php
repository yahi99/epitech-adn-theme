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
	<div class="news-big">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="news-link"></a>
        <?php the_post_thumbnail('event-big'); ?>
        <div class="top-lft">
            <?php $region = wp_get_post_terms(get_the_ID(), 'region'); ?>
            <span class="map"><?php echo $region[0]->name; ?></span>
            <div class="type"><?php the_field('event_type'); ?></div>
            <?php if (get_field('date_event')) : ?>
    		<span class="date"><?php the_field('date_event'); ?></span>
	    <?php else : ?>
                <span class="date"><?php echo get_the_date('d.m.y'); ?></span>
            <?php endif; ?>
            <div class="hour"><?php echo get_field('hour', get_the_ID()); ?></div>
        </div>
        <header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
            <div class="entry-footer">
                <div class="social-share">
                    <div class="social-share-ctn">
                        <ul>
                            <li><?php echo __('Partager', 'epitech'); ?></li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/epitech-corp/assets/images/logo-facebook.png" alt="" width="24" height="24"></a></li>
                            <li><a href="https://twitter.com/home?status=<?php echo esc_url( get_permalink() ); ?> via @epitech" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/epitech-corp/assets/images/logo-twitter.png" alt="" width="24" height="24"></a></li>
                        </ul>
                    </div>
                </div>
                <?php if(get_field('calendar_link')) : ?>
                    <?php get_template_part('template-parts/share', 'calendar'); ?>
                <?php endif; ?>
            </div>
        </header><!-- .entry-header -->
    </div>

</article><!-- #post-## -->