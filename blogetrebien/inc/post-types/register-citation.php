<?php

$portfolio = new CPT( array(
    'post_type_name' => 'citation',
    'singular'       => __('Citation', 'ta-portfolio'),
    'plural'         => __('Citations', 'ta-portfolio'),
    'slug'           => 'citation'
),
	array(
    'supports'  => array( 'title', 'editor', 'thumbnail' ),
    'menu_icon' => 'dashicons-format-quote'
));

$portfolio -> register_taxonomy( array(
    'taxonomy_name' => 'citation_tags',
    'singular'      => __('Auteur', 'ta-portfolio'),
    'plural'        => __('Auteurs', 'ta-portfolio'),
    'slug'          => 'citation-tag'
));
