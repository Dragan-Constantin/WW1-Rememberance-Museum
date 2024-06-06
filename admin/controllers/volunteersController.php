<?php
require_once("model/volunteers.php");

/**
 * Controller class for handling volunteer-related operations.
 */
class VolunteersController {
    private $model;

    /**
     * Constructor to initialize the VolunteerModel.
     */
    public function __construct() {
        $this->model = new VolunteerModel();
    }

    /**
     * Displays the volunteers page with the list of all volunteers and the count.
     */
    public function getVolunteersPage() {
        $volunteerCount = $this->model->getVolunteerCount();
        $volunteers = $this->model->getAllVolunteers();
        include_once('view/volunteers.php');
    }

    /**
     * Deletes a volunteer by their ID and refreshes the volunteers page.
     *
     * @param int $id The ID of the volunteer to delete.
     */
    public function deleteVolunteer($id) {
        $this->model->deleteVolunteer($id);
        echo '<meta http-equiv="refresh" content="0;url=volunteers">';
        exit();
    }
}