<?php
require_once(__DIR__ . '/vendor/autoload.php');

if (!defined('URL_PATH'))
if (!defined('RELATIF_PATH'))
if (!defined('FRAMWORKS_DIR'))


define('URL_PATH', get_template_directory_uri()); /*     'http://verdura.local/wp-content/themes/verduraonepage'  */
define('RELATIF_PATH', get_template_directory()); /*    '/app/public/wp-content/themes/verduraonepage'             */

/* Charge dossier fichier physique */
define('FRAMWORKS_DIR', ABSPATH.'wp-content/themes/Sillons/frameworks/'); /*           '/app/public/wp-content/themes/verduraonepage/frameworks/'      */
define('TEM_DIR', ABSPATH.'wp-content/themes/Sillons/app/Methode/template/'); /*      '/app/public/wp-content/themes/verduraonepage/frameworks/'       */


$timber = new \Timber\Timber();
$main = new App\Main\ThemeSite();
$shortcodes = new App\Methode\Shortcodes();

$timber::$locations = array(ABSPATH.'/wp-content/themes/Sillons/app/Resources/view/', ABSPATH.'/wp-content/themes/Sillons/views');

function isBodyClass($classToSearchFor) {
    $classes = get_body_class();

    return in_array($classToSearchFor, $classes);
}
/*add_filter('timber/twig', 'add_to_twig');
function add_to_twig($twig) {
    /* this is where you can add your own functions to twig */
    /*$twig->addExtension(new Twig_Extension_StringLoader());
    $twig->addFilter(new Twig_SimpleFilter('arrayUnique', 'arrayUnique'));
    return $twig;
}*/


function sillonsBreadcrumbs() {

    $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '<i class="fas fa-chevron-right"></i>'; // delimiter between crumbs
    //$home = esc_html__('<i class="fas fa-home"></i>', 'odas 57'); // text for the 'Home' link
    $home = '<i class="fas fa-home"></i>';
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = home_url( '/' );
    echo '<div class="breadcrumb-wrap"><div id="breadcrumb" class="breadcrumbIl">';

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo wp_kses_post( $before . $home . $after );//'<a href="' . $homeLink . '">' . $home . '</a>';

    } else {

        echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

            $post_type = get_post_type_object(get_post_type());
            if( $post_type ){
                echo wp_kses_post( $before . $post_type->labels->singular_name . $after );
            }else{
                $queried_object = get_queried_object();
                if( $queried_object )
                    echo wp_kses_post( $before . $queried_object->name . $after );
            }


        } elseif ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo wp_kses_post( $before . single_cat_title('', false) . $after );

        } elseif ( is_search() ) {
            echo wp_kses_post( $before . get_search_query() . $after );

        }
        elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo wp_kses_post( $before . get_the_time('d') . $after );

        }
        elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo wp_kses_post( $before . get_the_time('F') . $after );

        }
        elseif ( is_year() ) {
            echo wp_kses_post( $before . get_the_time('Y') . $after );

        }
        elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
              //echo '<a href="' . $homeLink . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
              echo '<a href="'. get_permalink(41).'">'. get_the_title(41).'</a>';
              if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                if(isBodyClass('single-post')):
                    echo '<a href="' . get_permalink(35) . '">' . get_the_title(35) . '</a>'. $delimiter ;
                endif;
                //echo wp_kses_post( $cats );



                if(isBodyClass('single-post') && $cat->slug == "agenda"):
                    echo '<a href="' . get_permalink(323) . '">' . get_the_title(323) . '</a>'. $delimiter ;
                elseif (isBodyClass('single-post') && $cat->slug == "projets"):
                    echo '<a href="' . get_permalink(320) . '">' . get_the_title(320) . '</a>'. $delimiter ;
                elseif (isBodyClass('single-post') && $cat->slug == "temoignages"):
                    echo '<a href="' . get_permalink(325) . '">' . get_the_title(325) . '</a>'. $delimiter ;
                endif;

                if ($showCurrent == 1) echo wp_kses_post( $before . get_the_title() . $after );
            }

        } elseif ( is_attachment() ) {
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo wp_kses_post( $before . get_the_title() . $after );

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $str = str_replace("<br>", "", get_the_title($page->ID), $count);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . $str . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo wp_kses_post( $breadcrumbs[$i] );
                if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
            }
            $str = str_replace("<br>", "",  get_the_title(), $count);
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . $str . $after;

        } elseif ( is_tag() ) {
            echo wp_kses_post( $before . single_tag_title('', false) . $after );

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo wp_kses_post( $before . esc_html__('Posts by ', 'odas57') . $userdata->display_name . $after );

        } elseif ( is_404() ) {
            echo wp_kses_post( $before . esc_html__('Error', 'odas57') . $after );
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo esc_html__('Page', 'odas57') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
    }
    echo '</div></div>';
}

/*add_filter('timber/twig', 'add_to_twig');
function add_to_twig($twig) {
    $twig->addExtension(new Twig_Extension_StringLoader());
    $twig->addFilter(new Twig_SimpleFilter('arrayUnique', 'arrayUnique'));
    return $twig;
}*/

function arrayUnique($unique) {
    $result = array_unique($unique);
    return $result;
}


/**
 * @param WP_Query|null $wp_query
 * @param bool $echo*
 * @return string
 */
function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true ) {
    if ( null === $wp_query ) {
        global $wp_query;
    }
    $pages = paginate_links( [
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'       => '?page=%#%',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __( '« Précédent' ),
            'next_text'    => __( 'Suivant »' ),
            'add_args'     => false,
            'add_fragment' => ''
        ]
    );
    if ( is_array( $pages ) ) {
        //$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div class="pagination"><ul class="pagination">';
        foreach ($pages as $page) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }
        $pagination .= '</ul></div>';
        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }
    return null;
}



