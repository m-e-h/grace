<?php
/**
 * The header.
 *
 *
 * @package Kit
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <?php wp_head(); ?>
  </head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div id="container" class="site-container">

		<div class="skip-link">
			<a href="#content" class="screen-reader-text"><?php _e( 'Skip to content', 'abraham' ); ?></a>
		</div><!-- .skip-link -->

		<?php hybrid_get_menu( 'primary' ); ?>

					<?php if ( get_header_image() ) : ?>

				<img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />

			<?php endif; // End check for header image. ?>

		<div class="wrap content-wrap">

			<header <?php hybrid_attr( 'header' ); ?>>

				<?php if ( display_header_text() ) : ?>

					<div <?php hybrid_attr( 'branding' ); ?>>

						<?php if ( get_theme_mod( 'logo', false ) ) {
								echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo" rel="home"><img src="' . esc_url( get_theme_mod( 'logo' ) ) . '"></a>';
						}?>
						<div class="title-wrap">
							<?php hybrid_site_title(); ?>
							<?php hybrid_site_description(); ?>
						</div>
					</div><!-- #branding -->

				<?php endif; // End check for header text. ?>

				<?php hybrid_get_menu( 'secondary' ); ?>

			</header><!-- #header -->


			<div id="main" class="site-main">

				<?php hybrid_get_menu( 'breadcrumbs' ); ?>
