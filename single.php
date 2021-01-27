<?php get_header();

debugToConsole('using my utils');

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
				<a class="metabox__blog-home-link" href="<?php echo site_url('/blog') ?>">
					<i class="fa fa-home" aria-hidden="true"></i>
					Back to blog home
				</a>
				<span class="metabox__main">
					Posted by <?php the_author_posts_link(); ?>
					on <?php the_date('n-j-Y'); ?>
					in <?php the_category($separator = ', '); ?>
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