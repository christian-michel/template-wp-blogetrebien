<?php
/**
 * Template Name: Inscription au bulletin
 *
 * @package TA Portfolio
 */


get_header(); ?>

<!-- Blog stages -->
<section class="page-merci">
	<div class="container">
		
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 page-merci-img-text">
				<div class="">
					<div class="page-merci-img-titre"><?php the_title(); ?></div>
					<div class="page-merci-img-sous-titre">Votre inscription est confirmée !</div>
				</div>
				<div class="page-presentation-img-separateur page-merci-separateur-black">
					<div class="rond-blanc rond-real-black"></div>
				</div>
				<div class="page-merci-titre-img-un">Vous allez recevoir dans votre boîte <b>email</b> un lien vers <br/>le <b>bulletin</b> du mois en cours.</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 page-merci-img-text page-merci-content" id="monContenu">
				<div><?php the_content(); ?></div>
			</div>
		</div>
		
	</div>
</section>

<?php get_footer(); ?>

