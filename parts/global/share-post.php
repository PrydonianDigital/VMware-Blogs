<div class="sharer">
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="<?php _e( 'Share on Facebook', 'vmw' ); ?>"><i class="fab fa-facebook-square"></i></a>
	<a href="https://twitter.com/home?status=<?php the_title(); ?>%20<?php the_permalink(); ?>" target="_blank" title="<?php _e( 'Share on Twitter', 'vmw' ); ?>"><i class="fab fa-twitter-square"></i></a>
	<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php get_the_excerpt(); ?>&source=<?php echo bloginfo( 'url' ); ?>" target="_blank" title="<?php _e( 'Share on LinkedIn', 'vmw' ); ?>"><i class="fab fa-linkedin"></i></a>
</div>