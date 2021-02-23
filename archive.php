<?php
get_header();
pageBanner(array(
	'title' => get_the_archive_title(),
	'subtitle' => get_the_archive_description()
));
?>

<div class="container container--narrow page-section">
	<?php while (have_posts()) : the_post();
		$title = get_the_title();
		$author = get_the_author_posts_link();
		$date = get_the_date('n-j-Y'); 
		$categories = get_the_category($separator = ', ');
		$link =  get_the_permalink();
	?>
		<div class="post-item">
			<h2 class="headline headline--medium headline--post-title">
				<a href="<?php echo $link ?>"><?php echo $title ?></a>
			</h2>
			<div class="metabox">
				<p>Posted by <?php echo $author ?> on <?php echo $date ?> in <?php echo $categories ?></p>
			</div>
			<div class="generic-content">
				<?php the_excerpt(); ?>
				<p><a class="btn btn--blue" href="<?php echo $link ?>">Continue reading &raquo;</a></p>
			</div>
		</div>
	<?php endwhile;
	echo paginate_links(); ?>
</div>

<?php get_footer(); ?>