<?php

$portfolio = new CPT( array(
    'post_type_name' => 'formation',
    'singular'       => __('Formation', 'ta-portfolio'),
    'plural'         => __('Formations', 'ta-portfolio'),
    'slug'           => 'formation'
),
	array(
    'supports'  => array( 'title', 'editor', 'thumbnail' ),
    'menu_icon' => 'dashicons-portfolio'
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
		'taxonomy_name' => 'formation_discipline',
		'singular'      => __('Discipline', 'ta-portfolio'),
		'plural'        => __('Disciplines', 'ta-portfolio'),
		'slug'          => 'formation-discipline'
	)
);

$portfolio -> register_taxonomy( 
	array(
		'taxonomy_name' => 'formation_departement',
		'singular'      => __('Département', 'ta-portfolio'),
		'plural'        => __('Départements', 'ta-portfolio'),
		'slug'          => 'formation-departement'
	)
);
