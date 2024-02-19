<?php

$portfolio = new CPT( array(
    'post_type_name' => 'challenge',
    'singular'       => __('Challenge', 'ta-portfolio'),
    'plural'         => __('Challenges', 'ta-portfolio'),
    'slug'           => 'challenge'
),
	array(
    'supports'  => array( 'title', 'editor', 'thumbnail' ),
    'menu_icon' => 'dashicons-awards'
));

$portfolio -> register_taxonomy( 
	array(
		'taxonomy_name' => 'challenge_tags',
		'singular'      => __('Challenge Tag', 'ta-portfolio'),
		'plural'        => __('Challenges Tags', 'ta-portfolio'),
		'slug'          => 'challenge-tag'
	)
);
