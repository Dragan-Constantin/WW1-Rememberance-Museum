<?php

require("model/manageUsers.php");

/**
 * Controller for handling user management operations.
 */
class ManageUsersController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        $this->model = new ManageUsersModel();
    }

    /**
     * Displays the manage users page and handles user management actions.
     */
    public function getManageUsersPage() {
        $pending_users = $this->model->getPendingUsers();
        $current_users = $this->model->getCurrentUsers();

        include_once('view/manage_users.php');

        $this->model->updatePendingUser();
        $this->model->updateUserRole();
        $this->model->deleteUser();
    }
}