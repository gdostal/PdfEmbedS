<?php
return [
    'file_renderers' => [
        'invokables' => [
            'pdf_embed' => 'PdfObjectEmbed\PdfRenderer',
        ],
        'aliases' => [
            'application/pdf' => 'pdf_embed',
            'pdf' => 'pdf_embed',
        ],
    ],
];
