<?php get_header(); ?>

<div class="large-8 medium-8 cell">	
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>
			<!-- TODO: should this become a template part so we can reuse it for single-post pages? -->
			<div class="post-container">
				<h3 class="post-title"><a href="<?=esc_url( get_permalink()) ?>"><?php the_title(); ?></a></h3>
				<div class="post-meta">
					<p><?=get_the_date() ?> &middot; <?=get_the_category_list( ',' ) ?> &middot; 1.5 hours</p>
					<!-- @TODO actual hours eg c2c_get_custom('hours') when plugin is done -->
				</div>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	
	
	<!-- <div class="primary callout">more content</div>

	<div class="primary callout">yet more content</div> -->
</div>

<div class="large-4 medium-4 cell">
	<div class="primary callout">content</div>
	
	<div class="primary callout">more content</div>
	
	<div class="primary callout">yet more content</div>
</div>

<?php get_footer();
