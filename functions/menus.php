<?php

	// Register Navigation Menus
	function _register_menu() {
		register_nav_menu( 'solutions', __( 'Priorities Menu', 'vmw' ) );
		register_nav_menu( 'language', __( 'Language Menu', 'vmw' ) );
		register_nav_menu( 'icons', __( 'Top Icon Menu', 'vmw' ) );
		register_nav_menu( 'account', __( 'My Account', 'vmw' ) );
		register_nav_menu( 'social', __( 'Social Media', 'vmw' ) );
		register_nav_menu( 'footer', __( 'Footer Menu', 'vmw' ) );
		register_nav_menu( 'mobile-menu', __( 'Mobile Menu' ,'vmw' ) );
	}
	add_action( 'after_setup_theme', '_theme_setup' );

	function _theme_setup() {
		add_action( 'init', '_register_menu' );
		add_theme_support( 'menus' );
	}

	//Walker
	class F6_TOPBAR_MENU_WALKER extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"horizontal menu\" data-submenu>\n";
		}
	}

	//Optional fallback
	function f6_topbar_menu_fallback($args) {
		$walker_page = new Walker_Page();
		$fallback = $walker_page->walk(get_pages(), 0);
		$fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu horizontal" data-submenu>', $fallback);
		echo '<ul class="vertical medium-horizontal menu" data-dropdown-menu>'.$fallback.'</ul>';
	}

	//Walker
	class F6_OFFCANVAS_MENU_WALKER extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"nested vertical menu\">\n";
		}
	}

	//Optional fallback
	function f6_offcanvasr_menu_fallback($args) {
		$walker_page = new Walker_Page();
		$fallback = $walker_page->walk(get_pages(), 0);
		$fallback = str_replace("<ul class='nested vertical menu'>", '<ul class="nested vertical menu">', $fallback);
		echo '<ul class="nested vertical menu">'.$fallback.'</ul>';
	}

	add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
	function add_current_nav_class($classes, $item) {
		global $post;
		$current_post_type = get_post_type_object(get_post_type($post->ID));
		$current_post_type_slug = $current_post_type->rewrite['slug'];
		$menu_slug = strtolower(trim($item->url));
		if (strpos($menu_slug,$current_post_type_slug) !== false) {
		   //$classes[] = 'current-menu-item';
		}
		return $classes;
	}

	class F6_DRILL_MENU_WALKER extends Walker_Nav_Menu {
	    function start_lvl( &$output, $depth = 0, $args = array() ) {
	        $indent = str_repeat("\t", $depth);
	        $output .= "\n$indent<ul class=\"vertical menu\">\n";
	    }
	}

	function f6_drill_menu_fallback($args) {
	    $walker_page = new Walker_Page();
	    $fallback = $walker_page->walk(get_pages(), 0);
	    $fallback = str_replace("children", "children vertical menu", $fallback);
	    echo '<ul class="vertical menu">'.$fallback.'</ul>';
	}

	add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
	function add_admin_link($items, $args){
		if( $args->theme_location == 'account' ){
			if( current_user_can('author') || current_user_can('editor') || current_user_can('administrator') ) {
				$items .= '<li class="fas fa-cogs"><a href="' . get_admin_url() . '">' . __( 'Dashboard', 'vmw' ) . '</a></li>';
			}
			$items .= '<li class="fas fa-sign-out-alt"><a href="' . wp_logout_url( get_permalink() ) . '">' . __( 'Logout', 'vmw' ) . '</a></li>';
		}
	    return $items;
	}
