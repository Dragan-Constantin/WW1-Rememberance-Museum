<?php

require("model/manageMailing.php");

/**
 * Controller for handling mailing management operations.
 */
class ManageMailingController {
    private $model;

    /**
     * Constructor to initialize the model.
     */
    public function __construct() {
        $this->model = new ManageMailingModel();
    }

    /**
     * Displays the manage mailing page and handles form submissions.
     */
    public function getManageMailingPage() {
        $HTML_TEMPLATES = $this->getMailTemplates();
        $SMTP_SERVER = $_ENV['SMTP_SERVER'];
        $SMTP_PORT = $_ENV['SMTP_PORT'];
        $SMTP_MAIL = $_ENV['SMTP_MAIL'];
        $SMTP_PASS = $_ENV['SMTP_PASS'];
        $emails_array[] = $_ENV['ADMIN_MAILING_LIST'];
        if (str_contains($_ENV['ADMIN_MAILING_LIST'], ',')) {
            $emails_array = explode(',', $_ENV['ADMIN_MAILING_LIST']);
        }

        include_once('view/manage_mailing.php');

        $this->model->updateSMTPData();
        $this->model->updateAdminMailingList($emails_array);
        $this->model->updateMailTemplate($HTML_TEMPLATES);
    }

    /**
     * Retrieves and processes mail templates.
     *
     * @return array The processed mail templates.
     */
    public function getMailTemplates(): array {
        require_once('config/config.php');
        foreach ($HTML_TEMPLATES as $key => $value) {
            if ($key == "Notification of New Contact Form Submission") {
                $value = str_replace('$receiverName', "[Recipient's Name]", $value);
                $value = str_replace('$senderName', "[Sender's Name]", $value);
                $value = str_replace('$senderEmail', "[Sender's Email Address]", $value);
                $value = str_replace('$reason', "[Subject]", $value);
                $value = str_replace('$message', "[Message Content]", $value);
            } else if ($key == "New User Registration Notification") {
                $value = str_replace('$receiverName', "[Recipient's Name]", $value);
                $value = str_replace('$senderName', "[User's Name]", $value);
                $value = str_replace('$senderEmail', "[User's Email Address]", $value);
                $value = str_replace('$registrationDate', "[Date of Registration]", $value);
            } else if ($key == "Password Reset Request Notification") {
                $value = str_replace('$receiverName', "[User's Name]", $value);
                $value = str_replace('$passwordResetLink', "[Password Reset Link]", $value);
            }
            $HTML_TEMPLATES[$key] = $value;
        }
        return $HTML_TEMPLATES;
    }
}