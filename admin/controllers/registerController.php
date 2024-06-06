<?php

require("model/register.php");

/**
 * Controller class for handling user registration.
 */
class RegisterController {
    private $model;

    /**
     * Constructor to initialize the RegisterModel.
     */
    public function __construct() {
        $this->model = new RegisterModel;
    }

    /**
     * Displays the registration page.
     */
    public function getRegisterPage() {
        include_once('view/register.php');
    }

    /**
     * Handles the registration process.
     */
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->register();
        }
    }
}