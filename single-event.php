<?php get_header();

// custom wp_query? for posts of type event?

while (have_posts()) {
	the_post();
?>

	<!-- -----------------
					BANNER 
	--------------------- -->
	<div class="page-banner">
		<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);">
		</div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="container container--narrow page-section">


		<!-- -----------------
					META DATA 
		--------------------- -->
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					&nbsp;&nbsp;Back to All Events
				</a>
				<span class="metabox__main">
					<?php the_title(); ?>
				</span>
			</p>
		</div>

		<!-- -----------------
					CONTENT 
		--------------------- -->
		<div class="generic-content">
			<?php the_content(); ?>
		</div>
	</div>

<?php }
get_footer();
?>