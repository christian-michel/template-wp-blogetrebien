<?php
/**
 * The template for displaying all single posts.
 *
 * @package TA Portfolio
 */

get_header(); ?>

	
	<?php get_template_part( 'citation', 'page' ); ?>
				
	<div class="container">
		<div class="row">
			<div id="primary" class="col-sm-12 col-md-8 col-lg-8">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content-single', 'single' ); ?>
					
					<div class="AW-Form-990203236"></div>
					<script type="text/javascript">(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//forms.aweber.com/form/36/990203236.js";
						fjs.parentNode.insertBefore(js, fjs);
						}(document, "script", "aweber-wjs-cbai5fgh6"));
					</script>

					<?php ta_portfolio_post_nav(); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
					<?php //comments_template( '/inc/comments.php', true );     ?>

				<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>