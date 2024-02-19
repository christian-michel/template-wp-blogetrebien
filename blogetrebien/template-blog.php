<?php
/**
 * Template Name: Blog
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
				if ($url_courante == $url || $url_courante == $url_blog){ ?>
					<h2 class="stages-title">Blog</h2>
					<p>Apprenez à retrouver et à cultiver votre bien-être :</p>
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
				<?php } else { ?>
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
								<!-- <p>De <?php //the_author_posts_link(); ?></p> -->
								<p class="postmetadata"><?php _e( 'Catégorie : ' ); ?> <?php the_category( ', ' ); ?><!-- <br/>
								<?php //the_tags( 'Intervenants : <strong>', '</strong> et <strong>', '</strong>.' ); ?> --></p>
								
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
