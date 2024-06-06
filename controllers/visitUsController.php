<?php

/**
 * Controller for the Visit Us page.
 */
class VisitUsController {
    private $model;

    /**
     * VisitUsController constructor.
     */
    public function __construct() {
        // Future model initialization can be added here if needed.
    }

    /**
     * Displays the Visit Us page.
     */
    public function getVisitUsPage() {
        include_once('view/visit-us.php');
    }
}