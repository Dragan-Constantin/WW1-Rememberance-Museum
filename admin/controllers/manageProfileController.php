<?php

require("model/manageUsers.php");

/**
 * Controller for handling profile management operations.
 */
class ManageProfileController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        $this->model = new ManageUsersModel();
    }

    /**
     * Displays the manage profile page and handles profile updates.
     */
    public function getManageProfilePage() {
        $fname = explode(" ", $_SESSION['username'])[0];
        $lname = explode(" ", $_SESSION['username'])[1];
        include_once('view/manage_profile.php');
        $this->model->updateProfile();
    }
}