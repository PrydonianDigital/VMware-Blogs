<?php

	// Set content width value based on the theme's design
	if ( ! isset( $content_width ) )
		$content_width = 1000;

	// Register Theme Features
	function vmw_theme()  {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'blogthumb', 490, 276, array( 'center', 'center') );
		add_image_size( 'header', 1000, 563, array( 'center', 'center') );
		add_image_size( 'carousel', 1680, 550, array( 'center', 'center') );
		add_theme_support( 'post-formats', array( 'video', 'aside', 'status', 'link' ) );
		add_image_size( 'client', 150, 150 );
		show_admin_bar( false );
		add_editor_style( 'css/editor.css' );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'start_post_rel_link' );
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		add_role('subscriber',
			__( 'Subscriber' ),
			array(
				'read'				=> true,
				'create_posts'		=> false,
				'edit_posts'		=> false,
				'edit_others_posts'	=> false,
				'publish_posts'		=> false,
				'manage_categories'	=> false,
				)
		);
		add_role('contributor',
			__( 'Contributor' ),
			array(
				'read'				=> true,
				'create_posts'		=> true,
				'edit_posts'		=> true,
				'edit_others_posts'	=> false,
				'publish_posts'		=> true,
				'manage_categories'	=> false,
				)
		);
		add_theme_support( 'custom-logo', array(
			'width'		=> 200,
			'height'	=> 30,
			'flex-width' => true,
		) );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );
		load_theme_textdomain( 'vmw', get_template_directory() . '/languages' );
		add_filter( 'searchwp_missing_integration_notices', '__return_false' );
	}
	add_action( 'after_setup_theme', 'vmw_theme' );

	// Register Style
	function vmw_css() {
		wp_register_style( 'vmwcss', get_template_directory_uri() . '/css/vmware.css', false, '6.3.1' );
		wp_register_style( 'base', get_template_directory_uri() . '/css/base.css', false, '6.3.1' );
		wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css', false, '3.5.2' );
		wp_register_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', false, '6.3.1' );
		wp_register_style( 'owl', get_template_directory_uri() . '/css/owl.css', false, '2.2.1' );
		wp_register_style( 'fontawesome', '//use.fontawesome.com/releases/v5.0.6/css/all.css', false, '5.0.6' );
		wp_register_style( 'owltheme', get_template_directory_uri() . '/css/owl.theme.css', false, '2.2.1' );
		wp_enqueue_style( 'animate' );
		wp_enqueue_style( 'fontawesome' );
		wp_enqueue_style( 'fonts' );
		wp_enqueue_style( 'vmwcss' );
		wp_enqueue_style( 'base' );
	}
	add_action( 'wp_enqueue_scripts', 'vmw_css' );

	// Register JS
	function vmw_js() {
		wp_enqueue_script( 'what', get_template_directory_uri() . '/js/vendor/what-input.js', false, '6.3.1', true );
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/vendor/vmware.min.js', false, '6.3.1', true );
		wp_enqueue_script( 'cookies', get_template_directory_uri() . '/js/vendor/cookies.js', false, '2.2.1', true );
		wp_enqueue_script( 'owljs', get_template_directory_uri() . '/js/vendor/owl.js', false, '2.2.1', true );
		wp_enqueue_script( 'vmw', get_template_directory_uri() . '/js/vmware.js', false, '1.5', true );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'what' );
		wp_enqueue_script( 'foundation' );
		wp_enqueue_script( 'cookies' );
		wp_enqueue_script( 'vmw' );
	}
	add_action( 'wp_enqueue_scripts', 'vmw_js' );

	function owl_carousel() {
		if ( is_front_page() && is_home() ) {
			wp_enqueue_style( 'owl' );
			wp_enqueue_style( 'owltheme' );
			wp_enqueue_script( 'owljs' );
		}
	}
	add_action('wp_enqueue_scripts', 'owl_carousel');

	// Add Menu Order to posts
	add_action( 'admin_init', 'vmw_post_ordering' );
	function vmw_post_ordering() {
		add_post_type_support( 'post', 'page-attributes' );
	}

	// Rename Aside to White Paper
	function rename_post_formats($translation, $text, $context, $domain) {
		$names = array(
			'Aside'		=> 'White Paper',
			'Status'	=> 'Event',
			'Link'	=> 'Hands-On Lab'
		);
		if ($context == 'Post format') {
			$translation = str_replace(array_keys($names), array_values($names), $text);
		}
		return $translation;
	}
	add_filter('gettext_with_context', 'rename_post_formats', 10, 4);

	// Wrap oembeds
	function vnmFunctionality_embedWrapper($html, $url, $attr, $post_id) {
		return '<div class="responsive-embed widescreen">' . $html . '</div>';
	}

	add_filter('embed_oembed_html', 'vnmFunctionality_embedWrapper', 10, 4);

	// count post views for trending
	function vmw_set_post_views($postID) {
		$count_key = 'vmw_post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	function vmw_get_post_views($postID){
	    $count_key = 'vmw_post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 View";
	    }
	    return $count.' Views';
	}

	function vmw_track_post_views ($post_id) {
		if ( !is_single() ) return;
		if ( empty ( $post_id) ) {
			global $post;
			$post_id = $post->ID;
		}
		vmw_set_post_views($post_id);
	}
	add_action( 'wp_head', 'vmw_track_post_views');

	// Taxonomy in body class
	function section_taxonomy_in_body_class( $classes ){
		if( is_singular() ) {
			global $post;
			$custom_terms = get_the_terms($post->ID, 'priority');
			if ($custom_terms) {
				foreach ($custom_terms as $custom_term) {
					$classes[] = $custom_term->slug;
				}
			}
		}
		return $classes;
	}
	add_filter( 'body_class', 'section_taxonomy_in_body_class' );

	// Page slug to body class
	function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		}
		return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );

	// Pagination
	function vmw_pagination($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		echo $before.'<ul class="pagination text-center" role="navigation" aria-label="'. __( 'Pagination', 'vmw' ) . '">'."";
		if ($start_page >= 2 && $pages_to_show < $max_page) {
			$first_page_text = __( 'First', 'vmw' );
			echo '<li><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
		}
		echo '<li>';
		previous_posts_link( __( 'Previous', 'vmw' ) );
		echo '</li>';
		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="current"> '.$i.' </li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}
		echo '<li>';
		next_posts_link( __( 'Next', 'vmw' ), 0 );
		echo '</li>';
		if ($end_page < $max_page) {
			$last_page_text = __('Last');
			echo '<li><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
		}
		echo '</ul>'.$after."";
	}

	// Comments
	function vmw_comment($comment, $args, $depth) {

	   $GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

			<div class="row align-middle">

				<div class="column shrink hide-for-small-only">

					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>

				</div>

				<div class="column">

					<div class="callout">

						<h5><?php printf( __('%s'), get_comment_author() ) ?>  <small><?php comment_date('d/m/Y'); ?></small></h5>

						<?php if ( $comment->comment_approved == '0' ) : ?>

							<p><em><?php _e( 'Your comment is awaiting moderation.', 'vmw' ); ?></em></p>

						<?php endif; ?>

						<?php comment_text(); ?>

						<div class="reply">

							<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

						</div>

					</div>

				</div>

			</div>


	<?php }

	function vmw_disable_comment_url($fields) {
		unset($fields['url']);
		return $fields;
	}
	add_filter('comment_form_default_fields','vmw_disable_comment_url');


	add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );
	function my_add_cpt_to_dashboard() {
		// Custom post types counts
		$post_types = get_post_types( array( '_builtin' => false ), 'objects' );
		foreach ( $post_types as $post_type ) {
			if($post_type->show_in_menu==false) {
				continue;
			}
			$num_posts = wp_count_posts( $post_type->name );
			$num = number_format_i18n( $num_posts->publish );
			$text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
			if ( current_user_can( 'edit_posts' ) ) {
				$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
			}
			echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
		}
	}

	function add_menu_icons_styles(){
		echo '<style>
		@import url("//use.fontawesome.com/releases/v5.0.6/css/all.css");
		.pll_icon_edit {
			display: none !important;
		}
		#adminmenu #menu-posts-carousel div.wp-menu-image:before, #dashboard_right_now .carousel-count a:before {
			content: "\f233";
		}
		#adminmenu #menu-posts-location div.wp-menu-image:before, #dashboard_right_now .location-count a:before {
			content: "\f512";
		}
		.post-format-icon.post-format-video:before, .post-state-format.post-format-video:before, a.post-state-format.format-video:before {
			font-family: "Font Awesome 5 Free" !important;
			content: "\f1c8";
			text-align: center;
		}
		.post-format-icon.post-format-link:before, .post-state-format.post-format-link:before, a.post-state-format.format-link:before {
			font-family: "Font Awesome 5 Free" !important;
			content: "\f0c3";
			text-align: center;
		}
		.post-format-icon.post-format-aside:before, .post-state-format.post-format-aside:before, a.post-state-format.format-aside:before {
			font-family: "Font Awesome 5 Free" !important;
			content: "\f019";
			text-align: center;
		}
		.post-format-icon.post-format-status:before, .post-state-format.post-format-status:before, a.post-state-format.format-status:before {
			font-family: "Font Awesome 5 Free" !important;
			content: "\f073";
			text-align: center;
		}
		</style>';
	}
	add_action( 'admin_head', 'add_menu_icons_styles' );

	// SearchWP fuzzy matching length
	function vmw_fuzzy_word_length() {
		return 3;
	}
	add_filter( 'searchwp_fuzzy_min_length', 'vmw_fuzzy_word_length' );

	// Post Format script
	function vmw_post_format_switcher( $hook ) {
		global $post;
		if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
			wp_enqueue_script(  'myscript', get_stylesheet_directory_uri().'/js/post-formats.js' );
		}
	}
	add_action( 'admin_enqueue_scripts', 'vmw_post_format_switcher', 10, 1 );

	// Email template
	add_filter('mailtpl/customizer_template', function(){
		return get_stylesheet_directory() . '/emails/templates/vmware.php';
	});

	// Word Count
	function vmw_post_word_count()	{
	    global $post;
	    $char_list = '';
	    echo str_word_count(strip_tags($post->post_content), 0, $char_list);
	}

	// Show tags with/without links
	function comma_tags($tags, $show_links = true) {
		if($tags) {
			$t = array();
			foreach($tags as $tag) {
				$t[] = (!$show_links) ? $tag->name : '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
			}
			return implode(", ", $t);
		} else {
			return false;
		}
	}

	// Post Reading Time
	function prefix_estimated_reading_time( $content = '', $wpm = 300 ) {
		$clean_content = strip_shortcodes( $content );
		$clean_content = strip_tags( $clean_content );
		$word_count = str_word_count( $clean_content );
		$time = ceil( $word_count / $wpm );
		return $time;
	}

	// Show Excerpt by default
	add_filter('default_hidden_meta_boxes', 'show_hidden_meta_boxes', 10, 2);
	function show_hidden_meta_boxes($hidden, $screen) {
	    if ( 'post' == $screen->base ) {
	        foreach($hidden as $key=>$value) {
	            if ('postexcerpt' == $value) {
	                unset($hidden[$key]);
	                break;
	            }
	        }
	    }

	    return $hidden;
	}

	// Custom Login
	function my_custom_login() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/login.css" />';
	}
	add_action('login_head', 'my_custom_login');

	function my_login_logo_url() {
		return get_bloginfo( 'url' );
	}
	add_filter( 'login_headerurl', 'my_login_logo_url' );

	function my_login_logo_url_title() {
		return get_bloginfo( 'name' );
	}
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );

	add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
	function remove_wp_logo( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'wp-logo' );
	}

	function remove_footer_admin () {
		echo '&copy; '. date('Y') . ' VMware.';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');

	// Custom Dashboard
	function disable_default_dashboard_widgets() {
		remove_action('welcome_panel', 'wp_welcome_panel');
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
		remove_meta_box('dashboard_plugins', 'dashboard', 'core');
		remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
		remove_meta_box('dashboard_primary', 'dashboard', 'core');
		remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	}
	add_action('admin_menu', 'disable_default_dashboard_widgets');

	// Remove Language Columns
	add_action('admin_head', 'vmw_remove_language_columns');
	function vmw_remove_language_columns() {
		echo '<style>
			th[class*=column-language] { font-size: 0 !important; width: 0 !important; padding: 0 !important; }
			th[class*=column-language] img { font-size: 0 !important; width: 0 !important; padding: 0 !important; }
			td[class*=column-language] .pll_icon_add:before { font-size: 0 !important; width: 0 !important; padding: 0 !important; }
			td[class*=column-language] .pll_icon_tick:before { font-size: 0 !important; width: 0 !important; padding: 0 !important; }
			td[class*=column-language] { font-size: 0 !important; width: 0 !important; padding: 0 !important; }
		</style>';
	}

	// PDF filter
	function modify_post_mime_types( $post_mime_types ) {
		$post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
		return $post_mime_types;
	}
	add_filter( 'post_mime_types', 'modify_post_mime_types' );

	$post_format_base = apply_filters( 'post_format_rewrite_base', 'type' );
	add_filter( 'post_format_rewrite_base', 'my_post_format_rewrite_base' );

	function my_post_format_rewrite_base( $slug ) {
		return 'type';
	}
	function my_get_post_format_slugs() {
		$slugs = array(
			'aside'		=> 'whitepaper',
			'link'		=> 'hands-on-lab',
			'status'	=> 'vmworld-event',
			'video'		=> 'video'
		);
		return $slugs;
	}
	remove_filter( 'request', '_post_format_request' );
	add_filter( 'request', 'my_post_format_request' );
	function my_post_format_request( $qvs ) {
		if ( !isset( $qvs['post_format'] ) )
			return $qvs;
		$slugs = array_flip( my_get_post_format_slugs() );
		if ( isset( $slugs[ $qvs['post_format'] ] ) )
			$qvs['post_format'] = 'post-format-' . $slugs[ $qvs['post_format'] ];
		$tax = get_taxonomy( 'post_format' );
		if ( !is_admin() )
			$qvs['post_type'] = $tax->object_type;
		return $qvs;
	}