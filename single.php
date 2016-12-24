<?php get_header(); ?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<?php the_content();?>

				<?php
					if( get_field('post_name') ) { ?>
						<p><?php echo get_field('post_name');?></p>
					<?php }

					$image = get_field('post_image');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

					<?php
					$location = get_field('post_map');
					if( !empty($location) ): ?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
					<?php endif; ?>

			<?php endwhile; ?>
		</main>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer();
