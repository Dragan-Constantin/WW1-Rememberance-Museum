<?php

require("model/manageUsers.php");

/**
 * Controller for handling new user-related operations.
 */
class NewUserController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        $this->model = new ManageUsersModel();
    }

    /**
     * Displays the new user page and handles the addition of a new user.
     */
    public function getNewUserPage() {
        include_once('view/new_user.php');
        $this->model->addNewUser();
    }
}