<?php
/*
Plugin Name: sermons plugin by mike ritter
Description: creat sermon custom post types for church website
Plugin URI: https://github.com/mikeritter/wordpress_plugins/mikeritter-sermons
Version: 0.0.2
Author: Mike Ritter
*/
/* Start Adding Functions Below this Line */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
 * Create sermon post type
 *
 */

add_action('init','create_post_type');

function create_post_type(){
    register_post_type(
        'ritterml_sermon',
            array(
                'labels' => array(
                    'name'  =>  'Sermons',
                    'singular_name' =>  'Sermon'
                ),
                'public'    =>  true,
                'has_archive'   =>  true,
                'rewrite'   =>  array('slug'    =>  'sermons'),
                'menu_position'	=> 5,
                'supports' => array('title','editor')
            )
        );
}


/**
 * Register Multiple Taxonomies
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/register-multiple-taxonomies/
 */

function be_register_taxonomies() {

    $taxonomies = array(
        array(
            'slug'         => 'sermon-date',
            'single_name'  => 'Date',
            'plural_name'  => 'Dates',
            'post_type'    => 'sermons',
            'rewrite'      => array( 'slug' => 'date' ),
        ),
        array(
            'slug'          =>  'sermon-description',
            'single_name'   =>  'Description',
            'plural_name'   =>  'Descriptions',
            'post_type'     =>  'sermons',
        ),
        array(
            'slug'          =>  'sermon-service',
            'single_name'   =>  'Service',
            'plural_name'   =>  'Services',
            'post_type'     =>  'sermons',
            'rewrite'       =>  array('slug' => 'service')
            ),
        array(
            'slug'          =>  'sermon-image',
            'single_name'   =>  'Image',
            'plural_name'   =>  'Images',
            'post_type'     =>  'sermons',
            'rewrite'       =>  array('slug' => 'image')
            ),
        array(
            'slug'          =>  'sermon-embed',
            'single_name'   =>  'Embed',
            'plural_name'   =>  'Embeds',
            'post_type'     =>  'sermons',
            'rewrite'       =>  array('slug' => 'embeds')
            )
    );

    foreach( $taxonomies as $taxonomy ) {
        $labels = array(
            'name' => $taxonomy['plural_name'],
            'singular_name' => $taxonomy['single_name'],
            'search_items' =>  'Search ' . $taxonomy['plural_name'],
            'all_items' => 'All ' . $taxonomy['plural_name'],
            'parent_item' => 'Parent ' . $taxonomy['single_name'],
            'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
            'edit_item' => 'Edit ' . $taxonomy['single_name'],
            'update_item' => 'Update ' . $taxonomy['single_name'],
            'add_new_item' => 'Add New ' . $taxonomy['single_name'],
            'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
            'menu_name' => $taxonomy['plural_name']
        );
        
        $rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
        $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;
    
        register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
            'hierarchical' => $hierarchical,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => $rewrite,
        ));
    }
    
}
add_action( 'init', 'be_register_taxonomies' );

/* Stop Adding Functions Below this Line */
?>