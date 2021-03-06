<!-- start content container -->
<div class="row">      
	<?php if ( envo_multipurpose_is_preview() ) { ?>
		<article class="col-md-8">
		<?php } else { ?>
			<article class="col-md-<?php envo_multipurpose_main_content_width_columns(); ?>">
			<?php } ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                         
					<div <?php post_class(); ?>>
						<div class="single-head">
							<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
							<?php envo_multipurpose_widget_date_comments(); ?>
							<?php envo_multipurpose_author_meta(); ?>
						</div>
						<?php envo_multipurpose_thumb_img( 'envo-multipurpose-single', '', false, true ); ?>
						<div class="single-content">
							<div class="single-entry-summary">
								<?php do_action( 'envo_multipurpose_before_content' ); ?> 
								<?php the_content(); ?>
								<?php do_action( 'envo_multipurpose_after_content' ); ?> 
							</div><!-- .single-entry-summary -->
							<?php wp_link_pages(); ?>
							<?php envo_multipurpose_entry_footer(); ?>
						</div>
						<?php envo_multipurpose_prev_next_links(); ?>
						<?php 
						$authordesc = get_the_author_meta( 'description' );
						if ( ! empty ( $authordesc ) ) { 
							?>
							<div class="single-footer row">
								<div class="col-md-4">
									<?php get_template_part( 'template-parts/template-part', 'postauthor' ); ?>
								</div>
								<div class="col-md-8">
									<?php comments_template(); ?> 
								</div>
							</div>
						<?php } else { ?>
							<div class="single-footer">
								<?php comments_template(); ?> 
							</div>
						<?php } ?>
					</div>        
				<?php endwhile; ?>        
			<?php else : ?>            
				<?php get_template_part( 'content', 'none' ); ?>        
			<?php endif; ?>    
		</article> 
		<?php get_sidebar( 'right' ); ?>
</div>
<!-- end content container -->
