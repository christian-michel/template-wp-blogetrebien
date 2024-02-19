<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package TA Portfolio
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer text-center" role="contentinfo">
		
		<!--
		<div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div>
                    <div class="footer-col col-md-4">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div>
                    <div class="footer-col col-md-4">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ( ta_option( 'custom_copyright' ) != '') : ?>
								<?php echo ta_option( 'custom_copyright' ); ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
		-->
		
		<div class="footer-below">
            <div class="container footer-container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <?php 
							$args = array(
								'theme_location' => 'footer',
								'container'      => false,							
								'menu_class'     => 'footer-menu',
								'menu_id'        => 'footer-menu',
								'items_wrap'     => '<ul class="col-xs-12 col-md-10 footer-menu">%3$s</ul>',
								'depth'          => 2,
								'walker'         => new wp_bootstrap_navwalker()
							);

							if ( has_nav_menu( 'footer' ) ) {
								wp_nav_menu( $args );
							}
						?>
						
						<?php
						// Retrieve a custom field value
						$twitterHandle = get_the_author_meta( 'twitter' ); 
						$fbHandle = get_the_author_meta( 'facebook' );
						$gHandle = get_the_author_meta( 'gplus' );
						?>
						<div class="col-xs-12 col-md-2">
							<ul>
								<li class="col-xs-12 col-md-6">
									<a href="https://www.facebook.com/blogetrebien.fr" target="_blank"><i class="fa fa-facebook fa-5x" aria-hidden="true" style="margin-top: 15px;" title="Visitez ma page Facebook"></i></a>
								</li>
								<li class="col-xs-12 col-md-6">
									<a href="https://www.youtube.com/channel/UC6nwDfpWQeVO_51-jSUN5yA" target="_blank"><i class="fa fa-youtube-play fa-3x" aria-hidden="true" style="margin-top: 26px;" title="Visitez la chaîne YouTube"></i></a>
								</li>
							</ul>
						</div>
                    </div>
                </div><!-- .row -->
            </div><!-- .container -->
        </div>
	</footer><!-- #colophon -->
	
	<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

</div><!-- #page -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php wp_footer(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26039543-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script>
document.getElementById('aweber_checkbox').checked = true;
document.getElementById('aweber_checkbox').style.display="none";
</script>

<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/video-responsive.js"></script>

</body>
</html>
