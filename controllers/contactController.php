<?php
require("models/mail.php");
include_once("models/asset.php");

/**
 * Class ContactController
 *
 * Handles the operations related to the contact form, including rendering
 * the contact page and processing form submissions.
 */
class ContactController {
    private $assetModel;
    private $model;
    
    /**
     * ContactController constructor.
     *
     * Initializes the asset model and contact model.
     */
    public function __construct() {
        $this->assetModel = new AssetModel();
        $this->model = new ContactModel();
    }

    /**
     * Displays the contact page.
     *
     * Retrieves assets and includes the contact page view to render the contact form.
     */
    public function getContactPage() {
        $assets = $this->assetModel->getAssets();
        include_once('view/contact.php');
    }

    /**
     * Processes the contact form submission.
     *
     * Handles the POST request from the contact form, retrieves the form data,
     * validates it, and attempts to send an email using the ContactModel. 
     * Provides feedback on whether the email was sent successfully or if there were errors.
     */
    public function sendContactForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
            $email = $_POST['email'];
            $reason = $_POST['reason'];
            $message = $_POST['message'];

            // Validate and send email
            if (!empty($email) && !empty($name) && !empty($message) && !empty($reason)) {
                if ($this->model->sendEmailContact($email, $name, $reason, $message)) {
                    echo 'Email sent successfully';
                } else {
                    echo 'Failed to send email';
                }
            } else {
                echo 'Please fill in all fields';
            }
        }
    }
}
