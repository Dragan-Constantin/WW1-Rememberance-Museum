<?php

include_once("models/asset.php");

/**
 * Controller for the Home page.
 */
class HomeController {
    private $model;

    /**
     * HomeController constructor.
     *
     * Initializes the asset model.
     */
    public function __construct() {
        $this->model = new AssetModel();
    }

    /**
     * Displays the Home page.
     *
     * Retrieves assets and includes the Home page view.
     */
    public function getHomePage() {
        $assets = $this->model->getAssets();
        include_once('view/home.php');
    }
}