<?php
get_header();

while (have_posts()) : the_post();
	$parentId   = wp_get_post_parent_id(get_the_ID());
	pageBanner(array());
?>



	<div class="container container--narrow page-section">

		<?php if ($parentId) : ?>
			<div class="metabox metabox--position-up metabox--with-home-link">
				<p>
					<a class="metabox__blog-home-link" href="<?php echo get_permalink($parentId) ?>"><i class="fa fa-home" aria-hidden="true"></i>
						Back to <?php echo get_the_title($parentId) ?></a>
					<span class="metabox__main"><?php the_title(); ?></span>
				</p>
			</div>
		<?php endif; ?>

		<?php
		$testArray = get_pages(array(
			'child_of' => get_the_ID()
		));
		?>

		<?php if ($parentId or $testArray) : ?>

			<div class="page-links">

				<h2 class="page-links__title">
					<a href="<?php echo get_permalink($parentId) ?>">
						<?php echo get_the_title($parentId) ?>
					</a>
				</h2>

				<ul class="min-list">
					<?php
					if ($parentId) :
						$findChildrenOf = $parentId;
					else :
						$findChildrenOf = get_the_ID();
					endif;
					$pageListOptions = array(
						'title_li' => NULL,
						'child_of' => $findChildrenOf,
						'sort_column' => 'menu_order'
					);
					wp_list_pages($pageListOptions);
					?>
				</ul>
			</div>
		<?php endif; ?>

		<div class="generic-content">
			<?php the_content(); ?>
		</div>

	</div>

<?php endwhile; ?>
<?php get_footer(); ?>