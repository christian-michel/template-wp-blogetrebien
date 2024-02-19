<?php
/**
 * Template Name: Stage-v2
 *
 * @package TA Portfolio
 */


get_header(); ?>
	
	<?php is_ssl() ?>
	
	<div style="margin-top: 60px;">
	<?php get_template_part( 'autorepondeur-citation-stage', 'page' ); ?>
	</div>
	
	<?php // get_template_part( 'sondage', 'page' ); ?>
	
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
								"12" => "décembre"
							);
				list($anneeJ, $moisJ, $jourJ) = explode("/", $fromDate);
				$moisActuel = $MoisJ[$moisJ];
				$dateDuJour = $jourJ ." ". $moisActuel ." ". $anneeJ;
				echo 'Nous sommes le ' . $dateDuJour . '.<br/>';
				?>
				
				Voici les stages à venir :
				</p>
				
				
				<style type="text/css">
				.ligne0 { background-color : #f1f1f1; }
				.ligne1 { background-color : #ffffff; }
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
				
				/*
				function urlExist($urlExist)
				{
					$file_headers = @get_headers($urlExist);
					if($file_headers[0] == 'HTTPS/1.1 404 Not Found'){
					   return false;
					}else{
						return true;
					}
					
				}
				*/
				
				
				try{ $bdd = new PDO('mysql:host=blogetrewnbloget.mysql.db;dbname=blogetrewnbloget;charset=utf8', 'blogetrewnbloget', 'OVHcmcyt69'); }
				catch (Exception $e){ die('Erreur : ' . $e->getMessage()); }
				
				// On récupère tout le contenu de la table wp-postmeta dans laquelle se touvent les dates de début des stages
				$myDate = date('Y/m/d');
				$datedebutstage = $bdd->query('SELECT * FROM wp_postmeta WHERE meta_key="_cmb_datedebutstage" AND meta_value >= "'. $myDate .'" ORDER BY meta_value ASC');
				$i = 0;
				
				// Si on est vide...
				// On récupère chaque entrée une à une, citation + auteur
				while ($datedebut = $datedebutstage->fetch()){
					
					// exclure les stages qui sont dans la corbeille
					$statutstage = $bdd->query('SELECT * FROM wp_posts WHERE ID = "'. $datedebut['post_id'] .'"');
					$statutStage = $statutstage->fetch();
					if($statutStage['post_status'] != "trash"){
						// Ici on recréé le bloc complet avec toutes les infos (titre, lieu, intervenant, miniature et lien affiche)
						// Ensuite on fera le traitement de la date et la gestion des affichages
						?><div class="col-lg-12 ligne ligne<?php echo ($i % 2); ?>" >
						<div class="col-xs-12 col-md-2 ">
							<div class="miniatures-listes"><?php 
								// ici le thumbnail 
								$miniaturestage = $bdd->query('SELECT meta_value FROM wp_postmeta WHERE post_id = "'. $datedebut['post_id'] .'" AND meta_key= "_thumbnail_id"');
								$miniatureStage = $miniaturestage->fetch();
								$thumbnailstage = $bdd->query('SELECT * FROM wp_posts WHERE ID = "'. $miniatureStage['meta_value'] .'"');
								$thumbstage = $thumbnailstage->fetch();
								$thumbnailtitlestage = $bdd->query('SELECT * FROM wp_posts WHERE ID = "'. $miniatureStage['meta_value'] .'"');
								$thumbtitlestage = $thumbnailtitlestage->fetch();
								echo '<img src="'. $thumbstage['guid'] .'" alt="'. $thumbtitlestage['post_name'] .'" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" />';
							
							?></div>
						</div>
						<div class="col-xs-12 col-md-10" id="monContenu">
							<h3 class="stages-title"><?php 
								// ici le titre 
								$nomstage = $bdd->query('SELECT * FROM wp_posts WHERE ID = "'. $datedebut['post_id'] .'"');
								$titrestage = $nomstage->fetch();
								echo $titrestage['post_title'];
							?></h3>
						
						<?php
						
						// traitement de l'affichage de la date de début
						$datedefinstage = $bdd->query('SELECT * FROM wp_postmeta WHERE post_id="'.$datedebut['post_id'].'" AND meta_key="_cmb_datefinstage"');
						$datefin = $datedefinstage->fetch();
						
						$dataD = $datedebut['meta_value'];
						if(!empty($datefin)){ $dataF = $datefin['meta_value']; }else{ $dataF = NULL; }
						
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
							"12" => "décembre"
						);
						list($annee_D, $mois_D, $jour_D) = explode('/', $dataD);
						$leMois_D = $nomMois[$mois_D];
						$nouvelleDateD = $jour_D ." ". $leMois_D ." ". $annee_D;
						// echo $nouvelleDate;
						
						// traitement de l'affichage du jour
						$jour_fr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
						$timestamp_D = mktime(0, 0, 0, $mois_D, $jour_D, $annee_D);
						$wd_D = date("w", $timestamp_D);
						$str_datD = $jour_fr[$wd_D];
						// echo $str_dat;
						
						
						if(!empty($dataF)){
							list($annee_F, $mois_F, $jour_F) = explode('/', $dataF);
							$leMois_F = $nomMois[$mois_F];
							$nouvelleDateF = $jour_F ." ". $leMois_F ." ". $annee_F;
														// traitement de l'affichage du jour
							$jour_fr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
							$timestamp_F = mktime(0, 0, 0, $mois_F, $jour_F, $annee_F);
							$wd_F = date("w", $timestamp_F);
							$str_datF = $jour_fr[$wd_F];
						} else{}
			
						?><p><?php
							//echo $datedebut['post_id']."<br/>";
							
							// Récupération du lieu
							$lieustage = $bdd->query('SELECT * FROM wp_postmeta WHERE post_id = "'. $datedebut['post_id'] .'" AND meta_key="_cmb_lieustage" ');
							$donneesLieu = $lieustage->fetch();
							echo 'à <strong>' . $donneesLieu['meta_value'] . '</strong><br/>';
							
							// Récupération du nom du professeur
							echo "Avec ";
							$conjonction = 0;
							// récupérer la valeur du champ ID de la table wp_post et l'importer dans la selection pour la table wp_term_relationships (champ object_id)
							$recupID = $bdd->query('SELECT * FROM wp_term_relationships WHERE object_id="'.$titrestage['ID'].'"');
							$y = 0;
							while($obtientIdTaxonomy = $recupID->fetch()){
								// echo "La valeur de object_id dans la table wp_term_relationships est : ".$titrestage['ID']."<br/>";
								// echo "La valeur de term_taxonomy_id dans la table wp_term_relationships est : ".$obtientIdTaxonomy['term_taxonomy_id']."<br/>";
								// dans la table wp_term_taxonomy, récupérer la valeur de term_id (grâce à la valeur de term_taxonomy_id) et la taxonomy = stage_tags
								$recupIdTaxonomyTableTaxonomy = $bdd->query('SELECT * FROM wp_term_taxonomy WHERE term_taxonomy_id="'.$obtientIdTaxonomy['term_taxonomy_id'].'" AND taxonomy="stage_tags"');
								$h = 0;
								while($valeurIdTaxonomy = $recupIdTaxonomyTableTaxonomy->fetch()){
									// echo "La valeur de term_taxonomy_id dans la table wp_term_taxonomy est : ". $valeurIdTaxonomy['term_taxonomy_id']."<br/>";
									
									$listeDesIntervenants = $bdd->query('SELECT * FROM wp_terms WHERE term_id="'.$valeurIdTaxonomy['term_id'].'"');
									$p = 0;
									while($terms = $listeDesIntervenants->fetch()){
										if($conjonction != 0){
											echo " et ";
											$conjonction++;
										}else{
											$conjonction++;
										}
										
										// traitement du lien dynamique par la BDD
										$verifFicheProf = $bdd->query('SELECT "post_name" FROM wp_posts WHERE post_name="'. $terms['slug'] .'"');
										$ficheProf = $verifFicheProf->fetch();
										if(!empty($ficheProf['post_name'])){
											echo '<strong><a href="'. get_bloginfo('url') .'/intervenant/'. $terms['slug'] .'/">'. $terms['name'] .'</a></strong>';
										}else{
											echo '<strong>'. $terms['name'] .'</strong>';
										}
										$p++;
									} 
									$h++;
								}
							$y++;
							}
							echo "<br/>";
							
							// La date (penser à compléter l'affichage si cela dure plusieurs jours)
							if(empty($dataF)){
								echo "Le <strong>".$str_datD." ".$nouvelleDateD."</strong><br/>";
							}else{
								echo "Du <strong>".$str_datD." ".$nouvelleDateD."</strong> au <strong>".$str_datF." ".$nouvelleDateF."</strong><br/>";
							}
						?></p><?php
						//Ajouter la boucle de Wordpress avec la fonction the content au cas où il y aurait des informations complémentaires.
						$contenustage = $bdd->query('SELECT * FROM wp_posts WHERE ID = "'. $datedebut['post_id'] .'"');
						$contenuStage = $contenustage->fetch();
						echo '<p>'.$contenuStage['post_content'].'</p>';
						// récupération de la fiche du stage
						$fichestage = $bdd->query('SELECT * FROM wp_postmeta WHERE post_id = "'. $datedebut['post_id'] .'" AND meta_key="_cmb_fichestage" ');
						$donneesFiche = $fichestage->fetch();
						if($donneesFiche != ""){
							echo '<a href="' . $donneesFiche['meta_value'] . '" target="_blank" ><button type="button" class="btn btn-danger btn-cmc btn-cmc-red">Voir l\'affiche</button></a><br/>';
						}else{
						}
						?></div><div style="clear: both;"></div></div><?php 
						$i++;							
						
					}else{
						echo "";
					}
					
				} ?>
				
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
