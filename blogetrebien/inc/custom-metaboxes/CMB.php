<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category TA Portfolio
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */


add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
	
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['stage_metabox'] = array(
		'id'         => 'stage_metabox',
		'title'      => __( 'Stage Metabox', 'ta-portfolio' ),
		'pages'      => array( 'stage', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'Date début', 'ta-portfolio' ),
				'desc'       => __( 'Date debut', 'ta-portfolio' ),
				'id'         => $prefix . 'datedebutstage',
				'type'		 => 'text_date',
				'date_format'=> 'Y/m/d',
				/*'date_format'=> 'l jS \of F Y',*/
			),
			array(
				'name'       => __( 'Date fin (laisser vide si le stage dure un jour)', 'ta-portfolio' ),
				'desc'       => __( 'Date fin', 'ta-portfolio' ),
				'id'         => $prefix . 'datefinstage',
				'type'		 => 'text_date',
				'date_format'=> 'Y/m/d',
				/*'date_format'=> 'l jS \of F Y',*/
			),
			array(
				'name'       => __( 'Lieu', 'ta-portfolio' ),
				'desc'       => __( 'Lieu', 'ta-portfolio' ),
				'id'         => $prefix . 'lieustage',
				'type'       => 'text',
			),
			array(
				'name'       => __( 'Fiche', 'ta-portfolio' ),
				'desc'       => __( 'Fiche', 'ta-portfolio' ),
				'id'         => $prefix . 'fichestage',
				'type'       => 'file',
			),
		),
	);
	
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['formation_metabox'] = array(
		'id'         => 'formation_metabox',
		'title'      => __( 'Formation Metabox', 'ta-portfolio' ),
		'pages'      => array( 'formation', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'Prix', 'ta-portfolio' ),
				'desc'       => __( 'Prix', 'ta-portfolio' ),
				'id'         => $prefix . 'prixformation',
				'type'       => 'text',
			),
			array(
				'name'       => __( 'Durée', 'ta-portfolio' ),
				'desc'       => __( 'Durée', 'ta-portfolio' ),
				'id'         => $prefix . 'dureeformation',
				'type'       => 'text',
			),
			array(
				'name'       => __( 'Lieu', 'ta-portfolio' ),
				'desc'       => __( 'Lieu', 'ta-portfolio' ),
				'id'         => $prefix . 'lieuformation',
				'type'       => 'text',
			),
			array(
				'name'       => __( 'Fiche', 'ta-portfolio' ),
				'desc'       => __( 'Fiche', 'ta-portfolio' ),
				'id'         => $prefix . 'ficheformation',
				'type'       => 'file',
			),
		),
	);

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['citation_metabox'] = array(
		'id'         => 'citation_metabox',
		'title'      => __( 'Citation Metabox', 'ta-portfolio' ),
		'pages'      => array( 'citation', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'auteur', 'ta-portfolio' ),
				'desc'       => __( 'Auteur', 'ta-portfolio' ),
				'id'         => $prefix . 'auteurCitation',
				'type'		 => 'text',
			),
		),
	);

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
