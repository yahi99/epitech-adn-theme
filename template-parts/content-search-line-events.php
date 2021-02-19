<li>
    <div class="search-date"><?php echo get_the_date('d.m.y'); ?></div>
    <a href="<?php the_permalink(); ?>" class="search-title"><?php the_title(); ?></a>
    <div class="search-excerpt"><?php echo limit_excerpt(20); ?></div>
</li>