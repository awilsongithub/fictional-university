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
