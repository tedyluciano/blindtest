<?php

namespace App\Methode;


use Timber\Menu;
use \Timber\Timber;
use \Timber\Term;
use \WP_Query;


class Shortcodes
{

    private $menPge = [];


    public function __construct() {

        add_shortcode('getPostHome', array($this, 'getPostHome'));
        add_shortcode('post-footer', array($this, 'getPostFooter'));
        add_shortcode('mentions', array($this, 'mentionsLegales'));
        add_shortcode('listePages', array($this, 'listePages'));
        add_shortcode('theTitle', array($this, 'theTitle'));
        add_shortcode('iconBox', array($this, 'iconBox'));
        add_shortcode('articlesHome', array($this, 'articlesHome'));
        add_shortcode('itemService', array($this, 'itemService'));
        add_shortcode('tabsPage', array($this, 'tabsPage'));
        add_shortcode('getPage', array($this, 'getPage'));
        add_shortcode('titlePage', array($this, 'titlePage'));
        add_shortcode('tabspge', array($this, 'tabspge'));
        add_shortcode('actuByCats', array($this, 'actuByCats'));
        add_shortcode('theSection', array($this, 'theSection'));
        add_shortcode('offre', array($this, 'offre'));
        add_shortcode('accordion', array($this, 'accordion'));
        add_shortcode('dropDownMenuPage', array($this, 'dropDownMenuPage'));

    }

    function getPage( $atts = [], $content = null ) {


        $param = shortcode_atts( array(
            'id_page' => '',
        ), $atts );


        $id_page = $param['id_page'];
        $id_pages = explode(',', $id_page);
        $countElem = count($id_pages);


        $tableauId = [];
        $i = 0;
        foreach ($id_pages as $id_page):

            $tableauId[$i] = (int)$id_page;

            $i++;
        endforeach;

        $context['options'] = get_fields('option');

        $posts = Timber::get_posts($tableauId);
        $context = Timber::context(); // returns wp favorites!
        $context['posts'] = $posts;
        Timber::render('/framework/shortcodes/page.twig', $context);

    }

    function getPostFooter() {

        $postFooter = [];

        $the_query = new WP_Query(
            array(
                'posts_per_page' => 3,
                'orderby'        => 'post_date',
                'order'          => 'DESC'
            )
        );

        $i = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();

                global $post;
                $postFooter[$i]['title'] = get_the_title($post);
                $postFooter[$i]['date'] = get_the_date();
                $postFooter[$i]['image'] = get_the_post_thumbnail_url($post);

                $i++; endwhile;
            wp_reset_postdata();
        endif;

        return Timber::compile('/framework/shortcodes/postfooter.twig', array(
            'postFooter' => $postFooter,
        ));
    }

    function mentionsLegales(){

        return Timber::compile('/mentions/mentions.twig');

    }

    function listePages(){
        return Timber::compile('/liste-page/liste-page.twig');
    }

    function theTitle ( $atts = [], $content = null ){



        $param = shortcode_atts( array(
            'title' => '',
        ), $atts );

        $title = $param['title'];





        return Timber::compile('/framework/shortcodes/theTitle.twig',[
            'titre' => $title
        ]);

    }


    function theSection( $atts = [], $content = null ){



        $param = shortcode_atts( array(
            'title' => '',
        ), $atts );

        $title = $param['title'];





        return Timber::compile('/framework/shortcodes/theSection.twig',[
            'titre' => $title
        ]);

    }


    function iconBox(){
        return Timber::compile('/framework/shortcodes/iconBox.twig',[
            'titre' => 'iconBox'
        ]);
    }


    function actuByCats($atts = [], $content = null ){

        $param = shortcode_atts( array(
            'id_post' => '',
            'cats' => '',
            'all' => '0'
        ), $atts );

        //$id_post = $param['id_post'];
        $cats = $param['cats'];
        $all = $param['all'];






        $cats = explode(',', $cats);
        $countElem = count($cats);


        $args = [];
        $posts_per_page = 0;
        $paged = 0;

        if($all == '0'):

            $posts_per_page = 3;


        elseif ($all == '1'):

            $posts_per_page = -1;


            global $paged;
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;




        endif;




        if($countElem == 1):

            $IDcatsOne = $cats[0];


            $args = [
                'posts_per_page' => $posts_per_page,
                'post_type' => 'post',
                'cat' => array((int)$IDcatsOne),
                'orderby' => 'date',
                'order' => 'ASC',
                'paged' => $paged
            ];

            elseif($countElem > 1):

                $IDcatsMultiple = implode(",", $cats);

                $args = [
                    'posts_per_page' => $posts_per_page,
                    'cat' => array($IDcatsMultiple),
                    'orderby' => 'date',
                    'order' => 'ASC'
                ];

                endif;



        $posts = Timber::get_posts($args);




        $big = 999999999;

        /*$pag = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $posts->max_num_pages
        ) );*/


        $context = Timber::context(); // returns wp favorites!
        $context['articles'] = $posts;
       // $context['pag'] = $pag;


        Timber::render('/framework/shortcodes/actuByCats.twig', $context);
    }


    function articlesHome(){
        $article = [];
        $the_query = new WP_Query(
            array(

                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'post_status' => 'publish'
            )
        );

        $i = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();

                global $post;
                $article[$i]['title'] = get_the_title($post);
                $article[$i]['link'] = get_permalink($post->ID);
                $article[$i]['content'] = get_the_content();
                $article[$i]['image'] = get_the_post_thumbnail_url($post);

                $date = date_i18n( 'F j, Y' );

                $article[$i]['date_jour'] = get_the_date('j', $post);
                $article[$i]['date_mois'] = get_the_date('M', $post);
                $article[$i]['date_annee'] = get_the_date('Y', $post);

                $i++; endwhile;
            wp_reset_postdata();
        endif;


        return Timber::compile('/framework/shortcodes/articlesHome.twig', [
            'articles' => $article
        ]);
    }


    function tabsPage( $atts = [] ){


        $param = shortcode_atts( array(
            'id_page' => '',
            'conteneur' => 'menu'
        ), $atts );

        $conteneur = $param['conteneur'];
        $id_page = $param['id_page'];
        $id_pages = explode(',', $id_page);
        $countElem = count($id_pages);

        $comma = implode(",", $id_pages);


        $tableauId = [];
        $i = 0;
        foreach ($id_pages as $id_page):

            $tableauId[$i] = (int)$id_page;

            $i++;
        endforeach;

        $page = [];
        $the_query = new WP_Query(
            array(
                'post_type' => 'page',//it is a Page right?
                'post_status' => 'publish',
                'post__in' => $tableauId,
                'orderby'        => 'date',
                'order'          => 'ASC'
            )
        );

        $j = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();

                global $post;
                $page[$j]['title'] = get_the_title($post);
                $page[$j]['permalink'] = get_the_permalink($post);
                $page[$j]['the_ID'] = $post->ID;
                $page[$j]['id_title'] = strtolower(preg_replace(array( '#[z]+#', '#[^A-Za-z0-9]+#' ), array( "'", '' ), str_replace("'", " ", $this->replaceSpecialChar(get_the_title($post)))));



                $j++; endwhile;
            wp_reset_postdata();
        endif;

        $context['options'] = get_fields('option');
        $context['pages'] = $page;
        $context['titre'] = 'tabsPage';
        $context['tableauId'] = $comma;
        $context['conteneur'] = $conteneur;


        /*return Timber::compile('/framework/shortcodes/tabsPage.twig',[
            'pages' => $page,
            'titre' => 'tabsPage'
        ]);*/

        Timber::render('/framework/shortcodes/tabsPage.twig', $context);
    }

    function dropDownMenuPage( $atts = [] ){

        $param = shortcode_atts( array(
            'id_page' => '',
            'conteneur' => 'menu_mobile'
        ), $atts );

        $conteneur = $param['conteneur'];
        $id_page = $param['id_page'];
        $id_pages = explode(',', $id_page);
        $countElem = count($id_pages);

        $comma = implode(",", $id_pages);


        $tableauId = [];
        $i = 0;
        foreach ($id_pages as $id_page):

            $tableauId[$i] = (int)$id_page;

            $i++;
        endforeach;

        $page = [];
        $the_query = new WP_Query(
            array(
                'post_type' => 'page',//it is a Page right?
                'post_status' => 'publish',
                'post__in' => $tableauId,
                'orderby'        => 'date',
                'order'          => 'ASC'
            )
        );

        $j = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();

                global $post;
                $page[$j]['title'] = str_replace('<br>', "", get_the_title($post));
                $page[$j]['permalink'] = get_the_permalink($post);
                $page[$j]['the_ID'] = $post->ID;
                $page[$j]['id_title'] = strtolower(preg_replace(array( '#[z]+#', '#[^A-Za-z0-9]+#' ), array( "'", '' ), str_replace("'", " ", $this->replaceSpecialChar(get_the_title($post)))));



                $j++; endwhile;
            wp_reset_postdata();
        endif;

        $context = Timber::context(); // returns wp favorites!
        $context['page'] = $page;
        Timber::render('/framework/shortcodes/dropDownMenuPage.twig', $context);

    }

    function itemService(){

        $structures = [];
        $the_query = new WP_Query(
            array(
                'post_type' => 'structures',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'post_status' => 'publish'
            )
        );

        $i = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();

               /* global $post;
                $structures[$i]['title'] = get_the_title(get_the_ID());
                $structures[$i]['link'] = get_permalink(get_the_ID());
                $structures[$i]['content'] = get_the_content();
                $structures[$i]['image'] = get_the_post_thumbnail_url(get_the_ID());*/
                $structures[$i]['titre'] = get_field('titre', get_the_ID());
                $structures[$i]['sous-titre'] = get_field('sous-titre', get_the_ID());
                $structures[$i]['image_'] = get_field('image_', get_the_ID());
                $structures[$i]['couleur'] = get_field('couleur', get_the_ID());
                $structures[$i]['lien'] = get_field('lien', get_the_ID());



                /*$date = date_i18n( 'F j, Y' );

                $article[$i]['date_jour'] = get_the_date('j', $post);
                $article[$i]['date_mois'] = get_the_date('M', $post);
                $article[$i]['date_annee'] = get_the_date('Y', $post);*/

                $i++; endwhile;
            wp_reset_postdata();
        endif;



        return Timber::compile('/framework/shortcodes/itemService.twig', [
            'structures' => $structures
        ]);
    }

    function villeoffres(){

        $args = [
            'post_type'      => 'offres',
            'posts_per_page' =>    -1,
            'post_status'    => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        ];

        $villes = [];

        $the_query = new WP_Query($args);
        $i = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                global $post;

                $ville = get_field('lieu');

                $villes[$i] = $ville;

                $i++; endwhile;
            wp_reset_postdata();
        endif;

        return $villes;

    }

    function accordion($atts = [], $content = null){


        $param = shortcode_atts( array(
            'content' => ''
        ), $atts );

        $contt = $param['content'];

        $context = Timber::context(); // returns wp favorites!
        $context['content'] = $contt;
        Timber::render('/framework/shortcodes/accordion.twig', $context);

    }

    function offre(){

        $taxonomyList = array();
        $taxItem = array();
        $TaxArray = array();
        $metaList = array();
        $metaItem = array();
        $MetaArray = array();

        $ArrSearch = array();
        $StrSearch = "";
        $keyword = null;
        $events_lieux = null;
        $events_date = null;


        $args = [];

        if( isset($_POST['submit'] ) ):
            foreach($_POST as $key => $value):







                // Pour la taxonomie category
                if($value != '' && in_array($key, array('category'))){









                    $i = 0;
                    foreach($value as $item):



                        $term_tax = get_term_by( 'id', (int)$item, $key);

                        $taxItem['terms'][$i] = htmlspecialchars((int)$term_tax->term_id);
                        $ArrSearch[] = $term_tax->name;

                        $i++;
                    endforeach;
                    $taxItem['taxonomy'] = 'category';
                    $taxItem['field'] = 'id';
                    $taxonomyList[] = $taxItem;


                }

                // Rechercher par mots clés
                if($value != '' && in_array($key, array('title'))) {

                    $keyword = htmlspecialchars($value);
                    $ArrSearch[] = $value;

                }

                // Pour la meta avec =
                if($value != '' && in_array($key, array('location'))) {



                    $metaItem['key'] = 'lieu';
                    if(htmlspecialchars($value) != 'all'):
                        $metaItem['value'] =  htmlspecialchars($value);
                    else:

                    endif;
                    $metaItem['compare'] = '=';
                    $metaList[] = $metaItem;

                }


            endforeach;


            //Mise en forme des critères de recherche
            $StrSearch = implode(' - ', $ArrSearch);


            if(count($taxonomyList) > 0){
                $TaxArray = array_merge(array('relation' => 'AND'), $taxonomyList);
            }
            else{
                $catergory_offre = get_term_children(14, 'category');
                foreach ($catergory_offre as $child){
                    $term_tax = get_term_by( 'id', $child, 'category' );
                    $taxItem['taxonomy'] = htmlspecialchars('category');
                    $taxItem['terms'] = htmlspecialchars($term_tax->slug);
                    $taxItem['field'] = 'slug';
                    $taxonomyList[] = $taxItem;
                }

                $TaxArray = array_merge(array('relation' => 'OR'), $taxonomyList);
            }




            if(count($metaList) > 0){
                $MetaArray = array_merge(array('relation' => 'AND'), $metaList);
            };




        endif;

        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

        $args = [
            'post_type'      => 'offres',
            'posts_per_page' =>    9,
            'post_status'    => 'publish',
            'tax_query'      => $TaxArray,
            'meta_query'     => $MetaArray,
            'paged' => $paged,
            's'=> $keyword,
            'orderby' => 'date',
            'order' => 'DESC'
        ];


        $the_query = new WP_Query($args);



        $context = Timber::context(); // returns wp favorites!

        $context['argspgt'] = array(
            'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $the_query->max_num_pages
        );

       /* echo '<pre>';
            var_dump($_POST);
        echo '</pre>';*/

        $ville = isset($_POST["location"]) ? $_POST["location"] : null;

        $getLocation= json_encode($ville);

        $posts = Timber::get_posts($args);
        $context['location'] = $getLocation;
        $context['resultCount'] = count($posts);
        $context['taxonomyList'] = $taxonomyList;
       // $context['getPosted'] = $getPosted;
        $context['villes'] = $this->villeoffres();
        $context['articles'] = $posts;
        $context['terms'] = get_term_children(14, 'category');
        Timber::render('/framework/shortcodes/offres_emploi.twig', $context);
    }

    public function arrayUnset($array, $key)
    {
        unset($array[$key]);

        return $array;
    }

    function replaceSpecialChar($str) {
        $ch0 = array(
            "œ"=>"oe",
            "Œ"=>"OE",
            "æ"=>"ae",
            "Æ"=>"AE",
            "À" => "A",
            "Á" => "A",
            "Â" => "A",
            "à" => "A",
            "Ä" => "A",
            "Å" => "A",
            "&#256;" => "A",
            "&#258;" => "A",
            "&#461;" => "A",
            "&#7840;" => "A",
            "&#7842;" => "A",
            "&#7844;" => "A",
            "&#7846;" => "A",
            "&#7848;" => "A",
            "&#7850;" => "A",
            "&#7852;" => "A",
            "&#7854;" => "A",
            "&#7856;" => "A",
            "&#7858;" => "A",
            "&#7860;" => "A",
            "&#7862;" => "A",
            "&#506;" => "A",
            "&#260;" => "A",
            "à" => "a",
            "á" => "a",
            "â" => "a",
            "à" => "a",
            "ä" => "a",
            "å" => "a",
            "&#257;" => "a",
            "&#259;" => "a",
            "&#462;" => "a",
            "&#7841;" => "a",
            "&#7843;" => "a",
            "&#7845;" => "a",
            "&#7847;" => "a",
            "&#7849;" => "a",
            "&#7851;" => "a",
            "&#7853;" => "a",
            "&#7855;" => "a",
            "&#7857;" => "a",
            "&#7859;" => "a",
            "&#7861;" => "a",
            "&#7863;" => "a",
            "&#507;" => "a",
            "&#261;" => "a",
            "Ç" => "C",
            "&#262;" => "C",
            "&#264;" => "C",
            "&#266;" => "C",
            "&#268;" => "C",
            "ç" => "c",
            "&#263;" => "c",
            "&#265;" => "c",
            "&#267;" => "c",
            "&#269;" => "c",
            "Ð" => "D",
            "&#270;" => "D",
            "&#272;" => "D",
            "&#271;" => "d",
            "&#273;" => "d",
            "È" => "E",
            "É" => "E",
            "Ê" => "E",
            "Ë" => "E",
            "&#274;" => "E",
            "&#276;" => "E",
            "&#278;" => "E",
            "&#280;" => "E",
            "&#282;" => "E",
            "&#7864;" => "E",
            "&#7866;" => "E",
            "&#7868;" => "E",
            "&#7870;" => "E",
            "&#7872;" => "E",
            "&#7874;" => "E",
            "&#7876;" => "E",
            "&#7878;" => "E",
            "è" => "e",
            "é" => "e",
            "ê" => "e",
            "ë" => "e",
            "&#275;" => "e",
            "&#277;" => "e",
            "&#279;" => "e",
            "&#281;" => "e",
            "&#283;" => "e",
            "&#7865;" => "e",
            "&#7867;" => "e",
            "&#7869;" => "e",
            "&#7871;" => "e",
            "&#7873;" => "e",
            "&#7875;" => "e",
            "&#7877;" => "e",
            "&#7879;" => "e",
            "&#284;" => "G",
            "&#286;" => "G",
            "&#288;" => "G",
            "&#290;" => "G",
            "&#285;" => "g",
            "&#287;" => "g",
            "&#289;" => "g",
            "&#291;" => "g",
            "&#292;" => "H",
            "&#294;" => "H",
            "&#293;" => "h",
            "&#295;" => "h",
            "Ì" => "I",
            "Í" => "I",
            "Î" => "I",
            "Ï" => "I",
            "&#296;" => "I",
            "&#298;" => "I",
            "&#300;" => "I",
            "&#302;" => "I",
            "&#304;" => "I",
            "&#463;" => "I",
            "&#7880;" => "I",
            "&#7882;" => "I",
            "&#308;" => "J",
            "&#309;" => "j",
            "&#310;" => "K",
            "&#311;" => "k",
            "&#313;" => "L",
            "&#315;" => "L",
            "&#317;" => "L",
            "&#319;" => "L",
            "&#321;" => "L",
            "&#314;" => "l",
            "&#316;" => "l",
            "&#318;" => "l",
            "&#320;" => "l",
            "&#322;" => "l",
            "Ñ" => "N",
            "&#323;" => "N",
            "&#325;" => "N",
            "&#327;" => "N",
            "ñ" => "n",
            "&#324;" => "n",
            "&#326;" => "n",
            "&#328;" => "n",
            "&#329;" => "n",
            "Ò" => "O",
            "Ó" => "O",
            "Ô" => "O",
            "Õ" => "O",
            "Ö" => "O",
            "Ø" => "O",
            "&#332;" => "O",
            "&#334;" => "O",
            "&#336;" => "O",
            "&#416;" => "O",
            "&#465;" => "O",
            "&#510;" => "O",
            "&#7884;" => "O",
            "&#7886;" => "O",
            "&#7888;" => "O",
            "&#7890;" => "O",
            "&#7892;" => "O",
            "&#7894;" => "O",
            "&#7896;" => "O",
            "&#7898;" => "O",
            "&#7900;" => "O",
            "&#7902;" => "O",
            "&#7904;" => "O",
            "&#7906;" => "O",
            "ò" => "o",
            "ó" => "o",
            "ô" => "o",
            "õ" => "o",
            "ö" => "o",
            "ø" => "o",
            "&#333;" => "o",
            "&#335;" => "o",
            "&#337;" => "o",
            "&#417;" => "o",
            "&#466;" => "o",
            "&#511;" => "o",
            "&#7885;" => "o",
            "&#7887;" => "o",
            "&#7889;" => "o",
            "&#7891;" => "o",
            "&#7893;" => "o",
            "&#7895;" => "o",
            "&#7897;" => "o",
            "&#7899;" => "o",
            "&#7901;" => "o",
            "&#7903;" => "o",
            "&#7905;" => "o",
            "&#7907;" => "o",
            "ð" => "o",
            "&#340;" => "R",
            "&#342;" => "R",
            "&#344;" => "R",
            "&#341;" => "r",
            "&#343;" => "r",
            "&#345;" => "r",
            "&#346;" => "S",
            "&#348;" => "S",
            "&#350;" => "S",
            "&#347;" => "s",
            "&#349;" => "s",
            "&#351;" => "s",
            "&#354;" => "T",
            "&#356;" => "T",
            "&#358;" => "T",
            "&#355;" => "t",
            "&#357;" => "t",
            "&#359;" => "t",
            "Ù" => "U",
            "Ú" => "U",
            "Û" => "U",
            "Ü" => "U",
            "&#360;" => "U",
            "&#362;" => "U",
            "&#364;" => "U",
            "&#366;" => "U",
            "&#368;" => "U",
            "&#370;" => "U",
            "&#431;" => "U",
            "&#467;" => "U",
            "&#469;" => "U",
            "&#471;" => "U",
            "&#473;" => "U",
            "&#475;" => "U",
            "&#7908;" => "U",
            "&#7910;" => "U",
            "&#7912;" => "U",
            "&#7914;" => "U",
            "&#7916;" => "U",
            "&#7918;" => "U",
            "&#7920;" => "U",
            "ù" => "u",
            "ú" => "u",
            "û" => "u",
            "ü" => "u",
            "&#361;" => "u",
            "&#363;" => "u",
            "&#365;" => "u",
            "&#367;" => "u",
            "&#369;" => "u",
            "&#371;" => "u",
            "&#432;" => "u",
            "&#468;" => "u",
            "&#470;" => "u",
            "&#472;" => "u",
            "&#474;" => "u",
            "&#476;" => "u",
            "&#7909;" => "u",
            "&#7911;" => "u",
            "&#7913;" => "u",
            "&#7915;" => "u",
            "&#7917;" => "u",
            "&#7919;" => "u",
            "&#7921;" => "u",
            "&#372;" => "W",
            "&#7808;" => "W",
            "&#7810;" => "W",
            "&#7812;" => "W",
            "&#373;" => "w",
            "&#7809;" => "w",
            "&#7811;" => "w",
            "&#7813;" => "w",
            "Ý" => "Y",
            "&#374;" => "Y",
            "?" => "Y",
            "&#7922;" => "Y",
            "&#7928;" => "Y",
            "&#7926;" => "Y",
            "&#7924;" => "Y",
            "ý" => "y",
            "ÿ" => "y",
            "&#375;" => "y",
            "&#7929;" => "y",
            "&#7925;" => "y",
            "&#7927;" => "y",
            "&#7923;" => "y",
            "&#377;" => "Z",
            "&#379;" => "Z",
            "'" => ""
        );
        $str = strtr($str,$ch0);
        return $str;
    }


    function titlePage($atts = [], $content = null){

        $param = shortcode_atts( array(
            'titre' => '',
            'color' => '',
        ), $atts );


        $titre = $param['titre'];
        $color = $param['color'];

        return Timber::compile('/framework/shortcodes/titlePage.twig',[
            'titre' => $titre,
            'color' => $color
        ]);

    }

    function tabspge($atts = [], $content = null){


        $param = shortcode_atts( array(
            'id_structure' => '',
            'conteneur' => 'menu'
        ), $atts );

        $structure = (int)$param['id_structure'];
        $conteneur = $param['conteneur'];

        /*$page = [];
        $the_query = new WP_Query(
            array(
                'post_type' => 'structures',
                'post_status' => 'publish',
                'orderby'        => 'date',
                'order'          => 'ASC'
            )
        );

        $i = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();

                $page[$i] = get_the_ID();

                $i++; endwhile;
            wp_reset_postdata();
        endif;*/


        $posts = Timber::get_posts($structure);
        $context = Timber::context(); // returns wp favorites!
        $context['posts'] = $posts;
        $context['conteneur'] = $conteneur;
        Timber::render('/framework/shortcodes/tabspge.twig', $context);

    }



}