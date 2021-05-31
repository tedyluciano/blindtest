<?php


namespace AtomixManager\Core;


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use AtomixManager\Inc\Atomix_Manager;



class Function_Shortcodes {


    protected static $_instance = NULL;


    public static function get_instance()
    {
        if ( ! self::$_instance ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function test(){
        return array('id' => '45');
    }

    public function getFirstImg($id){

        $thumb_url = null;
        $thumb_urls = get_the_post_thumbnail_url($id, 'full');

        if($thumb_urls != ''):
            $thumb_url = $thumb_urls;
        else:
            $thumb_url = esc_url(wp_get_attachment_image_src(6962, 'full')[0]);
        endif;

        return $thumb_url;
    }

    public function existValue($key_to_check, $things)
    {
        $return = '';

        if (array_key_exists($key_to_check, $things))
            $return = $things[$key_to_check];


        if( empty( $return ) )
            return false;


        return $return;
    }

    public function search($value, $array)
    {
        return(array_search($value, $array));
    }

    public function get_request_parameter( $key, $default = '' ) {
        // If not request set
        if ( ! isset( $_REQUEST[ $key ] ) || empty( $_REQUEST[ $key ] ) ) {
            return $default;
        }
        // Set so process it
        return strip_tags( (string) wp_unslash( $_REQUEST[ $key ] ) );
    }

    public function get_load_listing($prodId = null, $posttype)
    {



        $args = array(
            'posts_per_page' => 1,
            'p' => $prodId,
            'post_status' => 'publish'
        );
        if($posttype == 'activite'):
            $args['post_type'] = 'activite';
           /* $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_type',
                    'field'    => 'slug',
                    'terms'    => array( 'listing_package')
                )
            );*/
        elseif ($posttype == 'decouvertes'):
            $args['post_type'] = 'decouvertes';
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'decouvertes',
                    'field'    => 'slug',
                    'terms'    => array()
                )
            );
        endif;


        /*$args = array(
            'post_type' => 'product',
            'posts_per_page' => 1,
            'p' => $prodId,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status' => 'publish',
            'tax_query'  => array(
                array(
                    'taxonomy' => 'product_type',
                    'field'    => 'slug',
                    'terms'    => array( 'listing_package')
                )
            )
        );*/


        $the_query = new \WP_Query($args);
        //$the_query = get_posts( $args );

        $results = [];

        if ( $the_query->have_posts() ) :


            $counter = 0;
            while ( $the_query->have_posts() ) : $the_query->the_post();


                /****************************************************************************************/
                $product = wc_get_product( get_post()->ID );

                /**
                 * Location
                 * $group
                 */
                $location = get_field('location', get_the_ID());
                $latitude = $location["latitude"];
                $longitude = $location["longitude"];


                /**
                 * Info
                 * $group
                 */
                $info= get_field('info', get_the_ID());
                $titre = $info["titre"];
                $sous_titre = $info["sous-titre"];
                $adresse = $info["adresse"];
                $description = $info["description"];

                /**
                 * Contact
                 * $group
                 */
                $contact_ = get_field('contact_', get_the_ID());
                $telephone = $contact_["telephone"];
                $e_mail = $contact_["e-mail"];
                $site_web = $contact_["site_web"];
                $reseaux_sociaux = $contact_["reseaux_sociaux"];

                /**
                 * Gallery
                 * $repeater
                 */
                $gallery = get_field('gallery', get_the_ID());
                $photo = $gallery["photo"];

                /**
                 * Tarif regulier
                 * $repeater
                 */
                $tarif_regulier = get_field('tarif_regulier', get_the_ID());
                $prix_reguliers = $tarif_regulier["prix_regulier"];


                $image2 = '';

                if($posttype == 'product'):
                    $id = $product->image_id;
                    $image2 = esc_url(wp_get_attachment_image_src($id, 'full')[0]);
                else:
                    $image2 = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' )[0];
                endif;


                $results['latitude'] = $latitude;
                $results['longitude'] = $longitude;
                $results['title'] = get_the_title(get_the_ID());
                $results['title_br'] = $titre;
                $results['subtitle'] = $sous_titre;
                $results['description'] = $description;
                $results['adresse'] = $adresse;
                $results['phone'] = $telephone;
                $results['mail'] = $e_mail;
                $results['site_web'] = $site_web;
                $results['social_share'] = $reseaux_sociaux;
                $results['gallery'] = $photo;
                $results['price_regular'] = $prix_reguliers;
                $results['picture'] = $image2;


                $counter++;
            endwhile;
            // Restore original post data.
            wp_reset_postdata();
        endif;


        return $results;


    }


    public function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public function cleanString($text) {
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'a',
            '/[ÁÀÂÃÄ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºö]/u'   =>   'o',
            '/[ÓÒÔÕÖ]/u'    =>   'O',
            '/[úùûü]/u'     =>   'u',
            '/[ÚÙÛÜ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
            '/[“”«»„]/u'    =>   ' ', // Double quote
            '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
        );
        return str_replace("'", '',preg_replace(array_keys($utf8), array_values($utf8), $text));
    }

}


