<?php

$portfolio = new CPT( array(
    'post_type_name' => 'intervenant',
    'singular'       => __('Intervenant', 'ta-portfolio'),
    'plural'         => __('Intervenants', 'ta-portfolio'),
    'slug'           => 'intervenant'
),
	array(
    'supports'  => array( 'title', 'editor', 'thumbnail' ),
    'menu_icon' => 'dashicons-universal-access-alt'
));

$portfolio -> register_taxonomy( 
	array(
		'taxonomy_name' => 'intervenant_tags',
		'singular'      => __('Spécialité', 'ta-portfolio'),
		'plural'        => __('Spécialités', 'ta-portfolio'),
		'slug'          => 'intervenant-tag'
	)
);
