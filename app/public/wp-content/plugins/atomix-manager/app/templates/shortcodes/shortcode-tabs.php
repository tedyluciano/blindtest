
<?php //var_dump($args);


$nav_tabs = $args['nav_tabs'];
$itemAlls = $args['itemAll'];
$itemAllAsides = $args['itemAllAside'];




?>
<style type="text/css">



</style>

<section id="sect-tabs" class="mt-tabs">
    <div class="tabs tabs-style-iconbox">
        <nav>
            <ul>
                <?php foreach ($nav_tabs as $nav_tab): ?>
                    <li>
                        <a href="#section-iconbox-1" class="list-icon-title">
                            <img class="tabs_icon" src="https://clinika.modeltheme.com/wp-content/uploads/2021/02/covid-vaccine-icon-500x500.png" alt="tabs-image">
                            <h5 class="tab-title"><?php echo $nav_tab ?></h5>
                        </a>
                    </li>
                <?php endforeach; ?>

              <!--  <li>
                    <a href="#section-iconbox-2" class="list-icon-title">
                        <img class="tabs_icon" src="https://clinika.modeltheme.com/wp-content/uploads/2021/02/covid-vaccine-icon-500x500.png" alt="tabs-image">
                        <h5 class="tab-title">En exercice libéral</h5>
                    </a>
                </li>
                <li>
                    <a href="#section-iconbox-3" class="list-icon-title">
                        <img class="tabs_icon" src="https://clinika.modeltheme.com/wp-content/uploads/2021/02/covid-vaccine-icon-500x500.png" alt="tabs-image">
                        <h5 class="tab-title">Autres</h5>
                    </a>
                </li>-->
            </ul>
        </nav>
        <div class="content-wrap">

            <?php $i=1; foreach ($nav_tabs as $key1 => $nav_tab): ?>
                <section id="section-iconbox-1">

                    <div class="content">
                        <div class="row">
                            <aside class="col-md-4">
                                <div class="widget js-sticky-widget">
                                    <?php if(isset($itemAllAsides) && !empty($itemAllAsides)): ?>
                                    <?php $l=0; foreach ($itemAllAsides as $key4 => $itemAllAside): ?>
                                        <?php if($key4 == $key1): ?>
                                            <?php $m=0; foreach ($itemAllAside as $key5 => $res): ?>
                                                <a href="#<?php echo $res['title']['clean'] ?>"><?php echo $res['title']['initial'] ?></a>
                                            <?php $m++; endforeach; ?>
                                        <?php endif; ?>
                                     <?php $l++; endforeach; ?>
                                     <?php endif; ?>
                                </div>
                                <div class="widget">
                                   <!-- <div class="info-block">
                                        <h5>Lorem</h5>
                                        <div class="cont-info">
                                            <ul>
                                                <li>Lorem ipsum sit amet pharetra magna</li>
                                                <li>Lorem ipsum sit amet pharetra magna sit amet pharetra magna</li>
                                                <li>Lorem ipsum sit amet pharet</li>
                                                <li>Lorem ipsum sit amet pharet sit amet pharetra magna
                                                    sit amet pharetra magna</li>
                                            </ul>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="widget"></div>
                            </aside>
                            <main class="col-md-8">


                            <?php $j=0; foreach ($itemAlls as $key2 => $itemAll): ?>

                                <?php if($key2 == $key1): ?>


                                    <?php $k=0; foreach ($itemAll as $key3 => $result): ?>

                                        <article id="<?php echo $result['titre']['clean'] ?>" class="animated <?php if ($k % 2 == 0): ?>fadeInLeft even <?php else: ?>fadeInRight odd <?php endif; ?>">
                                            <div class="body-content">
                                                <div class="row">
                                                    <?php $image = esc_url(wp_get_attachment_image_src($result['photo'], 'full')[0]); ?>
                                                    <div class="col-md-4 mp" style="background: url(<?php echo $image ?>)no-repeat center;background-size: cover">
                                                    </div>
                                                    <div class="col-md-8 mp">
                                                        <h4><?php echo $result['titre']['initial'] ?></h4>
                                                         <p><?php echo $result['description'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>


                                        <?php $k++; endforeach; ?>


                                <?php endif; ?>



                                <?php $i++; endforeach; ?>


                            <!--    <article id="medico-social">
                                    <div class="body-content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Médico-social</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.it amet pharetra magna.
                                                    Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                    nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="<?php echo $image ?>">
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article id="sanitaireetmedicosocial">
                                    <div class="body-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="<?php echo $image ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <h4>Sanitaire et médico-social</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet pharetra magna.
                                                    Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                    nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>-->
                            </main>
                        </div>
                    </div>

                </section>
            <?php $i++; endforeach; ?>

          <!--  <section id="section-iconbox-1">

                <div class="content">
                    <div class="row">
                        <aside class="col-md-4">
                            <div class="widget js-sticky-widget">
                                <a href="#sanitaire">Sanitaire</a>
                                <a href="#medico-social">Médico-social</a>
                                <a href="#sanitaireetmedicosocial">Sanitaire et médico-social</a>
                            </div>
                            <div class="widget">
                                <div class="info-block">
                                    <h5>Lorem</h5>
                                    <div class="cont-info">
                                        <ul>
                                            <li>Lorem ipsum sit amet pharetra magna</li>
                                            <li>Lorem ipsum sit amet pharetra magna sit amet pharetra magna</li>
                                            <li>Lorem ipsum sit amet pharet</li>
                                            <li>Lorem ipsum sit amet pharet sit amet pharetra magna
                                                sit amet pharetra magna</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="widget"></div>
                        </aside>
                        <main class="col-md-8">
                            <article id="sanitaire" class="animated fadeInLeft">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Sanitaire</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article id="medico-social">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4>Médico-social</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.it amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article id="sanitaireetmedicosocial">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Sanitaire et médico-social</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </main>
                    </div>
                </div>

            </section>

            <section id="section-iconbox-2">

                <div class="content">
                    <div class="row">
                        <aside class="col-md-4">
                            <div class="widget js-sticky-widget">
                                <a href="#medecintraitant">Médecin traitant</a>
                                <a href="#medecinspecialiste">Médecin spécialiste</a>
                                <a href="#infirmier">Infirmier</a>
                                <a href="#kinesitherapeute">Kinésithérapeute</a>
                                <a href="#pharmacien">Pharmacien</a>
                                <a href="#autre">Autre</a>
                            </div>
                            <div class="widget"></div>
                            <div class="widget"></div>
                        </aside>
                        <main class="col-md-8">
                            <article id="medecintraitant">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Médecin traitant</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article id="medecinspecialiste">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4>Médecin spécialiste</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.it amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article id="infirmier">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Infirmier</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article id="kinesitherapeute">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4>Kinésithérapeute</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.it amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article id="pharmacien">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Pharmacien</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article id="autre">
                                <div class="body-content">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4>Autre</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.it amet pharetra magna.
                                                Donec rhoncus dolor id dolor malesuada, rutrum vulputate metus hendrerit. Curabitur dignissim est nisi,
                                                nec ultrices urna ullamcorper sit amet. Nullam tempor, velit at tincidunt viverra.
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo $image ?>">
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </main>
                    </div>
                </div>

            </section>
            <section id="section-iconbox-3">

                <div class="row">
                    <div class="col-md-6 text-center">
                        <img class="tabs_image" src="https://clinika.modeltheme.com/wp-content/uploads/2021/02/Covid-vaccine.png" alt="tabs-image" />
                    </div>
                    <div class="col-md-6">
                        <h3 class="tabs_title">Covid-19 Vaccine</h3>
                        <p class="tabs_content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non leo nunc. Vivamus lacinia massa nec sem sagittis, quis consequat augue rhoncus. Phasellus varius quam quis ligula congue, eu aliquam eros feugiat. Integer
                            bibendum mauris euismod ex cursus, in facilisis.
                        </p>
                        <a href="https://clinika.modeltheme.com/service/blood-tests/" class="rippler rippler-default button-winona btn btn-lg tabs_button">View Speciality</a>
                    </div>
                </div>

            </section>-->

        </div><!-- /content -->
    </div><!-- /tabs -->
</section>
