<?php
return [
    'file_renderers' => [
        'invokables' => [
            'pdf_embed' => 'PdfEmbed\PdfRenderer',
            'pdf_functions' => 'PdfEmbed\PdfFunctions',
        ],
        'aliases' => [
            'application/pdf' => 'pdf_embed',
            'pdf' => 'pdf_embed',
        ],
    ],
];
