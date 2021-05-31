
<?php //var_dump($args[]); ?>


<aside class="sect-article-home">
    <?php  $i = 0; if ( $args['query']->have_posts() ) : ?>
    <div id="wrap_ing" class="vc_row wpb_row vc_row-fluid">

    <?php while ( $args['query']->have_posts() ) : $args['query']->the_post(); ?>
        <?php global $post; ?>


        <div class="wpb_column vc_column_container vc_col-sm-4 inner-post">





           <div class="news-prw">
                <?php

                $subtitle = get_field('subtitle');
                //$image = get_the_post_thumbnail_url(get_the_ID(), 'full');

                //if ($image) :

                 //   $image1 = get_the_post_thumbnail_url(get_the_ID(), 'full');



                 //   echo '<div class="news-prw-image" style="background: transparent url('.$image1.')no-repeat center; background-size: cover;">';

               // else :

                    $image2 = esc_url(wp_get_attachment_image_src(3412, 'full')[0]);

                    echo '<div class="news-prw-image" style="background: transparent url('.$image2.')no-repeat center; background-size: cover;">';

               // endif;

                ?>
                <a href="<?php the_permalink(); ?>">




                    <span><i class="icon-link"></i></span>
                </a>
            </div>
            <div class="wp_add act-height">
              <!--  <div class="news-prw-date">

                    <?php

                    $categories = get_categories( array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ));

                    $category_link = '';

                    /*foreach( $categories as $category ) {
                        $category_link = sprintf(
                            '<span class="cat_">%1$s</span>',
                            esc_html($category->name)
                        );
                    }*/

                    ?>

                    <?php echo $category_link; ?>

                    <span class="date"><?php echo get_the_date('d M Y'); ?></span>

                </div> -->
                <h3 class="news-prw-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <h5><?= $subtitle ?></h5>
               <!-- <p><?php

                    $content = get_the_excerpt();
                    $length = 100;
                    if(strlen($content) > $length) {
                        $content = substr($content, 0, $length)." [...]";
                    }
                    echo $content;
                    ?>


                </p>-->
                <a href="<?php the_permalink(); ?>" class="btn btn-border"> Lire plus > </a>
            </div>

        </div>
        </div>





    <?php   $i++; endwhile;  ?>
    <?php wp_reset_postdata(); ?>





    </div>
        <?php if($args['page'] == 'actu'): ?>
            <div class="container" style="margin-top: 1em">
                <div class="row">
                    <div class="col-md-12">
                        <?php



                        global $wp_query;

                        $big = 999999999; // need an unlikely integer

                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $args['query']->max_num_pages
                        ));


                        ?>
                    </div>

                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</aside>
