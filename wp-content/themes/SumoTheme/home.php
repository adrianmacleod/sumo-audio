<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>


<?php if ( is_active_sidebar( 'home_hero' ) ) : ?>
	<div id="homeHero">
		<?php dynamic_sidebar( 'home_hero' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

<div class="social col-xs-12">
	<div class="wrap">
		<img src="<?php bloginfo('template_url'); ?>/assets/images/twit.svg" />
		<img src="<?php bloginfo('template_url'); ?>/assets/images/fb.svg" />
		<img src="<?php bloginfo('template_url'); ?>/assets/images/insta.svg" />
	</div>
</div>

<h1>Shows</h1>

<div class = "categories row">

	<?php 
	// array of category IDs
	$categories =  array(10,9,8,7,6,5,4,3,2,1);

	//get first post from each category
	foreach ($categories as $cat) :
		$post = false;
		$post = get_posts('cat='.$cat.'&posts_per_page=1');
		if($post) :
			?>
			<div class="category col-xs-12 col-sm-6">
				<?php
					$post = $post[0];
					setup_postdata($post);
					?>
					<div class="cat-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php
					the_category();
					//get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
				?>
			</div>
			<?php
		endif;
	endforeach; 
	wp_reset_query();
	?>

</div><!-- /.categories -->



<?php the_posts_navigation(); ?>
