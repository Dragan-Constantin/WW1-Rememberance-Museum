<?php

/**
 * Controller class for handling settings page operations.
 */
class SettingsController {
    private $model;

    /**
     * Constructor to initialize the SettingsController.
     */
    public function __construct() {
        // Model initialization can be added here if needed in the future
    }

    /**
     * Displays the settings page.
     */
    public function getSettingsPage() {
        include_once('view/settings.php');
    }
}