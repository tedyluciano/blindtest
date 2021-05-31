
<?php

$query = $args['query'];

?>
<style type="text/css">



</style>

<section id="sect-accordion">
    <?php if ( $query->have_posts() ): ?>
    <div class="container">

      <!--  <div class="accordion-option">
            <a href="javascript:void(0)" class="toggle-accordion active" accordion-id="#accordion"></a>
        </div>-->
        <div class="clearfix"></div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



        <?php while ( $query->have_posts() ): ?>

            <?php   $query->the_post(); ?>

                    <?php

                    /**
                     * Faq
                     * $REPEATER
                     */
                    $faqs = get_field('faq', get_the_ID());


                    ?>

                    <?php $i=1; foreach ($faqs as $faq): ?>

                    <?php

                    /**
                     *  Question
                     * $GROUP
                     */
                    $question =$faq['question'];

                    /**
                     * Titre
                     * $string
                     */
                    $titre = $question['titre'];

                    /**
                     * Description
                     * $string
                     */
                    $description = $question['description'];


                    ?>


                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne_<?php echo $i ?>">
                                <h4 class="panel-title">
                                    <a <?php if($i == 1):?><?php else: ?>class="collapsed"<?php endif; ?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne_<?php echo $i ?>" aria-expanded="<?php if($i == 1):?>true<?php else: ?>false<?php endif; ?>" aria-controls="collapseOne">
                                        <?php echo $titre  ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne_<?php echo $i ?>" class="panel-collapse collapse in <?php if($i == 1):?>show<?php else: ?>collapse<?php endif; ?>" role="tabpanel" aria-labelledby="headingOne_<?php echo $i ?>">
                                <div class="panel-body">
                                    <?php echo  $description  ?>
                                </div>
                            </div>
                        </div>

                    <?php $i++; endforeach; ?>



        <?php   endwhile;

        // Restore original post data.
        wp_reset_postdata();?>

        </div>

    </div>
    <?php   endif; ?>

</section>
<script type="text/javascript">
    !function ($) {

        "use strict";


        $(document).ready(function() {

            $(".toggle-accordion").on("click", function() {
                var accordionId = $(this).attr("accordion-id"),
                    numPanelOpen = $(accordionId + ' .collapse.in').length;

                $(this).toggleClass("active");

                if (numPanelOpen == 0) {
                    openAllPanels(accordionId);
                } else {
                    closeAllPanels(accordionId);
                }
            });

           const openAllPanels = function(aId) {
                console.log("setAllPanelOpen");
                $(aId + ' .panel-collapse:not(".in")').collapse('show');
            };
            const  closeAllPanels = function(aId) {
                console.log("setAllPanelclose");
                $(aId + ' .panel-collapse.in').collapse('hide');
            };

        });


    }(jQuery);
</script>