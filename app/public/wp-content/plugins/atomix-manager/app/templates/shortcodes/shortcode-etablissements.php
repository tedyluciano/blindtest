
<?php

$query = $args['query'];

?>

<?php if ( $query->have_posts() ): ?>
<section id="etablissements">



    <div class="naccs">
        <div class="grid">
            <div class="gc gc--1-of-3">
                <div class="menu">
                    <?php $i=0; while ( $query->have_posts() ): ?>

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

                        <div class="<?php if( $i == 0 ):?>active<?php endif; ?>"><span class="light"></span><span><?php echo $title ?></span></div>

                    <?php $i++; endwhile;

                    // Restore original post data.
                    wp_reset_postdata();?>

                </div>
            </div>
            <div class="gc gc--2-of-3">
                <ul class="nacc">

                    <?php $h=0; while ( $query->have_posts() ): ?>

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


                        /**
                         * Lien
                         * $group
                         */
                        $lien = get_field('lien', get_the_ID());
                        $interneexterne = $lien['interneexterne'];
                        $page = $lien['page'];
                        $url = $lien['url'];

                        $image2 = esc_url(wp_get_attachment_image_src($pics, 'full')[0]);


                        ?>

                        <li class="<?php if( $h == 0 ):?>active<?php endif; ?>">
                            <div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if($title != ''):  ?>
                                                <div class="title-etblmt">
                                                    <h3><?php echo $title ?></h3>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($sub_title != ''):  ?>
                                                <div class="subtitle-etblmt">
                                                    <h4><?php echo $sub_title ?></h4>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="pics--etblmt" style="background: url(<?php echo $image2 ?>)no-repeat center;background-size: cover;width: 100%;height: 200px;"></div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row" style="margin-top: 1em;">
                                        <div class="col-md-12">
                                           <div class="content-etblmnt">
                                               <?php echo $description ?>
                                           </div>
                                        </div>
                                        <?php if($interneexterne != null && isset($interneexterne)): ?>
                                            <?php if($interneexterne['value'] == 'externe'): ?>
                                                <div class="col-md-12">
                                                    <div class="btn-wrag-etblmnt">
                                                        <a target="_blank" class="externe-etblmnt elementor-animation-shrink" href="<?php echo $url ?>"><i class="fas fa-globe-africa"></i> En savoir plus</a>
                                                    </div>
                                                </div>
                                            <?php elseif($interneexterne['value'] == 'interne'): ?>
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <a target="_blank"  class="interne-etblmnt elementor-animation-shrink" href="<?php echo $page ?>">En savoir plus</a>
                                                    </div>
                                                </div>
                                            <?php endif;  ?>
                                        <?php endif;  ?>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <?php $h++; endwhile;

                    // Restore original post data.
                    wp_reset_postdata();?>




                </ul>
            </div>
        </div>
    </div>






</section>





<?php   endif; ?>