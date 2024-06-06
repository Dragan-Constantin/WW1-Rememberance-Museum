<?php
require_once("model/media.php");

/**
 * Controller for handling media-related operations.
 */
class MediaController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        $this->model = new MediaModel();
    }

    /**
     * Displays the media page.
     */
    public function getMediaPage() {
        $media = [
            'all' => $this->model->getAllMedia(),
            'Home' => $this->model->getMediaByPage('Homepage'),
            'About' => $this->model->getMediaByPage('About'),
            'Activities' => $this->model->getMediaByPage('Activities'),
            'Gift Shop' => $this->model->getMediaByPage('Gift Shop'),
            'Help Us' => $this->model->getMediaByPage('Help Us'),
            'Contact' => $this->model->getMediaByPage('Contact')
        ];
        include_once('view/media.php');
    }
}