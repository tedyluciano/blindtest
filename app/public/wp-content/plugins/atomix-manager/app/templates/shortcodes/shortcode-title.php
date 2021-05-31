
<?php //var_dump($args); ?>
<style type="text/css">

    #sect-title .title h2.<?= $args['class'] ?> span:nth-child(<?= $args['pst'] ?>) {
        color: rgba(0, 194, 251, 1);
    }

    #sect-title .title h2.<?= $args['class'] ?> {
        text-align: <?= $args['align'] ?>;

        <? if($args['size_h2'] != ''): ?>
            font-size: <?= $args['size_h2'] ?>;
        <? endif; ?>
    }
/*
    #sect-title .title h3.<?= $args['class'] ?> span:nth-child(<?= $args['pst'] ?>) {
        color: rgba(0, 194, 251, 1);
    }

    #sect-title .title h3.<?= $args['class'] ?> {
        text-align: <?= $args['align'] ?>;

        <? if($args['size_h3'] != ''): ?>
            font-size: <?= $args['size_h3'] ?>;
        <? endif; ?>
    }
*/
    #sect-title .subtitle h5.<?= $args['class'] ?> {
        text-align: <?= $args['align'] ?>;
        <? if($args['size_h5'] != ''): ?>
            font-size: <?= $args['size_h5'] ?>;
        <? endif; ?>
    }


    /*#sect-title .subtitle, #sect-title .title {
        text-align: center;
    }*/

</style>

<section id="sect-title">
    <div class="subtitle"><h5 class="<?= $args['class'] ?>"><?= $args['subtitle'] ?></h5></div>
    <div class="title">
        <? if($args['size_h2'] != ''): ?>
            <h2 class="<?= $args['class'] ?>">

                <?php if ( $args['title_part_before_bleu'] != '' ) { ?>

            <span class="spt_"><?= $args['title_part_before_bleu'] ?><span class="spt_ bleu"><?= $args['title_part_milieu_bleu'] ?></span> <?= $args['title_part_after_bleu'] ?></span>

                <?php } else {?>
                    <span class="spt_"><?= $args['title_part1'] ?> </span><span class="spt_ bleu"><?= $args['bleu'] ?></span>
                    <?php if($args['br_pos'] == 1):?><br><?php endif;?>
                    <span class="spt_"><?= $args['title_part2'] ?></span>
                    <?php if($args['br_pos'] == 2):?><br><?php endif;?>
                    <span class="spt_"><?= $args['title_part3'] ?></span>
            <?php } ?>
            </h2>
        <? endif; ?>

        <? /* if($args['size_h3'] != ''): ?>  
            <h3 class="<?= $args['class'] ?>">
                <span class="spt_"><?= $args['title_part1'] ?></span>
                <?php if($args['br_pos'] == 1):?><br><?php endif;?>
                <span class="spt_"><?= $args['title_part2'] ?></span>
                <?php if($args['br_pos'] == 2):?><br><?php endif;?>
                <span class="spt_"><?= $args['title_part3'] ?></span>
            </h3>
        <? endif; */ ?>

    </div>
</section>
