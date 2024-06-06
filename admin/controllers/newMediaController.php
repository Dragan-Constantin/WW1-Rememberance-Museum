<?php

/**
 * Controller for handling new media-related operations.
 */
class NewMediaController {
    private $model;

    public function __construct() {
        // Model initialization can be added here if needed in the future
    }

    /**
     * Displays the new media page.
     */
    public function getNewMediaPage() {
        include_once('view/new_media.php');
    }
}