<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TA Portfolio
 */

get_header(); ?>

	
	<?php get_template_part( 'citation', 'page' ); ?>
	
	<?php // get_template_part( 'sondage', 'page' ); ?>
				
	<section id="blog">
	<div class="container">
		<div class="row">
			<?php $i = 1; ?>
			<style type="text/css">
			.ligne1 { background-color : #f1f1f1; }
			.ligne0 { background-color : #ffffff; }
			</style>
			
			<?php if ( have_posts() ) : ?>
				
			<div class="col-lg-12 homepage">
				<?php 
				$url = "blogetrebien.fr/";
				$url_blog = "blogetrebien.fr/blog/";
				$url_courante = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				//echo "<div>". $url_courante ."</div>";

				$str = $url_courante;
				$pattern = "/blogetrebien.fr\/intervenant-tag/i";
				$pattern2 = "/blogetrebien.fr\/page/i";
				$intervenant_tag = preg_match($pattern, $str); // Outputs 1 
				$page_blog = preg_match($pattern2, $str); // Outputs 1

				if ($url_courante == $url || $url_courante == $url_blog){ ?>
					<h2 class="stages-title">Blog</h2>
					<p>Un blog pour apprendre à retrouver et à cultiver son bien-être :</p>
					<div class="search-zone">
						<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/blog' ) ); ?>">
							<div>
								<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
								<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Rechercher une actualité..." class="searchInput" />
								<button type="submit" id="searchsubmit" class="searchButton" />
									<i class="fa fa-search" style="padding-bottom:5px;"></i>   
								</button>
								<input type="hidden" name="post_type" value="post">
								<script type="text/javascript">
									document.getElementById('s').value = '';
								</script>
							</div>
						</form>
					</div>
				<?php } elseif($page_blog == 1) { ?>
					<h2 class="stages-title">Blog</h2>
					<p>Un blog pour apprendre à retrouver et à cultiver son bien-être :</p>
					<div class="search-zone">
						<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/blog' ) ); ?>">
							<div>
								<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
								<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Rechercher une actualité..." class="searchInput" />
								<button type="submit" id="searchsubmit" class="searchButton" />
									<i class="fa fa-search" style="padding-bottom:5px;"></i>   
								</button>
								<input type="hidden" name="post_type" value="post">
								<script type="text/javascript">
									document.getElementById('s').value = '';
								</script>
							</div>
						</form>
					</div>
				<?php } elseif($intervenant_tag == 1) { ?>
					<h2 class="stages-title">Intervenants</h2>
				<?php }  else { ?>
					<h2 class="stages-title">Blog</h2>
					<p>Résultat de recherche pour : <span style="font-style:italic;">"<?php echo (get_search_query()); ?>"</span></p>
					<div class="search-zone">
						<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/blog' ) ); ?>">
							<div>
								<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
								<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Rechercher une actualité..." class="searchInput" />
								<button type="submit" id="searchsubmit" class="searchButton" />
									<i class="fa fa-search" style="padding-bottom:5px;"></i>   
								</button>
								<input type="hidden" name="post_type" value="post">
								<script type="text/javascript">
									document.getElementById('s').value = '';
								</script>
							</div>
						</form>
					</div>
				<?php } ?>
			</div>
			
			<div id="primary" class="col-sm-12">
				<main id="main" class="site-main" role="main">

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<div class="col-lg-12 ligne ligne<?php echo ($i % 2); ?>" >
							<div class="col-xs-12 col-md-2 ">
								<div style="max-width: 150px; padding: 8px; margin-top: 10px;"><?php
									if ( get_post_gallery() ) {
										echo get_post_gallery();
									} elseif ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
								?></div>
							</div>
							<div class="col-xs-12 col-md-10">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><h3 class="stages-title"><?php the_title(); ?></h3></a>
								<?php 
								
								$mon_url_courante = 'https://'. $url_courante;
								$findme = 'intervenant-tag';
								$pos = strpos($mon_url_courante, $findme); // https://monUrl.com/intervenant-tag === true ?
								
								if($pos != null){ // si mon url courante a intervenant-tag, je split
									$split = explode('/', $mon_url_courante, -1);
									$before =  get_bloginfo('url') .'/'. $split[3]; // le numéro du split peut changer d'un site à l'autre
									if ('https://blogetrebien.fr/intervenant-tag' == $before){ // MODIFIER URL 
										$product_terms = wp_get_object_terms( $post->ID, 'intervenant_tags', array( "fields" => "all" ) );
										$c = 0;
										$d = 0;

										//echo "<h3 class="stages-title">Spécialité ' . esc_html( $t->name ) . '</h3>"; // Ajouter un titre
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
									} else { ?>
										<!-- <p>De <?php //the_author_posts_link(); ?></p> -->
										<p class="postmetadata"><?php _e( 'Catégorie : ' ); ?> <?php the_category( ', ' ); ?><!-- <br/>
										<?php //the_tags( 'Intervenants : <strong>', '</strong> et <strong>', '</strong>.' ); ?> --></p>
									<?php } ?>
								<?php } else { ?>
									<!-- <p>De <?php //the_author_posts_link(); ?></p> -->
									<p class="postmetadata"><?php _e( 'Catégorie : ' ); ?> <?php the_category( ', ' ); ?><!-- <br/>
									<?php //the_tags( 'Intervenants : <strong>', '</strong> et <strong>', '</strong>.' ); ?> --></p>
								<?php } ?>
								
								<a href="<?php the_permalink(); ?>" rel="bookmark"><button type="button" class="btn btn-danger btn-cmc btn-cmc-red"><?php _e( 'Voir +', 'ta-portfolio' ); ?></button></a>				
							</div>
							<div style="clear: both;"></div>
						</div>
					<?php $i++; ?>

					<?php endwhile; ?>

					<!-- <?php //ta_portfolio_paging_nav(); ?> -->
					<?php wp_pagenavi(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'noneblog' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		<div><!-- .row -->
	</div>
	</section>
	
	<!--<div class="presentation-commerciale">
		<div class="container">
			<div class="row">
				<?php get_template_part( 'presentationco', 'page' ); ?>
			</div>
		</div>
	</div> -->

<?php get_footer(); ?>
