<?php

require("models/helpUs.php");
require("models/mail.php");
include_once("models/asset.php");

/**
 * Controller for the Help Us page.
 */
class HelpUsController {
    private $helpUsModel;
    private $assetModel;
    private $mailModel;
    
    /**
     * HelpUsController constructor.
     *
     * Initializes the asset, help us, and mail models.
     */
    public function __construct() {
        $this->assetModel = new AssetModel();
        $this->helpUsModel = new HelpUsModel();
        $this->mailModel = new ContactModel();
    }

    /**
     * Displays the Help Us page.
     *
     * Retrieves assets and includes the Help Us page view.
     */
    public function getHelpUsPage() {
        $assets = $this->assetModel->getAssets();
        include_once('view/help-us.php');
    }

    /**
     * Processes the Help Us form submission.
     *
     * Handles the POST request from the Help Us form, retrieves the form data,
     * validates it, attempts to send an email using the ContactModel, and
     * inserts the candidate data into the database using the HelpUsModel.
     * Provides feedback on whether the email was sent successfully or if there were errors.
     */
    public function sendHelpUsForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $zipCode = $_POST['postcode'];
            $country = $_POST['country'];
            $message = $_POST['message'];

            // Validate and send email
            if (!empty($email) && !empty($firstName) && !empty($lastName) && !empty($address) && !empty($message)) {
                if ($this->mailModel->sendEmailHelpUs($firstName, $lastName, $age, $address, $email, $zipCode, $country, $message)) {
                    echo 'Email sent successfully';
                } else {
                    echo 'Failed to send email';
                }

                // Insert candidate data into database
                $this->helpUsModel->addCandidate($firstName, $lastName, $age, $address, $email, $zipCode, $country, $message);
            } else {
                echo 'Please fill in all fields';
            }
        }
    }
}