<?php

include_once("models/asset.php");

/**
 * Controller for the About page.
 */
class AboutController {
    private $model;
    
    /**
     * Constructor initializes the model.
     */
    public function __construct() {
        $this->model = new AssetModel();
    }

    /**
     * Retrieves assets and includes the About page view.
     */
    public function getAboutPage() {
        $assets = $this->model->getAssets();
        include_once('view/about.php');
    }
}