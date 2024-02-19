<?php

$portfolio = new CPT( array(
    'post_type_name' => 'stage',
    'singular'       => __('Stage', 'ta-portfolio'),
    'plural'         => __('Stages', 'ta-portfolio'),
    'slug'           => 'stage'
),
	array(
    'supports'  => array( 'title', 'editor', 'thumbnail' ),
    'menu_icon' => 'dashicons-tickets'
));

$portfolio -> register_taxonomy( 
	array(
		'taxonomy_name' => 'stage_tags',
		'singular'      => __('Intervenant', 'ta-portfolio'),
		'plural'        => __('Intervenants', 'ta-portfolio'),
		'slug'          => 'stage-tag'
	)
);

$portfolio -> register_taxonomy( 
	array(
		'taxonomy_name' => 'stage_discipline',
		'singular'      => __('Discipline', 'ta-portfolio'),
		'plural'        => __('Disciplines', 'ta-portfolio'),
		'slug'          => 'stage-discipline'
	)
);

$portfolio -> register_taxonomy( 
	array(
		'taxonomy_name' => 'stage_departement',
		'singular'      => __('Département', 'ta-portfolio'),
		'plural'        => __('Départements', 'ta-portfolio'),
		'slug'          => 'stage-departement'
	)
);
