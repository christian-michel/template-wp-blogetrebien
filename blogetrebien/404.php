<?php
/**
 * Template Name: 404
 * @package TA Portfolio
 */

get_header(); ?>

	
	<?php get_template_part( 'citation', 'page' ); ?>
				
	<section id="blog">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 homepage">
				<h2 class="stages-title">Introuvable</h2>
			</div>
			
			<div id="primary" class="col-sm-12">
				<main id="main" class="site-main" role="main">

						<div class="col-lg-12 erreur404" >
							<div class="AW-Form-701568732"></div>
							<script type="text/javascript">(function(d, s, id) {
							    var js, fjs = d.getElementsByTagName(s)[0];
							    if (d.getElementById(id)) return;
							    js = d.createElement(s); js.id = id;
							    js.src = "//forms.aweber.com/form/32/701568732.js";
							    fjs.parentNode.insertBefore(js, fjs);
							    }(document, "script", "aweber-wjs-iqg7pywbl"));
							</script>
						</div>

				</main><!-- #main -->
			</div><!-- #primary -->
			
			<div class="col-lg-12 homepage">
				<p>Erreur 404 : veuillez saisir une autre requête svp :</p>
			</div>
			
			<div id="primary" class="col-sm-12">
				<main id="main" class="site-main" role="main">

						<div class="col-lg-12" >
							<form method="get" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-12">
										<div class="input-group">
											<input type="text" class="form-control search-query" name="s" placeholder="<?php esc_attr_e( 'search here &hellip;', 'ta-portfolio' ); ?>" />
											<span class="input-group-btn">
												<button type="submit" name="submit" id="searchsubmit" class="btn btn-cmc btn-cmc-red btn-cmc-search-field" value="<?php esc_attr_e( 'search', 'ta-portfolio' ); ?>"><?php _e( 'Search', 'ta-portfolio' ); ?></button>
											</span>
										</div>
									</div>
								</div>
							</form>
						</div>

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
