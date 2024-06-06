<?php

/**
 * Controller for the Gallery page.
 */
class GalleryController {
    private $model;

    /**
     * Constructor.
     */
    public function __construct() {
        // Future model initialization can be added here if needed.
    }

    /**
     * Includes the Gallery page view.
     */
    public function getGalleryPage() {
        include_once('view/gallery.php');
    }
}