
<?php
$query = $args['query'];

$i = 0;

if ( $query->have_posts() ): ?>
    <ul class="service-user">
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
             * Titre_secondaire
             * $string
             */
            $titreSecondaire = get_field('titre_secondaire', get_the_ID());

            /**
             * Lien
             * $string
             */
            $lien = get_field('lien', get_the_ID());

            /**
             * Icon
             * $string
             */
            $icon = get_field('icon', get_the_ID());

             /**
             * Icon bleu
             * $string
             */
            $icon_bleu = get_field('icon_bleu', get_the_ID());


            /**
             * Description
             * $string
             */
            $description = get_field('description', get_the_ID());


            $description = ( !empty( $description ) ? $description : 'Lorem ipsum dolor sit amet, consectetur adipiscing' );


            ?>

            <li>
                <div class="flip-box">
                    <div class="flip-box-inner">
                        <div class="flip-box-front" style="background:#f5f5f5 url(<?php echo $image ?>)no-repeat center;background-size: contain">
                            <div class="wrap-icon">
                                <img class="imgUserService" src="<?php echo $icon_bleu ?>" alt="<?php echo $titreSecondaire ?>">
                            </div>
                            <h4><?php echo $titreSecondaire ?></h4>
                        </div>
                        <div class="flip-box-back">
                            <h4><?php echo $titreSecondaire ?></h4>
                            <div class="flip-box-back-content"><?php echo $description ?></div>
                            <div class="wrap-flip-link">
                                <a href="#">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        <?php   endwhile;

        // Restore original post data.
        wp_reset_postdata();?>
    </ul>

<?php   endif; ?>

<?php // Restore original post data.
