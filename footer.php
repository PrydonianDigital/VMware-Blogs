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

	</div>

</div>

<a id="toTop" data-smooth-scroll href="#theWholePage" title="<?php _e( 'Back to top of page', 'vmw' ); ?>">
	<i class="fas fa-chevron-up"></i>
</a>

<?php wp_footer(); ?>

</body>
</html>