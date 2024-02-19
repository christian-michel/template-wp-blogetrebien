<?php
/**
 * Contact Me Form
 *
 * @package TA Portfolio
 */

define( 'WP_USE_THEMES', false );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

// Check for empty fields
if( empty($_POST['name'] )      ||
	empty( $_POST['email'] )    ||
	empty( $_POST['subject'] )  ||
	empty( $_POST['message'] )  ||
	!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
		echo "No arguments Provided!";
		return false;
	}

$name = $_POST['name'];
$email_address = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Create the email and send the message
$to = ta_option( 'contact_email' );
$email_subject = "BLOGERTEBIEN.FR : $subject";
$email_body = "Vous avez reçu un nouveau message.\n\n"."Ci-dessous les détails :\n\nNom : $name\n\nEmail: $email_address\n\nObjet : $subject\n\nMessage:\n\n$message";
$headers .= "Répondre à: $email_address";

wp_mail( $to, $email_subject, $email_body, $headers );

return true;

?>
