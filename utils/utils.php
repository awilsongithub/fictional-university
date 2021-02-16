<?php

function debugToConsole($msg)
{
	echo "<script>console.log(" . json_encode($msg) . ")</script>";
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
	$heading = $args['title'] ? $args['title'] : the_title();
	$sub_heading =  $args['subtitle'] ? $args['subtitle'] : get_field('page_banner_subtitle');

	$img_url = get_field('page_banner_background_image')['sizes']['pageBanner'];
	$bg_opacity = get_field('page_banner_background_image_opacity');
	$banner_div_styles = "background-image: url(" . $img_url . ");background-position:top;opacity:" . $bg_opacity .";"
	// drop out of php 
?>

	<div class="page-banner">
		<div class="page-banner__bg-image" style="<?php echo $banner_div_styles; ?>">
		</div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php echo $heading; ?></h1>
			<div class="page-banner__intro">
				<p><?php echo $sub_heading; ?></p>
			</div>
		</div>
	</div>

<?php // drop back into php 
}
