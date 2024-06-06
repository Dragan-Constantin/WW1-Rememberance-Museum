<?php

/**
 * Controller for the Activities Register page.
 */
class ActivitiesRegisterController {
    private $model;

    /**
     * Constructor.
     */
    public function __construct() {
        // Future model initialization can be added here if needed.
    }

    /**
     * Includes the Activities Register page view.
     */
    public function getActivitiesRegisterPage() {
        include_once('view/register.php');
    }
}