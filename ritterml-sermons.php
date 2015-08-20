<?php
/*
Plugin Name: sermons plugin by mike ritter
Description: creat sermon custom post types for church website
Plugin URI: https://github.com/mikeritter/wordpress_plugins/mikeritter-sermons
Version: 0.0.1
Author: Mike Ritter
*/
/* Start Adding Functions Below this Line */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

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
		'menu_position'	=> 5
            )
        );
}

add_action('init','create_post_type');
/* Stop Adding Functions Below this Line */
?>