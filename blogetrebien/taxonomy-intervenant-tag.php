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
				
	<section id="blog">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 homepage">
				<?php 
					single_tag_title();
				?>
				coucou
			</div>
			
			
			<div id="primary" class="col-sm-12">
				<main id="main" class="site-main" role="main">

				<?php $i = 1; ?>
				<style type="text/css">
				.ligne1 { background-color : #f1f1f1; }
				.ligne0 { background-color : #ffffff; }
				</style>
				
				<?php if ( have_posts() ) : ?>

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
								<p>
									<?php $terms = wp_get_post_terms( $post->ID, 'intervenant_tags', array( "fields" => "names" ) ); ?>
									Spécialité(s) : <strong><?php echo implode( '</strong>, <strong>',$terms ); ?></strong>
									<?php the_tags( 'Spécialité(s) : ', ', ', '' ); ?><br/>
									
									<!-- <?php $rental_features = the_terms( $post->ID, 'intervenant_tags','Spécialité(s) : <strong> ', '</strong>, <strong>', '</strong> ' );
									print_r( $rental_features ); ?><br/> -->
								</p>
								<a href="<?php the_permalink(); ?>" rel="bookmark"><button type="button" class="btn btn-danger btn-cmc btn-cmc-red"><?php _e( 'Voir +', 'ta-portfolio' ); ?></button></a>				
							</div>
							<div style="clear: both;"></div>
						</div>
					<?php $i++; ?>

					<?php endwhile; ?>

					<!-- <?php //ta_portfolio_paging_nav(); ?> -->
					<?php wp_pagenavi(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

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
