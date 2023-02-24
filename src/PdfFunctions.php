<?php

namespace PdfEmbed;

function aspect_ratio( $media ) {
	// Set some reasonable defaults
	$vars = array(
		'0.74/1', //average aspect ratio of Letter and A4 page sizes
		'width="592" height="800"', //same but in pixels
	);
	if ($media && $media->hasThumbnails() == TRUE) {
		//create stream options for file_get_contents so we don't wait for php.ini default timeout
		$stream_options = array(
			'http' => array( 
				'user_agent' => 'Mozilla/5.0',
				'timeout' => 2.5,
			)
		);
		$request = file_get_contents( $media->thumbnailUrl( 'large' ), FALSE , stream_context_create( $stream_options ));
		if ($request !== FALSE) {
			//use getimagesizefromsring() because getimagesize() does not support stream options
			$vars = getimagesizefromstring( $request );
			$vars = array(
				'' . round( $vars[0] / $vars[1],3 ) .'/1',
				$vars[3],
			);
		}
	}
	return $vars;
}