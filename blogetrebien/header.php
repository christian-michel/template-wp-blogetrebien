<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package TA Portfolio
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php // $fav = ta_option( 'custom_favicon', false, 'url' ); ?>
<?php // if ( $fav !== '' ) { ?>
<!-- <link rel="icon" type="image/png" href="<?php echo ta_option( 'custom_favicon', false, 'url' ); ?>" /> -->
<?php //} ?>

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />

<meta name="description" content="Apprenez à créer et à améliorez votre bien-être par vos propres moyens : mode d'emploi !">
<meta name="keywords" content="Bien-être, tai-chi, qi gong, shiatsu, massages, sport, lyon, Caluire, 69, stages">

<!-- Bootstrap -->
<link href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" rel="stylesheet">

<!-- wow animation css -->
<link href="<?php bloginfo( 'template_url' ); ?>/css/animate.css" rel="stylesheet">
<script src="<?php bloginfo( 'template_url' ); ?>/js/wow.min.js"></script>
<script>
	new WOW(). init();
</script>

<div class="AW-Form-1895447114"></div>
<script type="text/javascript">(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//forms.aweber.com/form/14/1895447114.js";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "aweber-wjs-djuherqdt"));
</script>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

<link href="<?php bloginfo( 'template_url' ); ?>/style.css" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="sr-only" href="#content"><?php _e( 'Skip to content', 'ta-portfolio' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<nav role="navigation">
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<!-- Main navigation -->
				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'secondary' ) ) { ?>
				<!-- <div class="navbar-collapse collapse navbar-responsive-collapse"> -->
				<nav class="nav desktop defaut-nav-desktop">
					<?php if ( is_front_page() ) {
						$args = array(
							'theme_location' => 'primary',
							'container'      => false,							
							'menu_class'     => 'menu',
							'menu_id'        => 'menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'          => 2,
							'walker'         => new wp_bootstrap_navwalker()
						);

						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu( $args );
						}
					} else {
						$args = array(
							'theme_location' => 'secondary',
							'container'      => false,							
							'menu_class'     => 'menu',
							'menu_id'        => 'menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'          => 2,
							'walker'         => new wp_bootstrap_navwalker()
						);

						if ( has_nav_menu( 'secondary' ) ) {
							wp_nav_menu( $args );
						}
					} ?>
				<!-- </div> -->
				</nav>
				
				<nav class="row col-xs-12 nav mobile">
					<?php if ( is_front_page() ) {
						$args = array(
							'theme_location' => 'primary',
							'container'      => false,							
							'menu_class'     => 'menu',
							'menu_id'        => 'menu',
							'items_wrap'     => '<ul class="menu" id="menuMobile">%3$s</ul>',
							'depth'          => 2,
							'walker'         => new wp_bootstrap_navwalker()
						);

						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu( $args );
						}
					} else {
						$args = array(
							'theme_location' => 'secondary',
							'container'      => false,							
							'menu_class'     => 'menu',
							'menu_id'        => 'menu',
							'items_wrap'     => '<ul class="menu" id="menuMobile">%3$s</ul>',
							'depth'          => 2,
							'walker'         => new wp_bootstrap_navwalker()
						);

						if ( has_nav_menu( 'secondary' ) ) {
							wp_nav_menu( $args );
						}
					} ?>
				<!-- </div> -->
				</nav>
				<?php } ?>
				<!-- End main navigation -->
				
				<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
				<div class="navbar-header page-scroll">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( bloginfo( 'name' ) ); ?>" rel="homepage"><img class="header-logo" src="<?php bloginfo('template_directory'); ?>/img/logo-header.png" alt="<?php bloginfo( 'name' ) ?>"></a>
				</div>
				
				<!-- réseaux sociaux uniquement sur la partie desktop -->
			</div>
		</div>           
	</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
