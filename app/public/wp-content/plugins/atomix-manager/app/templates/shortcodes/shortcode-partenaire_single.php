
<?php

$id = $args['id'];
$pics = $args['pics'];
$title = $args['title'];
$subtitle = $args['subtitle'];
$description = $args['description'];

?>

<aside id="single_<?php echo $id ?>" class="partenaire-single">

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="user-picture"  style="background:#fff url(<?php echo $pics  ?>)no-repeat center; background-size: contain">
            </div>
            <div class="user-content">
                <h5 class="text-capitalize user-name"><?php echo $title ?></h5>
                <p class=" text-capitalize text-muted small blockquote-footer"><?php echo $subtitle ?></p>
                <div class="small text-muted mb-0" style="text-align: justify"><?php echo $description ?></div>
            </div>
        </div>
    </div>

</aside>
