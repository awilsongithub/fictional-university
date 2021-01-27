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
