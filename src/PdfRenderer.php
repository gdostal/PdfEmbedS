<?php

namespace PdfEmbed;

use Omeka\Api\Representation\MediaRepresentation;
use Omeka\Media\FileRenderer\RendererInterface;
use Zend\View\Renderer\PhpRenderer;

class PdfRenderer implements RendererInterface
{
    public function render(PhpRenderer $view, MediaRepresentation $media, array $options = [])
    {
        $html = '<div class="object-embed" style="--aspect-ratio: 0.75/1;"><object data="%s" width="563" height="750" %s></object></div>';
        $data = $view->escapeHtml( $media->originalUrl() );
        !empty( $media->mediaType() ) ? $type = 'type="' . $view->escapeHtml( $media->mediaType() ) . '"' : $type = null ;

        $view->headLink()->appendStylesheet($view->assetUrl('css/pdfObjectEmbed.css' , 'PdfObjectEmbed'));

        return sprintf( $html , $data , $type );
    }
}
