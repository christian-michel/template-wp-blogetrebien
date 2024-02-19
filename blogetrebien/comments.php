<?php
//Declare Vars
$comment_send = 'Envoyer';
$comment_reply = 'Laisser un commentaire';
$comment_reply_to = 'Répondre';

$comment_author = 'Nom';
$comment_email = 'E-Mail';
$comment_body = 'Message';
$comment_url = 'Site web';
$comment_cookies_1 = ' J\'accepte la';
$comment_cookies_2 = ' politique de confidentialité';

$comment_before = '<p>S\'enregistrer n\'est pas requis.</P>';

$comment_cancel = 'Supprimer la réponse';

//Array
$comments_args = array(
    //Define Fields
    'fields' => array(
        //Author field
        'author' => '<p class="comment-form-author"><br /><input id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"></input></p>',
        //Email Field
        'email' => '<p class="comment-form-email"><br /><input id="email" name="email" placeholder="' . $comment_email .'"></input></p>',
        //URL Field
        'url' => '<p class="comment-form-url"><br /><input id="url" name="url" placeholder="' . $comment_url .'"></input></p>',
        //Cookies
        'cookies' => '<div style="margin-bottom: 15px;"><input type="checkbox" required>' . $comment_cookies_1 . '<a href="https://blogetrebien.fr/politique-sur-les-cookies/">' . $comment_cookies_2 . '</a></div>',
    ),
    // Change the title of send button
    'label_submit' => __( $comment_send ),
    // Change the title of the reply section
    'title_reply' => __( $comment_reply ),
    // Change the title of the reply section
    'title_reply_to' => __( $comment_reply_to ),
    //Cancel Reply Text
    'cancel_reply_link' => __( $comment_cancel ),
    // Redefine your own textarea (the comment body).
    'comment_field' => '<p class="comment-form-comment"><br /><textarea id="comment" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea></p>',
    //Message Before Comment
    'comment_notes_before' => __( $comment_before),
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => '',
    //Submit Button ID
    'id_submit' => __( 'comment-submit' ),
);





/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
 
 
if ( have_comments() ) : ?>
	<h4 id="comments"><?php comments_number('Aucun Commentaires', 'Un Commentaire', '% Commentaires' );?></h4>
	<ul class="commentlist">
		<?php wp_list_comments(); ?></ul>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<div><?php comment_form( $comments_args ); ?></div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) :
		// If comments are open, but there are no comments.
	else : // comments are closed
	endif;
endif;


