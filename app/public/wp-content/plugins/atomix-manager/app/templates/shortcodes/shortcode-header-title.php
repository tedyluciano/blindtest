
<?php //var_dump($args); ?>
<style type="text/css">

    #sect-header {
        -ms-grid-column: 1;
        -ms-grid-row: 3;
        grid-area: title;
        margin-top: 50px;
    }

    #sect-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.3em 2em 1em 2em;
    }

    .top-head {
        margin: 1em 0;
    }

    .top-head .titile-page{
        font-family: Quantico !important;
        text-transform: uppercase;
        color: #353536;
    }

    #sect-header {
        background: #f2f2f2;
    }

</style>

<section id="sect-header">
    <img src="<?php echo esc_url(wp_get_attachment_image_src(3843, 'full')[0]); ?>" width="12%">
    <div class="top-head">
      <h1 class="titile-page"><?= presscore_get_page_title(); ?></h1>
    </div>
    <div class="bottom-head">
        <?= presscore_get_page_title_breadcrumbs(); ?>
    </div>
</section>
