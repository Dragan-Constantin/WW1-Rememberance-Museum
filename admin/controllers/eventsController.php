<?php

/**
 * Controller for handling events operations.
 */
class EventsController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        // Model initialization can be added here if needed in the future
    }

    /**
     * Displays the events page.
     */
    public function getEventsPage() {
        include_once('view/events.php');
    }
}