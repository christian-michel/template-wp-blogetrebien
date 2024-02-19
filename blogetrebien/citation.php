<div class="citation-fond">
	<div class="container">
		<div class="row">
		
			<?php 


				$args = array( 
					'post_type' 	 => 'citation', 
					'posts_per_page' => '1',  
					'orderby' 		 => 'rand', 
				);

				// the query
				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 citation-block">
							<p class="citationAleatoire">Citation aléatoire</p>
							<h3 class="citation-text"><?php the_content(); ?></h3>
							<?php 
								$auteurCitation = get_post_meta( $post->ID, '_cmb_auteurCitation', true);
								
								if(isset($auteurCitation) && $auteurCitation==''){
									echo '<p class="citation-author">Auteur inconnu</p>';
								} else {
									echo '<p class="citation-author">'. $auteurCitation .'</p>'; 
								} 
							?>
							<!-- <p><strong><?php echo get_post_meta( $post->ID, '_cmb_auteurCitation', true); ?></strong></p> -->
						</div>

						<?php // $i++; ?>

					<?php endwhile; ?>
							
					<!-- end of the loop -->

					<?php wp_reset_postdata(); ?>

				<?php else : ?>
					</div>
						<p style="text-align: center;"><?php _e( 'Désolé, aucune citation n\'a été ajouté sur ce site.', 'ta-portfolio' ); ?></p>
					</div>
				<?php endif; ?>
		</div>
	</div>
</div>

<?php get_template_part( 'autorepondeur-citation', 'page' ); ?>
