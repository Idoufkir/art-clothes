<article>
	<div <?php post_class(); ?>>                    
		<div class="news-item row">
			<?php envo_multipurpose_thumb_img( 'envo-multipurpose-med', 'col-md-6' ); ?>
			<div class="news-text-wrap col-md-6">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				<?php envo_multipurpose_author_meta(); ?>

				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div><!-- .post-excerpt -->
				<div class="content-date-comments">
					<?php envo_multipurpose_widget_date_comments(); ?>
				</div>
			</div><!-- .news-text-wrap -->

		</div><!-- .news-item -->
	</div>
</article>
