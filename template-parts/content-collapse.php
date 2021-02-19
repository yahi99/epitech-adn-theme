<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package epitech
 */

?>

<div class="">
    <div class="article-collapse-post" role="tab" id="head<?php the_ID(); ?>">
        <div class="article-collapse-num"><?php the_field('point_number'); ?></div>
        <h4 class="">
            <a class="collapsed article-collapse-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapseOne">
                <span class="highlight"><?php the_field('pointkey'); ?></span> <?php the_title(); ?>
                <span class="rgt"><?php the_field('cycle'); ?></span>
            </a>
        </h4>
    </div>
    <div id="<?php the_ID(); ?>" class="collapse article-collapse-body" role="tabpanel" aria-labelledby="head<?php the_ID(); ?>">
        <?php the_content(); ?>
    </div>
</div>
