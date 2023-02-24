<?php

namespace PdfEmbed;

function aspectRatio( $media ) {
    $vars = [
        '0.74/1',
        'width="592" height="800"',
    ];
    if ($media && $media->hasThumbnails() == TRUE) {
        $stream_options = [
            'http' => [
                'user_agent' => 'Mozilla/5.0',
                'timeout'    => 2.5,
            ],
        ];
        $request = file_get_contents($media->thumbnailUrl('large'),FALSE,stream_context_create($stream_options));
        if ($request !== FALSE) {
            $vars = getimagesizefromstring($request);
            $vars = array(
                '' . round($vars[0] / $vars[1],3) .'/1',
                $vars[3],
            );
        }
    }
    return $vars;
}
