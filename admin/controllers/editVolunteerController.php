<?php
require_once("model/volunteers.php");

/**
 * Controller for handling volunteer editing operations.
 */
class EditVolunteerController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        $this->model = new VolunteerModel();
    }

    /**
     * Displays the edit volunteer page.
     *
     * @param int $volunteerId The ID of the volunteer to be edited.
     */
    public function getEditVolunteerPage($volunteerId) {
        $countries = ["United Kingdom"];
        $volunteerData = $this->model->getVolunteerById($volunteerId);
        include_once('view/edit_volunteer.php');
        $this->processEditVolunteer($volunteerId);
    }

    /**
     * Processes the form submission for editing a volunteer.
     *
     * @param int $volunteerId The ID of the volunteer to be edited.
     */
    public function processEditVolunteer($volunteerId) {
        if (isset($_POST['first_name'])) {
            $volunteerData = [
                'id' => $volunteerId,
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'age' => $_POST['age'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'post_code' => $_POST['post_code'],
                'country' => $_POST['country'],
                'details' => $_POST['details']
            ];

            if ($this->validateVolunteerData($volunteerData)) {
                $this->model->updateVolunteer($volunteerId, $volunteerData);
                echo '<meta http-equiv="refresh" content="0;url=volunteers">';
                exit();
            } else {
                echo "Invalid input data.";
            }
        }
    }

    /**
     * Validates the volunteer data.
     *
     * @param array $data The volunteer data to validate.
     * @return bool True if the data is valid, false otherwise.
     */
    private function validateVolunteerData($data) {
        // Validation logic for volunteer data can be implemented here.
        return true; // For this example, always return true.
    }
}