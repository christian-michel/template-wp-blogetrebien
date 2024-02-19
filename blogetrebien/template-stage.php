<?php
/**
 * Template Name: Stage
 *
 * @package TA Portfolio
 */


get_header(); ?>
	
	<div style="margin-top: 60px;">
	<?php get_template_part( 'autorepondeur-citation-stage', 'page' ); ?>
	</div>
	
	<!-- Blog stages -->
	<section id="blog">
		<div class="container stages">
			<div class="row">
				<div class="col-lg-12 homepage">
					<h2 class="stages-title"><?php _e( 'Stages', 'ta-portfolio' ); ?></h2>
				</div>
				<p class="col-lg-12" style="margin-bottom: 60px;">
				<?php 
				
				$fromDate = date('Y\/m\/d');
				$MoisJ = array (
								"01" => "janvier", 
								"02" => "février", 
								"03" => "mars", 
								"04" => "avril", 
								"05" => "mai", 
								"06" => "juin", 
								"07" => "juillet", 
								"08" => "août", 
								"09" => "septembre", 
								"10" => "octobre", 
								"11" => "novembre", 
								"12" => "décembre",
							);
				list($anneeJ, $moisJ, $jourJ) = explode("/", $fromDate);
				$moisActuel = $MoisJ[$moisJ];
				$dateDuJour = $jourJ ." ". $moisActuel ." ". $anneeJ;
				echo 'Nous sommes le ' . $dateDuJour . '.<br/>';
				?>
				
				Voici les stages à venir :
				</p>
				
				<?php $i = 1; ?>
				<style type="text/css">
				.ligne1 { background-color : #f1f1f1; }
				.ligne0 { background-color : #ffffff; }
				</style>

				<?php 
				
				function str_to_noaccent($sansAccent)
				{
					$url = $sansAccent;
					$url = preg_replace('#Ç#', 'C', $url);
					$url = preg_replace('#ç#', 'c', $url);
					$url = preg_replace('#è|é|ê|ë#', 'e', $url);
					$url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
					$url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
					$url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
					$url = preg_replace('#ì|í|î|ï#', 'i', $url);
					$url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
					$url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
					$url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
					$url = preg_replace('#ù|ú|û|ü#', 'u', $url);
					$url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
					$url = preg_replace('#ý|ÿ#', 'y', $url);
					$url = preg_replace('#Ý#', 'Y', $url);
					 
					return ($url);
				}
				
				function urlExist($urlExist)
				{
					$file_headers = @get_headers($urlExist);
					if($file_headers[0] == 'HTTP/1.1 404 Not Found'){
					   return false;
					}else{
						return true;
					}
					
				}
				
			
				$args = array( 
					'post_type' 	 => 'stage', 
					'posts_per_page' => -1, 
					'meta_key' 		 => '_cmb_datedebutstage', 
					/*'meta_value' 	 => $nouvelleDate, */
					'orderby' 		 => 'meta_value', 
					'order' 		 => 'ASC', 
					'meta_query' => array(
										'key' => '_cmb_datedebutstage',
										'value' => $fromDate, // date to compare to, after this one
										'compare' => '>=',
										'type' => 'DATE' //set the format
									),
				);
				
				// the query
				$the_query = new WP_Query( $args ); ?>
				
				<?php if ( $the_query->have_posts() ) : ?>
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
				
				
				<div class="col-lg-12 ligne ligne<?php echo ($i % 2); ?>" >
					<div class="col-xs-12 col-md-2 ">
						<div class="miniatures-listes"><?php
							if ( get_post_gallery() ) {
								echo get_post_gallery();
							} elseif ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}
						?></div>
					</div>
					<div class="col-xs-12 col-md-10" id="monContenu">
						<h3 class="stages-title"><?php the_title(); ?></h3>
						
						<?php
							// traitement de l'affichage de la date de début
							$dataD = get_post_meta( $post->ID, '_cmb_datedebutstage', true);
							$dataF = get_post_meta( $post->ID, '_cmb_datefinstage', true);
							
							$nomMois = array (
								"01" => "janvier", 
								"02" => "février", 
								"03" => "mars", 
								"04" => "avril", 
								"05" => "mai", 
								"06" => "juin", 
								"07" => "juillet", 
								"08" => "août", 
								"09" => "septembre", 
								"10" => "octobre", 
								"11" => "novembre", 
								"12" => "décembre",
							);
							list($annee_D, $mois_D, $jour_D) = explode("/", $dataD);
							$leMois_D = $nomMois[$mois_D];
							$nouvelleDateD = $jour_D ." ". $leMois_D ." ". $annee_D;
							// echo $nouvelleDate;
							
							// traitement de l'affichage du jour
							$jour_fr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
							$timestamp_D = mktime (0, 0, 0, $mois_D, $jour_D, $annee_D);
							$wd_D = date("w", $timestamp_D);
							$str_datD = $jour_fr[$wd_D];
							// echo $str_dat;
							
							
							list($annee_F, $mois_F, $jour_F) = explode("/", $dataF);
							$leMois_F = $nomMois[$mois_F];
							$nouvelleDateF = $jour_F ." ". $leMois_F ." ". $annee_F;
														// traitement de l'affichage du jour
							$jour_fr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
							$timestamp_F = mktime (0, 0, 0, $mois_F, $jour_F, $annee_F);
							$wd_F = date("w", $timestamp_F);
							$str_datF = $jour_fr[$wd_F];
							// echo $str_dat;
							
						?>
						
						<p>
							à <strong><?php echo get_post_meta( $post->ID, '_cmb_lieustage', true); ?></strong><br/>
							<?php $terms = wp_get_post_terms( $post->ID, 'stage_tags', array( "fields" => "names" ) ); ?>
							
							Avec : <?php // traitement des intervenants cliquables
							 
								$p = 0;
								$conjonction = 0;
								foreach($terms as $v){
									if($conjonction++ != 0){
										echo " et ";
										$conjonction++;
									}else{}
									// afficher la valeur brut : $terms[i] = $nom = prénom nom
									$termsName = $terms[$p];
									// traitement du prénom et du nom ($terms-url) pour créer l'url : minuscules sans accent, avec trait d'union
									// enlever les accents
									$str = str_to_noaccent($terms[$p]);
									// nom et prénom en minuscules
									$termsPrepa = strtolower($str);
									//on lie les espaces par des traits d'unions
									$termsUrl = str_replace(' ','-',$termsPrepa);
									$monUrl = get_bloginfo('url') .'/intervenant/'. $termsUrl;
									// ici ajouter une condition pour qu'il n'y ait pas de lien si l'url n'existe pas
									if( urlExist($monUrl) == TRUE ){
										echo '<strong><a href="'. $monUrl .'/">'. $termsName .'</a></strong>';
									}else{
										echo '<strong>'. $termsName .'</strong>';
									}
									$str = '';
									$p++;
								}
							?><br/>
							
							<?php 
							if(isset($dataF) && $dataF!=''){
								echo 'Du <strong>'. $str_datD .' '. $nouvelleDateD .'</strong> au <strong>'. $str_datF .' '. $nouvelleDateF .'</strong>';
							} else {
								echo 'Le <strong>'. $str_datD .' '. $nouvelleDateD .'</strong>'; 
							} 
							?>
						</p>
						
						<p>
							
						</p>
						
						<p><?php the_content(); ?></p>
						<!-- <a class="btn btn-default" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Voir l\'affiche', 'ta-portfolio' ); ?></a> -->
						<?php if( get_post_meta( $post->ID, '_cmb_fichestage', true) ){ ?>
							<a href="<?php echo get_post_meta( $post->ID, '_cmb_fichestage', true); ?>" target="_blank"><button type="button" class="btn btn-danger btn-cmc btn-cmc-red"><?php _e( 'Voir la fiche', 'ta-portfolio' ); ?></button></a>				
						<?php } ?>
					</div>
					<div style="clear: both;"></div>
				</div>
				<?php $i++; ?>

					<?php endwhile; ?>
					
				</div>			
					<!-- end of the loop -->

					<?php wp_reset_postdata(); ?>

					<?php else : ?>
						</div><p><?php _e( 'Aucun stage n\'est prévu pour le moment. Revenez plus tard.', 'ta-portfolio' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div id="primary" class="col-sm-12 col-md-8 col-lg-8" style="margin-top: 30px;">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php the_content(); ?>

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</section>

<?php get_footer(); ?>
