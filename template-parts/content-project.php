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
	<div class="project-eip">
        <div class="picture">
            <?php the_post_thumbnail(); ?>

            <a href="#" class="link-video load-movie-player" data-callback-movie="<?php the_field('video_url'); ?>">
                <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40"><defs><style>.cls-1,.cls-2,.cls-5{fill:none;}.cls-2{clip-rule:evenodd;}.cls-3{clip-path:url(#clip-path);}.cls-4{clip-path:url(#clip-path-2);}.cls-5{stroke:#fff;stroke-miterlimit:10;stroke-width:2px;}.cls-6{clip-path:url(#clip-path-3);}</style><clipPath id="clip-path"><circle class="cls-1" cx="20" cy="20" r="20"/></clipPath><clipPath id="clip-path-2"><rect class="cls-1" width="41" height="40"/></clipPath><clipPath id="clip-path-3"><polygon class="cls-2" points="28 20.65 15 28.29 15 13 28 20.65"/></clipPath></defs><title>Objet dynamique vectoriel</title><g class="cls-3"><g class="cls-4"><circle class="cls-5" cx="20" cy="20" r="20"/></g></g><g class="cls-6"><g class="cls-4"><polygon class="cls-5" points="28 20.65 15 28.29 15 13 28 20.65"/></g></g></svg>
            </a>

            <div class="logo">
                <img src="<?php echo get_field( 'logo' )['url']; ?>" alt="">
            </div>
        </div>
        <div class="entry-content info">

            <div class="name">
                <?php the_title( '<h3 class="entry-title">{ ', ' }</h3>' ); ?>
            </div>

            <a href="<?php the_field('url'); ?>" target="_blank">VISITER LE SITE</a>

        </div>
    </div>
</article><!-- #post-## -->
