<?php
/**
 * The template for displaying all single posts.
 *
 * @package TA Portfolio
 */

get_header(); ?>

	<div class="single-intervenant" style="margin-top: 60px;">
	<?php get_template_part( 'autorepondeur-citation-stage', 'page' ); ?>
	</div>
	
	<?php // get_template_part( 'sondage', 'page' ); ?>
		
	<div class="container stages">
		<div class="row">
			<div id="primary" class="col-sm-12 col-md-8 col-lg-8">
				<main id="main" class="site-main" role="main">

					<style type="text/css">
					.ligne1 { background-color : #f1f1f1; }
					.ligne0 { background-color : #ffffff; }
					</style>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
						<?php 
							
							// Voir si une url existe
							function urlExist($urlExist)
							{
								$file_headers = @get_headers($urlExist);
								if($file_headers[0] == 'HTTP/1.1 404 Not Found'){
								   return false;
								}else{
									return true;
								}
								
							}
							
							// traitement du filtrage des stages
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
							
							$monTitre = get_the_title();
							// enlever les accents
							$sansAccents = str_to_noaccent($monTitre);
							// minuscules
							$minuscules = strtolower($sansAccents);
							// trait d'union (le tag)
							$monTag = str_replace(' ','-',$minuscules);
							
						?>
						
						<h2 class="stages-title" style="font-size: 2.8em;" >Intervenant :</h2>
						<!-- <h2 class="stages-title"><?php //the_title(); ?></h2> -->
													
						<article class="profil-intervenant">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-thumbnail post-thumbnail-single photo-intervenant">
									<?php the_post_thumbnail( 'featured-image' ); //pour info height: 300px; width: 750px; ?>
								</div>
							<?php endif; ?>
							
								<?php 
									$monNum = rand(1, 8);
									$dirImg = get_bloginfo( 'template_url' );
									$bgImg = $dirImg .'/img/energie/'. $monNum .'.jpg';
								?>
								<div class="bg-energie" style="background: url('<?php echo $bgImg; ?>') center top transparent;" ></div>

								<header class="entry-header">
									<?php the_title( sprintf( '<h1 class="post-inner-content-intervenant stages-title nom-intervenant">' ), '</h1>' ); ?>
								</header>

							<div class="ligne post-inner-content">
								
								<div class="entry-content" id="monContenu">
									<?php 
										$product_terms = wp_get_object_terms( $post->ID, 'intervenant_tags', array( "fields" => "all" ) );
										$c = 0;
										$d = 0;

										if ( ! empty( $product_terms ) ) {
											if ( ! is_wp_error( $product_terms ) ) {				
												echo '<p>Spécialité(s) : ';
												foreach( $product_terms as $t ) {	
													if($c > $d){ echo ', '; }
													$c++;
													echo '<strong><a href="' . esc_url( get_term_link( $t->slug, 'intervenant_tags' ) ) . '">' . esc_html( $t->name ) . '</a></strong>';
												}
												echo '</p>';
											}
										}
									?>
									<?php the_content(); ?>
									
									<?php 							
									// Si l'intervenant a fait des articles, il y aura un btn qui permettra d'afficher la liste de ses articles
									$monUrl = get_bloginfo('url') .'/tag/'. $monTag;
									// ici ajouter une condition pour qu'il n'y ait pas de lien si l'url n'existe pas
									if( urlExist($monUrl) == TRUE ){
										?><a href="<?php echo $monUrl; ?>/" ><button type="button" class="btn btn-danger btn-cmc btn-cmc-red"><?php _e( 'Voir tous ses articles', 'ta-portfolio' ); ?></button></a><?php
									}else{}	
									?>
								</div>
							</div>
						</article>

						<?php wp_reset_postdata(); ?>

					<?php endwhile; else : ?>
						<article class="profil-intervenant">
							<p style="text-align: center;"><?php _e( 'Désolé, aucune intervenant n\'a été trouvé à ce nom sur ce site.', 'ta-portfolio' ); ?></p>
						</article>
					<?php endif; ?>
					
					
		
					<!-- les stages -->
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
					//echo 'Nous sommes le ' . $dateDuJour . '.<br/>';
					?>
					
					<?php $i = 1; ?>

					<?php 

					$args = array( 
						'post_type' 	 => 'stage', 
						'stage_tags' 	 => $monTag, 
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
					$the_query = new WP_Query( $args );
					
					if ( $the_query->have_posts() ) :
						
						
						
						?><h3 class="post-inner-content-intervenant post-inner-content-intervenan stages-title nom-intervenant intervenant-stages-a-venir" ><?php _e( 'Ses stages à venir :', 'ta-portfolio' ); ?></h3><?php

						while ( $the_query->have_posts() ) : $the_query->the_post(); 
							//
							// Post Content here
							?>
							<div class="col-lg-12 ligne ligne<?php echo ($i % 2); ?> profil-intervenant" >
							<div class="col-xs-12 col-md-2 ">
								<div class="miniatures-listes"><?php
									if ( get_post_gallery() ) {
										echo get_post_gallery();
									} elseif ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
								?></div>
							</div>
							<div class="col-xs-12 col-md-10">
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
									
									<?php 
									if(isset($dataF) && $dataF!=''){
										echo 'Du <strong>'. $str_datD .' '. $nouvelleDateD .'</strong> au <strong>'. $str_datF .' '. $nouvelleDateF .'</strong>';
									} else {
										echo 'Le <strong>'. $str_datD .' '. $nouvelleDateD .'</strong>'; 
									} 
									?>
								</p>
								
								<p><?php the_content(); ?></p>
								<!-- <a class="btn btn-default" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Voir la fiche', 'ta-portfolio' ); ?></a> -->
								<?php if( get_post_meta( $post->ID, '_cmb_fichestage', true) ){ ?>
									<a href="<?php echo get_post_meta( $post->ID, '_cmb_fichestage', true); ?>" target="_blank"><button type="button" class="btn btn-danger btn-cmc btn-cmc-red"><?php _e( 'Voir la fiche', 'ta-portfolio' ); ?></button></a>				
								<?php } ?>
							</div>
							<div style="clear: both;"></div>
						</div>
						<?php $i++; ?>

						<?php endwhile; ?>
					
					
					<?php wp_reset_postdata(); ?>
					
					<?php else : ?>
						<div class="profil-intervenant"><p><?php _e( '', 'ta-portfolio' ); ?></p>
					<?php endif; ?>
					
				</main><!-- #main -->
			</div><!-- #primary -->
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>