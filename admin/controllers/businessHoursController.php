<?php

require_once("model/businessHours.php");

/**
 * Controller for handling business hours operations.
 */
class BusinessHoursController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        $this->model = new BusinessHoursModel();
    }

    /**
     * Displays the business hours page.
     */
    public function getBusinessHoursPage() {
        include_once('view/business-hours.php');
    }

    /**
     * Updates the business hours.
     *
     * @param array $businessHours The business hours data to be updated.
     */
    public function changeBusinessHours($businessHours) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->insertBusinessHours($businessHours);
            echo '<meta http-equiv="refresh" content="0;url=home">';
            exit;
        }
    }
}