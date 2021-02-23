<?php

function debugToConsole($msg)
{
	echo "<script>console.log(" . json_encode($msg) . ")</script>";
}

function getHomePageEvents() {
	$homepageEvents = new WP_Query(array(
		'posts_per_page' => -1,
		'post_type' => 'event',
		'meta_key' => 'event_date',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_query' => noPastEvents()
	));
	wp_reset_postdata();
	return $homepageEvents;
}

function getPastEvents() {
	$pastEvents = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => onlyPastEvents()
	));
	wp_reset_postdata();
	return $pastEvents;
}

function getExcerpt($postObject)
{
	$excerpt = $postObject->post_excerpt;
	$trimmed = wp_trim_words($postObject->post_content, 18);

	if ($excerpt) {
		return $excerpt;
	} else {
		return $trimmed;
	}
}

function noPastEvents()
{
	$today = date('Ymd');

	return array(
		array(
			'key' => 'event_date',
			'compare' => '>=',
			'value' => $today,
			'type' => 'numeric'
		)
	);
}

function onlyPastEvents()
{
	$today = date('Ymd');

	return array(
		array(
			'key' => 'event_date',
			'compare' => '<',
			'value' => $today,
			'type' => 'numeric'
		)
	);
}

function pageBanner($args = NULL)
{
	if (!$args['title']) {
		$args['title'] = get_the_title();
	}

	if (!$args['subtitle']) {
		$args['subtitle'] = get_field('page_banner_subtitle');
	}

	if (!$args['photo']) {
		if (get_field('page_banner_background_image')) {
			$args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
		} else {
			$args['photo'] = get_theme_file_uri('/images/ocean.jpg');
		}
	}

	if (!$args['opacity']) {
		$args['opacity'] = get_field('page_banner_background_image_opacity');
	}

	$styles = "background-image: url({$args['photo']});background-position:top;opacity:{$args['opacity']};"
?>
	<!-- drop out of php -->

	<div class="page-banner">
		<div class="page-banner__bg-image" style="<?php echo $styles; ?>">
		</div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
			<div class="page-banner__intro">
				<p><?php echo $args['subtitle']; ?></p>
			</div>
		</div>
	</div>

<?php // drop into php 
}

// function getPostSnippetWithDate($postIsAnEvent = NULL)
// {
// 	$eventDate = null;

// 	if($postIsAnEvent) {
// 		$eventDate = new DateTime(get_field('event_date'));
// 	} else {
// 		$eventDate = null;
// 	}
// 	debugToConsole(the_time());
	
// 	$eventDate = new DateTime(get_field('event_date'));
// 	$month = $eventDate->format('M');
// 	$day = $eventDate->format('d');
// 	$link = get_the_permalink(); 
// 	$title = get_the_title();
// 	$excerpt = wp_trim_words(get_the_content(), 18);
// ?>

// 	<div class="event-summary">
// 		<a class="event-summary__date t-center" href="<?php echo $link; ?>">
// 			<span class="event-summary__month">
// 				<?php echo $month; ?>
// 			</span>
// 			<span class="event-summary__day">
// 				<?php echo $day; ?>
// 			</span>
// 		</a>
// 		<div class="event-summary__content">
// 			<h5 class="event-summary__title headline headline--tiny">
// 				<a href="<?php echo $link; ?>">
// 					<?php echo $title ?>
// 				</a>
// 			</h5>
// 			<p class="d-inline">
// 				<?php echo $excerpt; ?>
// 				<a href="<?php echo $link; ?>" class="nu gray"> Learn more</a>
// 			</p>
// 		</div>
// 	</div>

// <?php
// }
