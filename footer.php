		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="site-border"></div>

			<div class="row expanded align-middle collapse">

				<div class="small-12 medium-expand columns shrink text-center show-for-medium">

					<?php the_custom_logo(); ?>

				</div>

				<div class="small-12 medium-expand columns text-center show-for-small-only">

					<?php the_custom_logo(); ?>

				</div>

				<div class="small-12 medium-expand columns show-for-medium">

					&copy; <?php echo date( 'Y' ); ?> <?php echo get_bloginfo( 'title' ); ?>

				</div>
				<div class="small-12 medium-expand columns text-center show-for-small-only">

					&copy; <?php echo date( 'Y' ); ?> <?php echo get_bloginfo( 'title' ); ?>

				</div>

				<div class="small-12 medium-expand columns">

					<nav id="footer" role="navigation">
						<?php
							wp_nav_menu(array(
								'container'			=> false,
								'menu'				=> __( 'Footer Menu', 'vmw' ),
								'menu_class'		=> 'vertical medium-horizontal menu',
								'theme_location'	=> 'footer',
								'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
							));
						?>
					</nav>

				</div>

			</div>

		</footer>

		<div data-sticky-container id="cookies">
			<div class="row align-middle" data-sticky data-stick-to="bottom" data-margin-bottom="0">
				<div class="cookies column">
					<?php
						$privacy = pll_get_post_translations( '133' );
						$cookies = get_post($privacy[pll_current_language()]);
					?>
					<?php _e( 'This site uses cookies to improve the user experience. By using this site you agree to the ', 'vmw' ); ?><a href="<?php echo get_bloginfo( 'url' ); ?>/<?php echo $cookies->post_name; ?>" rel="nofollow"><?php _e( 'privacy policy', 'vmw' ); ?></a>
				</div>
				<div class="cookies column text-right">
					<a class="button" id="removeCookies" href="#cookie_dismiss"><i class="fas fa-times"></i></a>
				</div>
			</div>
		</div>

	</div>

</div>

<a id="toTop" data-smooth-scroll href="#theWholePage" title="<?php _e( 'Back to top of page', 'vmw' ); ?>">
	<i class="fas fa-chevron-up"></i>
</a>

<?php wp_footer(); ?>

</body>
</html>