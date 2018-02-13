<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

</head>

<?php
	if( is_single() ){
		$terms = get_the_terms( $post->ID, 'priority');
		foreach ( $terms as $term ) {
			$termID[] = $term->term_id;
		}
		$translated_terms = pll_get_term_translations($termID[0]);
		$en_priority = $translated_terms[en];
		$en_term =  get_term($translated_terms[en], 'priority');
?>
<body <?php body_class( $en_term->slug ); ?> itemscope itemtype="http://schema.org/WebPage">
<?php
	} else {
?>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php
	}
?>

<!-- Site by Prydonian Digital https://prydonian.digital -->

<div class="off-canvas-wrapper" id="theWholePage">

	<div class="off-canvas position-right" id="languageSelector" data-off-canvas>
		<nav id="language" role="navigation">
			<?php
				wp_nav_menu(array(
					'container'			=> false,
					'menu'				=> __( 'Language Menu', 'vmw' ),
					'menu_class'		=> 'vertical menu',
					'theme_location'	=> 'language',
				    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				));
			?>
		</nav>
	</div>

	<div class="off-canvas position-right" id="prioritySelector" data-off-canvas>
		<nav id="language" role="navigation">
			<?php
				wp_nav_menu(array(
					'container'			=> false,
							'menu'				=> __( 'Priorities Menu', 'vmw' ),
					'menu_class'		=> 'vertical menu',
					'theme_location'	=> 'solutions',
				    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				));
			?>
		</nav>
	</div>

	<div class="off-canvas-content" data-off-canvas-content>

		<div data-sticky-container>

			<header role="banner" class="site-header sticky" data-sticky data-options="marginTop:0;" style="width:100%" >

				<div class="row expanded collapse">

					<div class="column shrink">

						<?php the_custom_logo(); ?>

					</div>

					<div class="column">

						<?php
							wp_nav_menu(array(
								'container'			=> false,
								'menu_id'			=> 'icons',
								'menu'				=> __( 'Icon Menu', 'vmw' ),
								'menu_class'		=> 'widget',
								'theme_location'	=> 'icons',
							    'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
							));
						?>
						<ul class="widget">
							<li class="hide-for-large"><a data-toggle="prioritySelector" title="<?php _e( 'Open Menu', 'vmw' ); ?>"><i class="fas fa-bars" aria-hidden="true"></i></a></li>
							<?php if( current_user_can( 'edit_post' ) && !is_front_page() && !is_home() && !is_archive() ) { ?>
							<li id="editMe"><a href="<?php echo admin_url() . 'post.php?post=' . $post->ID . '&action=edit'; ?>" title="<?php _e( 'Edit', 'vmw' ); ?>"><i class="far fa-edit"></i></a></li>
							<?php } ?>
							<li><a data-toggle="languageSelector" title="<?php _e( 'Choose Language', 'vmw' ); ?>" id="langShow"><i class="fas fa-globe"></i></a></li>
						</ul>

					</div>

				</div>

				<nav id="top" role="navigation" class="show-for-large">
					<?php
						wp_nav_menu(array(
							'container'			=> false,
							'menu'				=> __( 'Priorities Menu', 'vmw' ),
							'menu_class'		=> 'vertical medium-horizontal menu show-for-medium',
							'theme_location'	=> 'solutions',
							'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>',
						));
					?>
				</nav>

				<div class="site-border"></div>

			</header>

		</div>

		<div id="pageContent">

			<div id="social">
			<?php
				wp_nav_menu(array(
					'container'			=> false,
					'menu'				=> __( 'Social Media', 'vmw' ),
					'menu_class'		=> 'social menu',
					'theme_location'	=> 'social',
					'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
				));
			?>
			</div>
