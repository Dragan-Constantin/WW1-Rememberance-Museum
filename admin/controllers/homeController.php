<?php
require_once("model/volunteers.php");
require_once("model/candidates.php");
require_once("model/businessHours.php");

/**
 * Controller for handling home page operations.
 */
class HomeController {
    private $volunteerModel;
    private $candidateModel;
    private $businessHoursModel;

    /**
     * Constructor to initialize the models.
     */
    public function __construct() {
        $this->volunteerModel = new VolunteerModel();
        $this->candidateModel = new CandidateModel();
        $this->businessHoursModel = new BusinessHoursModel();
    }

    /**
     * Displays the home page.
     */
    public function getHomePage() {
        $volunteerCount = $this->volunteerModel->getVolunteerCount();
        $candidateCount = $this->candidateModel->getCandidateCount();
        $businessHours = $this->businessHoursModel->getAllBusinessHours();

        include_once('view/home.php');
    }
}