<?php

namespace PdfEmbed;

use Omeka\Api\Representation\MediaRepresentation;
use Omeka\Media\FileRenderer\RendererInterface;
use Zend\View\Renderer\PhpRenderer;

require('PdfFunctions.php');

class PdfRenderer implements RendererInterface
{
    public function render(PhpRenderer $view, MediaRepresentation $media, array $options = [])
    {
        $html = '<div class="object-embed" style="--aspect-ratio: %s;"><object data="%s" %s %s></object></div>';
        $data = $view->escapeHtml( $media->originalUrl() );
        $ratio = aspectRatio($media);
        !empty( $media->mediaType() ) ? $type = 'type="' . $view->escapeHtml( $media->mediaType() ) . '"' : $type = null;
        $view->headLink()->appendStylesheet($view->assetUrl('css/pdfObjectEmbed.css' , 'PdfEmbed'));
        return sprintf( $html , $ratio['0'], $data , $ratio['1'] , $type );
    }
}
