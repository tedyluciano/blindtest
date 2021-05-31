
<?php

$query = $args['query'];

?>

<?php if ( $query->have_posts() ): ?>
<section id="partenaire">





            <div class="container py-2">

                <!-- cards -->
                <div class="row">
    <?php while ( $query->have_posts() ): ?>

        <?php   $query->the_post(); ?>


            <?php

            /**
             * Title
             * $string
             */
            $title = get_field('title', get_the_ID());

            /**
             * Sub-title
             * $string
             */
            $sub_title = get_field('sub-title', get_the_ID());

            /**
             * Pics
             * $id
             */
            $pics = get_field('pics', get_the_ID());

            /**
             * Description
             * $string
             */
            $description = get_field('description', get_the_ID());


            $image2 = esc_url(wp_get_attachment_image_src($pics, 'full')[0]);


            ?>

                    <div class="col-lg-4 col-md-6 mb-4 pt-5">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="user-picture"  style="background:#fff url(<?php echo $image2  ?>)no-repeat center; background-size: contain">
                                </div>
                                <div class="user-content">
                                    <h5 class="text-capitalize user-name"><?php echo $title ?></h5>
                                    <p class=" text-capitalize text-muted small blockquote-footer"><?php echo $sub_title ?></p>
                                   <!-- <div class="small">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                        <i class="fas fa-star text-light"></i>
                                    </div>-->
                                    <div class="small text-muted mb-0" style="text-align: justify"><?php echo $description ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php   endwhile;

            // Restore original post data.
            wp_reset_postdata();?>

                </div>
            </div>


</section>
<?php   endif; ?>