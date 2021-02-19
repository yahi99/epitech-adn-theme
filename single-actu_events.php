<?php get_header(); ?>

    <!-- <div class="header-post-thumbnail">
        <?php the_post_thumbnail('fullpage'); ?>
    </div> -->

    <div class="container actu_events" style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-2 event-sidebar">
                <div class="row">
                    <div class="col-xs-6 col-sm-12">
                        <div class="date">
                            <?php if (get_field('date_event')) : ?>
                              <?php the_field('date_event'); ?>
                            <?php else : ?>
                               <?php echo get_the_date('d.m.y'); ?>
                            <?php endif; ?>
                            <div class="hour"><?php echo get_field('hour', get_the_ID()); ?></div>
                        </div>
                        <?php if(get_field('calendar_link')) : ?>
                            <a href="<?php the_field('calendar_link'); ?>" class="calendar"></a>
                        <?php endif; ?>
                    </div>
                    <div class="col-xs-6 col-sm-12">
                        <?php if(get_field('address')) : ?>
                            <div class="address">
                                <div class="address"><?php the_field('address'); ?></div>
                                <div class="address2"><?php the_field('address2'); ?></div>

                                <div>
                                    <span class="zipcode"><?php the_field('zipcode'); ?></span>
                                    <span class="city"><?php the_field('city'); ?></span>
                                </div>

                                <div><a href="http://maps.google.com/?q=<?php the_field('address'); ?>+<?php the_field('zipcode'); ?>+<?php the_field('city'); ?>" target="_blank"><?php echo __('Voir sur la carte', 'epitech-corp'); ?></a></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <?php the_title( '<h1 class="title xxlarge">', '</h1>' );?>
                <?php the_content(); ?>
                <div class="sharer">
                    <div class="social-share">
                        <div class="social-share-ctn">
                            <ul>
                                <li><?php echo __('Partager', 'epitech-corp'); ?></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/epitech-corp/assets/images/logo-facebook.png" alt="" width="24" height="24"></a></li>
                                <li><a href="https://twitter.com/home?status=<?php echo esc_url( get_permalink() ); ?>  via @epitech" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/epitech-corp/assets/images/logo-twitter.png" alt="" width="24" height="24"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    $args = array(
        'post_type' => 'actu_events',
        'post__not_in' => array( get_the_ID() ),
        'posts_per_page' => 5,
        'cat' => '11,6,8',
        'tax_query' => [
            'taxonomy' => 'region',
            'field' => 'term_id',
            'terms' => array(get_field('region'))
        ]
    );
    $query = new WP_Query( $args );
    ?>

    <div class="featured-events">

        <h2 class="block-title title xlarge"><?php echo __('Ces { évènements } pourraient aussi vous intéresser', 'epitech'); ?></h2>

        <div class="container">
            <div class="row slider-2-item">
                <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
                    <div>
                        <?php get_template_part('template-parts/content', 'event-big'); ?>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
