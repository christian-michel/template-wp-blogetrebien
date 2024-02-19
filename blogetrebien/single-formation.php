<?php
/**
 * Template Name: Formations
 *
 * @package TA Portfolio
 */


get_header(); ?>
	
	<div style="margin-top: 60px;">
	<?php get_template_part( 'autorepondeur-citation-stage', 'page' ); ?>
	</div>
	
	<?php // get_template_part( 'sondage', 'page' ); ?>
	
	<!-- Blog stages -->
	<section id="blog">
		<div class="container stages">
			<div class="row">
				<div class="col-lg-12 homepage">
					<h2 class="stages-title"><?php _e( 'Formations', 'ta-portfolio' ); ?></h2>
				</div>
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
				// echo 'Nous sommes le ' . $dateDuJour . '.<br/>';
				?>
				
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
				?>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
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
						
						<p>
							Prix : <strong><?php echo get_post_meta( $post->ID, '_cmb_prixformation', true); ?></strong><br/>
							Durée totale de la formation : <strong><?php echo get_post_meta( $post->ID, '_cmb_dureeformation', true); ?></strong><br/>
							à <strong><?php echo get_post_meta( $post->ID, '_cmb_lieuformation', true); ?></strong><br/>
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
							?>
						</p>
						
						<p>
							
						</p>
						
						<p><?php the_content(); ?></p>
						<!-- <a class="btn btn-default" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Voir l\'affiche', 'ta-portfolio' ); ?></a> -->
						<?php if( get_post_meta( $post->ID, '_cmb_ficheformation', true) ){ ?>
							<a href="<?php echo get_post_meta( $post->ID, '_cmb_ficheformation', true); ?>" target="_blank"><button type="button" class="btn btn-danger btn-cmc btn-cmc-red"><?php _e( 'Voir la fiche', 'ta-portfolio' ); ?></button></a>				
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
						</div><p><?php _e( 'Aucune formation n\'est prévu pour le moment. Revenez plus tard.', 'ta-portfolio' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
