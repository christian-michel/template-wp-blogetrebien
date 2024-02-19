<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TA Portfolio
 */
?>

<div class="no-results not-found">
	
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ta-portfolio' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p>Il semble que nous ne trouvions pas ce que vous souhaitez. Peut-être devriez vous faire une autre recherche pour trouver.</p>

		<?php else : ?>

			<h2 class="stages-title" style="margin-bottom:30px;">Blog</h2>
			<p>Aucune réponse pour : <span style="font-style:italic;">"<?php echo (get_search_query()); ?>"</span></p>
			<p>Il semble que nous ne trouvions pas ce que vous souhaitez.<br/>Peut-être devriez vous faire une autre recherche pour trouver : </p>
			<div class="search-zone">
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/blog' ) ); ?>">
					<div>
						<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Rechercher des actualités..." />
						<button type="submit" id="searchsubmit" style="border:none;background:none;color:#999;margin-bottom:0px;padding:5px;padding-top:0px;border: none;" />
							<i class="fa fa-search" style="padding-bottom:5px;"></i>   
						</button>
						<input type="hidden" name="post_type" value="post">
						<script type="text/javascript">
							document.getElementById('s').value = '';
						</script>
					</div>
				</form>
			</div>
					

		<?php endif; ?>
	</div><!-- .page-content -->
</div><!-- .no-results -->
