<?php

require("model/authenticate.php");

/**
 * Controller for handling login operations.
 */
class LoginController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        $this->model = new AuthenticateModel();
    }

    /**
     * Displays the login page.
     */
    public function getLoginPage() {
        include_once('view/login.php');
    }

    /**
     * Authenticates the user.
     */
    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->authenticate();
        }
    }
}