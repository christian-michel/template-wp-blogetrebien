<?php
/**
 * Template Name: Stage sélection
 *
 * @package TA Portfolio
 */


get_header(); ?>
	
	<div style="margin-top: 60px;">
	<?php get_template_part( 'autorepondeur-citation', 'page' ); ?>
	</div>
	
	<!-- Blog stages -->
	<section id="blog">
		<div class="container stages">
			<div class="row">
				<div class="col-lg-12 homepage">
					<h2 class="stages-title"><?php _e( 'Sélection de mes stages', 'ta-portfolio' ); ?></h2>
				</div>
				
				<style type="text/css">
					.ligne1 { background-color : #f1f1f1; }
					.ligne0 { background-color : #ffffff; }
				</style>
				
				<div class="col-lg-12 selection-stages" >
					<!-- <p>Note pour plus tard, en cas d'erreur, afficher le texte suivant : "Désolé ! <strong>José DIAZ</strong> ne fait pas de stage dans le <strong>69</strong> pour le moment."</p> -->
					
					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

					<?php endwhile; // end of the loop. ?>
					
					<!-- <div class="row" style="padding-top: 1.5em;">
						
						<form method=GET action="http://cmcgraphiste.com/LABS/blogetrebien/stages">
							
							<div class="col-xs-12 col-lg-4">
								<div class="bord">
								<fieldset>
									<legend>Discipline :</legend>
									<p>
										
										<input type="radio" name="discipline" value="tai chi" /> <label for="tai chi">tai chi</label><br />
										<input type="radio" name="discipline" value="qi gong" /> <label for="qi gong">qi gong</label><br />
										<input type="radio" name="discipline" value="" checked /> <label for="tous">Tous</label>
									</p>
								</fieldset>
								</div>
							</div>
							<div class="col-xs-12 col-lg-4">
								<div class="bord">
								<fieldset>
									<legend>Professeur :</legend>
									<p>
										
										<input type="radio" name="p" value="José DIAZ" /> <label for="José DIAZ">José DIAZ</label><br />
										<input type="radio" name="p" value="Guy GRENARD" /> <label for="Guy GRENARD">Guy GRENARD</label><br />
										<input type="radio" name="p" value="Thierry ALIBERT" /> <label for="Thierry ALIBERT">Thierry ALIBERT</label><br />
										<input type="radio" name="p" value="Roger ITIER" /> <label for="Roger ITIER">Roger ITIER</label><br />
										<input type="radio" name="p" value="Anna MIASSEDOVA" /> <label for="Anna MIASSEDOVA">Anna MIASSEDOVA</label><br />
										<input type="radio" name="p" value="" checked /> <label for="tous">Tous</label>
									</p>
								</fieldset>
								</div>
							</div>
							<div class="col-xs-12 col-lg-4">
								<div class="bord">
								<fieldset>
									<legend>Département :</legend>
									<p>
										
										<input type="radio" name="d" value="69" /> <label for="69">69</label><br />
										<input type="radio" name="d" value="18" /> <label for="18">18</label><br />
										<input type="radio" name="d" value="38" /> <label for="38">38</label><br />
										<input type="radio" name="d" value="85" /> <label for="85">85</label><br />
										<input type="radio" name="d" value="" checked /> <label for="tous">Tous</label>
									</p>
								</fieldset>
								</div>
							</div>

						   <div class="col-xs-12" style="margin-top: 1.5em;"><input type="submit" value="Cliquez ici pour voir mes stages"></div>
						</form>
					</div> -->

					<div class="row" style="padding-top: 1.5em;">
						
						<form method=GET action="<?php echo get_bloginfo('url'); ?>/stages">
				
							<div class="col-xs-12 col-lg-4">
								<div class="bord">
								<fieldset>
									<legend>Discipline :</legend>
									<p>
										<?php 
											$liste_disciplines = get_terms( 'stage_discipline' );
											/* ?><pre><?php print_r($liste_disciplines); ?></pre><?php */

											foreach( $liste_disciplines as $t ) {	
												echo '<input type="radio" name="discipline" value="' . esc_html( $t->name ) . '" /><label for="' . esc_html( $t->name ) . '">' . esc_html( $t->name ) . '</label><br />';
											} 
											echo '<input type="radio" name="discipline" value="" checked /> <label for="tous">Tous</label>';
										?>
									</p>
								</fieldset>
								</div>
							</div>
							<div class="col-xs-12 col-lg-4">
								<div class="bord">
								<fieldset>
									<legend>Professeur :</legend>
									<p>
										<?php 
											$liste_professeurs = get_terms( 'stage_tags' );
											/* ?><pre><?php print_r($liste_professeurs); ?></pre><?php */

											foreach( $liste_professeurs as $t ) {	
												echo '<input type="radio" name="p" value="' . esc_html( $t->name ) . '" /><label for="' . esc_html( $t->name ) . '">' . esc_html( $t->name ) . '</label><br />';
											} 
											echo '<input type="radio" name="p" value="" checked /> <label for="tous">Tous</label>';
										?>
									</p>
								</fieldset>
								</div>
							</div>
							<div class="col-xs-12 col-lg-4">
								<div class="bord">
								<fieldset>
									<legend>Département :</legend>
									<p>
										<?php 
											$liste_departements = get_terms( 'stage_departement' );
											/* ?><pre><?php print_r($liste_departements); ?></pre><?php */

											foreach( $liste_departements as $t ) {	
												echo '<input type="radio" name="d" value="' . esc_html( $t->name ) . '" /><label for="' . esc_html( $t->name ) . '">' . esc_html( $t->name ) . '</label><br />';
											} 
											echo '<input type="radio" name="d" value="" checked /> <label for="tous">Tous</label>';
										?>
									</p>
								</fieldset>
								</div>
							</div>

						   <div class="col-xs-12" style="margin-top: 1.5em;"><input type="submit" value="Cliquez ici pour voir mes stages"></div>
						</form>
					</div>


				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
