<?php
/**
 * Template Name: Intervenant
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
					<h2 class="stages-title"><?php _e( 'Intervenants', 'ta-portfolio' ); ?></h2>
				</div>
				<p class="col-lg-12" style="margin-bottom: 60px;">
				Voici les intervenants réguliers sur le blog :
				</p>
				
				<?php $i = 1; ?>
				<style type="text/css">
				.ligne1 { background-color : #f1f1f1; }
				.ligne0 { background-color : #ffffff; }
				</style>

				<?php 
				
			
				$args = array( 
					'post_type' 	 => 'intervenant', 
					'posts_per_page' => -1, 
					'orderby' 		 => 'meta_value', 
					'order' 		 => 'ASC'
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
					<div class="col-xs-12 col-md-10">
						<a href="<?php echo get_permalink(); ?>"><h3 class="stages-title"><?php the_title(); ?></h3></a>

						<p>
							<?php $terms = wp_get_post_terms( $post->ID, 'intervenant_tags', array( "fields" => "names" ) ); ?>
							Spécialité(s) : <strong><?php echo implode( '</strong>, <strong>',$terms ); ?></strong>
							<?php the_tags( 'Spécialité(s) : ', ', ', '' ); ?><br/>
							
							<!-- <?php $rental_features = the_terms( $post->ID, 'intervenant_tags','Spécialté(s) : <strong> ', '</strong>, <strong>', '</strong> ' );
							print_r( $rental_features ); ?><br/> -->
						</p>
						
						<!-- <p><?php the_content(); ?></p> -->
						
						
						<a href="<?php echo get_permalink(); ?>"><button type="button" class="btn btn-danger btn-cmc btn-cmc-red"><?php _e( 'Voir +', 'ta-portfolio' ); ?></button></a>				
						
						
					</div>
					<div style="clear: both;"></div>
				</div>
				<?php $i++; ?>

					<?php endwhile; ?>

					<?php //wp_pagenavi(); ?>		
					<!-- end of the loop -->
					<?php //wp_reset_postdata(); ?>

					<?php else : ?>
						</div><p><?php _e( 'Aucun intervenant n\'est présent pour le moment. Revenez plus tard.', 'ta-portfolio' ); ?></p></div>
					<?php endif; ?>
				
			</div>
		</div>
	</section>

<?php get_footer(); ?>
