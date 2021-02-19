<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package epitech
 */

get_header();

$terms = get_terms('region', array(
    'hide_empty' => true,
));

$thematics = get_terms('thematic', array(
    'hide_empty' => false,
));

$args = [];

$region = isset($_GET['region_id']) ? intval(sanitize_text_field($_GET['region_id'])) : null;
if($region) {
    $args[] = [
        'taxonomy' => 'region',
        'field' => 'term_id',
        'terms' => array($region)
    ];
}


$theme = isset($_GET['theme_id']) ? intval(sanitize_text_field($_GET['theme_id'])) : null;
if($theme) {
    $args[] = [
        'taxonomy' => 'thematic',
        'field' => 'term_id',
        'terms' => array($theme)
    ];
}

$queryEventFeatured = new WP_Query(
    array(
        'post_type' => 'actu_events',
        'cat' => '11,8,6',
        'orderby' => 'date', 
        'order' => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'tax_query' => $args
    )
);

$queryNewsFeatured = new WP_Query(
    array(
        'post_type' => 'actu_events',
        'category__not_in' => array(11,8,6), 
        'orderby' => 'date',
        'post_status' => 'publish',
        'order' => 'DESC',
        'posts_per_page' => 1,
        'tax_query' => $args
    )
);

$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

$other_news = new WP_Query(
    array(
        'post_type' => 'actu_events',
        'category__not_in' => array(11,8),
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'tax_query' => $args,
        'paged' => $paged
    )
);

?>
    <form action="" class="filter-news-events clear">
        <fieldset>
            <div class="container">
                <legend>Filtrer</legend>
                <div class="form-group">
                    <label for="region_id"><?php echo __('Par ville', 'epitech'); ?></label>
                    <select name="region_id" id="region_id">
                        <option value=""><?php echo __('Toutes les villes', 'epitech'); ?></option>
                        <?php foreach ($terms as $term) : ?>
                            <option value="<?php echo $term->term_id; ?>" <?php echo $region == $term->term_id ? 'selected' : null; ?>><?php echo $term->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="theme_id"><?php echo __('Par thématique', 'epitech'); ?></label>
                    <select name="theme_id" id="theme_id">
                        <option value=""><?php echo __('Toutes les thématiques', 'epitech'); ?></option>
                        <?php foreach ($thematics as $term) : ?>
                            <option value="<?php echo $term->term_id; ?>" <?php echo $theme == $term->term_id ? 'selected' : null; ?>><?php echo $term->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-submit">
                    <button class="button--primary white" type="submit"><?php echo __('Rechercher', 'epitech'); ?></button>
                </div>
            </div>
        </fieldset>
        <a href="#" class="show-hide-filters">
            <span class="show-filter">Afficher les filtres</span>
            <span class="hide-filter">Masquer les filtres</span>
        </a>
    </form>


    <div class="highlighted-news clear">
        <div class="container">
            <div class="text-center centered">
                <h1 class="anchor-title title xxlarge centered"><?php echo __('A la { une }', 'epitech'); ?></h1>
            </div>

            <div class="row clear">
                <?php if ($queryEventFeatured->have_posts()) : ?>
                    <?php while ($queryEventFeatured->have_posts()) : $queryEventFeatured->the_post(); ?>
                        <div class="col-sm-6">
                            <?php get_template_part('template-parts/content', 'event-big'); ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php if ($queryNewsFeatured->have_posts()) : ?>
                    <?php while ($queryNewsFeatured->have_posts()) : $queryNewsFeatured->the_post(); ?>
                        <div class="col-sm-6">
                            <?php get_template_part('template-parts/content', 'event-big'); ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="text-center centered clear">
            <h2 class="title xlarge centered"><?php echo __('Nos autres { actualités } et { évènements }', 'epitech'); ?> </h2>
        </div>

    <div class="container clear">
       
        <div class="list-articles-events" id="list-actu"></div>
        <div id="here"></div>

        <div id="prototype_news" style="display: none;">
            <div class="list-row">
                <div class="event"></div>
                <div class="news"></div>
            </div>
        </div>
    </div>

    <div class="events-news-loading" id="ajaxlink">
        <div class="loading"></div>
        <div><?php echo __('Chargement en cours', 'epitech'); ?></div>
    </div>

<?php
get_footer();