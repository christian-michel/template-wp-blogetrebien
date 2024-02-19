<?php
/**
 * Template Name: Contact
 *
 * @package TA Portfolio
 */

 /* => ceci est la page d'accueil du thème */
get_header(); ?>

	<!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 homepage stages">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
					<p>N'hésitez pas à nous contacter par mail en remplissant le formulaire ci-dessous : </p>
					<?php the_content(); ?>
                </div>
                <div class="col-xs-12 col-md-6">
					<img src="<?php bloginfo('template_directory'); ?>/img/img-contact2.jpg" title="méditation" alt="photo de méditation" class="carte" />
					<div class="nous-joindre">
						<img class="nous-joindre-image" src="<?php bloginfo('template_directory'); ?>/img/icone-nous-joindre-adresse.jpg" />
						<p class="nous-joindre-texte" style="margin-top: 15px;">Christian-Michel CHAMPON<!-- <br/>Yann TROUILLOT --></p>
						<div style="clear: both;"></div>
					</div>
					<!-- <div class="nous-joindre">
						<img class="nous-joindre-image" src="<?php bloginfo('template_directory'); ?>/img/icone-nous-joindre-tel.jpg" />
						<p class="nous-joindre-texte telephone-desktop">Téléphone :<br/>06 67 67 57 58</p>
						<p class="nous-joindre-texte telephone-mobile"><a href="tel:0667675758"><button type="submit" class="btn btn-danger btn-lg btn-cmc btn-cmc-red">Téléphone :<br/>06 67 67 57 58</button></a></p>
						<div style="clear: both;"></div>
					</div> -->
					<div class="nous-joindre">
						<img class="nous-joindre-image" src="<?php bloginfo('template_directory'); ?>/img/icone-nous-joindre-e-mail.jpg" />
						<p class="nous-joindre-texte">E-mail :<br/>contact@blogetrebien.fr</p>
						<div style="clear: both;"></div>
					</div>
				</div>
            </div>
        </div>
    </section>
	
<?php get_footer(); ?>
