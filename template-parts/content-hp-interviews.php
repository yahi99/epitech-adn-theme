<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package epitech
 */

?>


<div class="portrait load-movie-player" data-callback-movie="<?php the_field('video_url'); ?>">
    
        <div class="glitch glitch--style-1">
            <div class="glitch__img"></div>
            <div class="glitch__img"></div>
            <div class="glitch__img"></div>
            <div class="glitch__img"></div>
            <div class="glitch__img"></div>
        </div>
        <div class="picture">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="info">
            <a href="#" class="cta">
                <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40"><defs><style>.cls-1,.cls-2,.cls-5{fill:none;}.cls-2{clip-rule:evenodd;}.cls-3{clip-path:url(#clip-path);}.cls-4{clip-path:url(#clip-path-2);}.cls-5{stroke:#fff;stroke-miterlimit:10;stroke-width:2px;}.cls-6{clip-path:url(#clip-path-3);}</style><clipPath id="clip-path"><circle class="cls-1" cx="20" cy="20" r="20"/></clipPath><clipPath id="clip-path-2"><rect class="cls-1" width="41" height="40"/></clipPath><clipPath id="clip-path-3"><polygon class="cls-2" points="28 20.65 15 28.29 15 13 28 20.65"/></clipPath></defs><title>Objet dynamique vectoriel</title><g class="cls-3"><g class="cls-4"><circle class="cls-5" cx="20" cy="20" r="20"/></g></g><g class="cls-6"><g class="cls-4"><polygon class="cls-5" points="28 20.65 15 28.29 15 13 28 20.65"/></g></g></svg>
            </a>
            <div class="content">
                <h3 class="name">{ <?php the_title(); ?> }</h3>
                <p class="function"><?php the_field('function'); ?></p>
                <div class="excerpt"><?php the_content(); ?></div>
            </div>
        </div>
</div>



<div id="pg-10593-8" class="panel-grid panel-has-style"><div class="section panel-row-style panel-row-style-for-10593-8" id="section6"><div class="container"><div id="pgc-10593-8-0" class="panel-grid-cell"><div id="panel-10593-8-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="11"><div class="alumni panel-widget-style panel-widget-style-for-10593-8-0-0"><div class="so-widget-sow-editor so-widget-sow-editor-base"><h3 class="widget-title">Découvrez le parcours de nos Alumni :</h3><div class="siteorigin-widget-tinymce textwidget"></div></div></div></div><div id="panel-10593-8-0-1" class="so-panel widget widget_siteorigin-panels-postloop" data-index="12"><div class="temoignages panel-widget-style panel-widget-style-for-10593-8-0-1"><div class="portrait load-movie-player" data-callback-movie="https://www.youtube.com/watch?v=D6-7hpCrBWE"><div class="glitch glitch--style-1"><div class="glitch__img"></div><div class="glitch__img"></div><div class="glitch__img"></div><div class="glitch__img"></div><div class="glitch__img"></div></div><div class="picture"> <img src="https://www.epitech.eu/fr/wp-content/uploads/sites/3/2019/04/Pierre-Marie-Laguet.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="https://www.epitech.eu/fr/wp-content/uploads/sites/3/2019/04/Pierre-Marie-Laguet.jpg 720w, https://www.epitech.eu/fr/wp-content/uploads/sites/3/2019/04/Pierre-Marie-Laguet-300x263.jpg 300w" sizes="(max-width: 720px) 100vw, 720px" width="720" height="631"></div><div class="info"> <a href="#" class="cta"><img src="./wp-content/themes/epitech-corp/assets/images/play_off.png" alt=""></a><div class="content"><h3 class="name">{ Pierre-Marie Laguet }</h3><p class="function">Co-fondateur et CEO de Blackfoot, Epitech promo 2016</p><div class="excerpt"></div></div></div></div><div class="portrait load-movie-player" data-callback-movie="https://www.youtube.com/watch?v=sjDhh_XVNc0"><div class="glitch glitch--style-1"><div class="glitch__img"></div><div class="glitch__img"></div><div class="glitch__img"></div><div class="glitch__img"></div><div class="glitch__img"></div></div><div class="picture"> <img src="https://www.epitech.eu/fr/wp-content/uploads/sites/3/2019/04/Epitech_Thomas_Solignac_promo2015_Cofondateur-et-CEO_Golem.ai_.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="https://www.epitech.eu/fr/wp-content/uploads/sites/3/2019/04/Epitech_Thomas_Solignac_promo2015_Cofondateur-et-CEO_Golem.ai_.jpg 720w, https://www.epitech.eu/fr/wp-content/uploads/sites/3/2019/04/Epitech_Thomas_Solignac_promo2015_Cofondateur-et-CEO_Golem.ai_-300x263.jpg 300w" sizes="(max-width: 720px) 100vw, 720px" width="720" height="631"></div><div class="info"> <a href="#" class="cta"> <img src="./wp-content/themes/epitech-corp/assets/images/play_off.png" alt=""></a><div class="content"><h3 class="name">{ Thomas Solignac }</h3><p class="function">Co-fondateur de Golem.ai, Epitech promo 2015</p><div class="excerpt"></div></div></div></div></div></div></div></div></div></div>
