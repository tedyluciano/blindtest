<?php $query = $args['query']; ?>


<?php  $i = 0;




if ( $query->have_posts() ): ?>
    <ul class="row team">
        <?php while ( $query->have_posts() ): ?>

            <?php   $query->the_post(); ?>
            <?php

            /****************************************************************************************/

            /**
             * Titre
             * $string
             */
            $titre = get_field('titre', get_the_ID());

            /**
             * Lien
             * $string
             */
            $lien = get_field('lien', get_the_ID());

            /**
             * Background
             * $string
             */
            $background = get_field('background', get_the_ID());

            /**
             * Icon
             * $string
             */
            $icon = get_field('icon', get_the_ID());

            ?>

            <li class="col-12 col-md-6 col-lg-4" style="height: 250px;">
                <div class="cnt-block" style="height: 349px;">
                   <div class="titre-service">
                            <h4><?php echo $titre ?></h4>
                    </div>
                    <div class="icon-service" style="background: url(<?php echo $background ?>)no-repeat center;background-size: contain">
                        <img src="<?php echo $icon ?>" alt="<?php echo $titre ?>">
                    </div>
                </div>
            </li>

        <?php   endwhile;

        // Restore original post data.
        wp_reset_postdata();?>
    </ul>

<?php   endif; ?>

<?php // Restore original post data.
wp_reset_postdata(); ?>
