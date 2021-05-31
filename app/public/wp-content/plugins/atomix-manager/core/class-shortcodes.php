<?php

namespace AtomixManager\Core;


use AtomixManager\Core\Views_Shortcodes;
use AtomixManager\Core\Function_Shortcodes;

class Shortcodes extends Views_Shortcodes {


    public static $functionall;

    protected static $_instance = NULL;

    public function __construct() {

        self::$functionall = $GLOBALS['function_Shortcodes'];

        add_shortcode( 'partenaire_single', array( $this, 'partenaire_single') );
        add_shortcode( 'services_home', array( $this, 'shortcode_service_carousel') );
        add_shortcode( 'services_user', array( $this, 'shortcode_service_user') );
        add_shortcode( 'plan_site', array( $this, 'shortcode_plansite') );
        add_shortcode( 'accordion', array( $this, 'shortcode_accordion') );
        add_shortcode( 'tabs', array( $this, 'shortcode_tabs') );
        add_shortcode( 'partenaire', array( $this, 'shortcode_partenaire') );
        add_shortcode( 'etablissements', array( $this, 'shortcode_etablissements') );


    }


    public static function get_instance()
    {
        if ( ! self::$_instance ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }


    /**
     * Get plugin's absolute path.
     *
     * @since    1.0.0
     */
    public static function get_function_all() {
        return isset( self::$functionall ) ? self::$functionall : null;
    }


    public function shortcode_service_carousel(){

        $args = array(
            'post_type' => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status' => 'publish'
        );

        $the_query = new \WP_Query($args);

        $param = [
            'query' => $the_query,
        ];

       return self::render_template('services_home',$param);
    }

    public function shortcode_plansite(){

        return self::render_template('plan_site');
    }

    public function shortcode_partenaire(){

        $args = array(
            'post_type' => 'partenaire',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status' => 'publish'
        );

        $the_query = new \WP_Query($args);

        $param = [
            'query' => $the_query,
        ];

        return self::render_template('partenaire', $param);
    }

    public function shortcode_etablissements(){

        $args = array(
            'post_type' => 'etablissement',
            'posts_per_page' => -1,
            'orderby'        => 'ID',
            'order'          => 'ASC',
            'post_status' => 'publish'
        );

        $the_query = new \WP_Query($args);

        $param = [
            'query' => $the_query,
        ];

        return self::render_template('etablissements', $param);
    }

    public function shortcode_accordion($atts){


        extract(shortcode_atts(array(
            'id_faq' => '',
        ), $atts));

        $id_faq = ( !empty( $atts['id_faq'] ) ? (int)$atts['id_faq'] : '' );


        $args = array(
            'post_type' => 'faqs',
            'p' => $id_faq,
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status' => 'publish'
        );

        /*if(!empty($id_faq)):
            $args['p'] = $id_faq;
        endif;*/

        $the_query = new \WP_Query($args);

        $param = [
            'query' => $the_query,
        ];

        return self::render_template('accordion',$param);
    }
    public function partenaire_single($atts){


        extract(shortcode_atts(array(
            'pics' => '',
            'title' => '',
            'subtitle' => '',
            'description' => '',
        ), $atts));

        $pics = ( !empty( $atts['pics'] ) ? (int)$atts['pics'] : 1112 );
        $title = ( !empty( $atts['title'] ) ? (string)$atts['title'] : '' );
        $subtitle = ( !empty( $atts['subtitle'] ) ? (string)$atts['subtitle'] : '' );
        $description = ( !empty( $atts['description'] ) ? (string)$atts['description'] : '' );

        $image = esc_url(wp_get_attachment_image_src($pics, 'full')[0]);
        $id = bin2hex(random_bytes(5));

        $param = [
            'id' => $id,
            'pics' => $image,
            'title' => $title,
            'subtitle' => $subtitle,
            'description' => $description,
        ];

        return self::render_template('partenaire_single',$param);
    }

    public function shortcode_tabs(){

        $itemAll= [];
        $itemAllAside= [];
        $navTabs = [];

        $args = array(
            'post_type' => 'professionnel',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status' => 'publish'
        );

        $the_query = new \WP_Query($args);

        $i=0;
        if( $the_query->have_posts() ):


            while ( $the_query->have_posts() ):
                $the_query->the_post();

                /****************************************************************************************/

                /**
                 * Item
                 * $repeater
                 */
                $items = get_field('item', get_the_ID());

                /**
                 * Lien_
                 * $string empty
                 */
                $lien_ = '';

                /**
                 * Nav Tabs
                 * $array
                 */
                $navTabs[$i] = get_the_title();

                if(!empty($items)):
                  $j=0;  foreach ($items as $item):


                    /**
                     * Intitule
                     * $group
                     */
                     $intitule =  $item['intitule'];

                     /**
                     * Titre
                     * $string
                     */
                      $titre = $intitule['titre'];

                     /**
                     * Description
                     * $string
                     */
                      $description = $intitule['description'];

                     /**
                      * Button
                      * $group
                      */
                      $boutton = $intitule['boutton'];

                        /**
                         * Titre button
                         * $string
                         */
                       $title_btn = $boutton['titre'];

                        /**
                         * Interne
                         * $boolean
                         */
                       $interne = $boutton['interne'];


                       if($interne == true):
                           /**
                            * Lien input
                            * $string
                            */
                           $lien_ = $boutton['lien_interne'];

                       elseif($interne == false):
                           /**
                            * Lien output
                            * $string
                            */
                           $lien_ = $boutton['lien_externe'];

                       endif;

                        /**
                         * Photo
                         * $string
                         */
                          $photo= $intitule['photo'];

                        $clean = self::get_function_all()->cleanString($titre);
                        $itemAll[$i][$j]['titre']['clean'] = str_replace(' ', '_', strtolower($clean));
                        $itemAll[$i][$j]['titre']['initial'] = $titre;
                        $itemAll[$i][$j]['description'] = $description;
                        $itemAll[$i][$j]['title_btn'] = $title_btn;
                        $itemAll[$i][$j]['lien'] = $lien_;
                        $itemAll[$i][$j]['photo'] = $photo;

                        $itemAllAside[$i][$j]['title']['clean'] = str_replace(' ', '_', strtolower($clean));
                        $itemAllAside[$i][$j]['title']['initial'] = $titre;

                  $j++;  endforeach;
                endif;



                $i++;
            endwhile;
            wp_reset_postdata();

        endif;




        $param = [
            'nav_tabs' => $navTabs,
            'itemAll' => $itemAll,
            'itemAllAside' => $itemAllAside,
        ];


        return self::render_template('tabs',$param);
    }

    public function shortcode_service_user(){

        $args = array(
            'post_type' => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status' => 'publish'
        );

        $the_query = new \WP_Query($args);

        $param = [
            'query' => $the_query,
        ];

        return self::render_template('service_user',$param);
    }




}