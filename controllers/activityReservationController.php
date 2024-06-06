<?php

require("models/mail.php");

/**
 * Controller for handling activity reservations.
 */
class ActivityReservationController {
    private $mailModel;

    /**
     * Constructor initializes the mail model.
     */
    public function __construct() {
        $this->mailModel = new ContactModel();
    }

    /**
     * Includes the Activity Reservation page view.
     */
    public function getActivityReservationPage() {
        include_once('view/activity-reservation.php');
    }

    /**
     * Handles the submission of the Activity Reservation form.
     * Sends an email with the reservation details if all required fields are filled.
     */
    public function sendActivityReservationForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $firstName = $_POST['first-name'];
            $lastName = $_POST['last-name'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $zipCode = $_POST['postcode'];
            $country = $_POST['country'];
            $activity = $_POST['activity'];
            $date = $_POST['date'];

            // Validate and send email
            if (!empty($email) && !empty($firstName) && !empty($lastName) && !empty($address) && !empty($activity) && !empty($date)) {
                if ($this->mailModel->sendActivityReservationEmail($firstName, $lastName, $age, $address, $email, $zipCode, $country, $activity, $date)) {
                    echo 'Email sent successfully';
                } else {
                    echo 'Failed to send email';
                }
            } else {
                echo 'Please fill in all required fields';
            }
        }
    }
}