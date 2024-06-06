<?php
include_once("libraries/Database.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once('./admin/config/config.php');

/**
 * Class ContactModel
 *
 * This class handles the operations related to sending emails for the contact and "Help Us" forms.
 * It uses PHPMailer for sending emails via SMTP.
 */
class ContactModel {
    private $db;
    private $host;
    private $mailUsername; 
    private $mailPassword; 
    
    /**
     * ContactModel constructor.
     *
     * Initializes the database connection and sets up SMTP credentials from environment variables.
     */
    public function __construct() {
        $this->db = new Database();
        $this->host = $_ENV["SERVER_SMTP"];
        $this->mailUsername = $_ENV["MAIL_SMTP"];
        $this->mailPassword = $_ENV["PASSWORD_SMTP"];
    }
    
    /**
     * Configures the PHPMailer instance for SMTP.
     *
     * @param PHPMailer $mail The PHPMailer instance to configure.
     */
    private function configureMailer($mail) {
        $mail->isSMTP();
        $mail->Host = $this->host;
        $mail->SMTPAuth = true;
        $mail->Username = $this->mailUsername;
        $mail->Password = $this->mailPassword;
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
    }

    /**
     * Sends an email using a specified template.
     *
     * @param string $templateName The name of the template.
     * @param array $placeholders An associative array of placeholders and their values.
     * @param string $receiverEmail The email address of the recipient.
     * @param string $receiverName The name of the recipient.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     */
    private function sendEmailTemplate($templateName, $placeholders, $receiverEmail, $receiverName) {
        global $HTML_TEMPLATES;
        $mail = new PHPMailer(true);

        try {
            $this->configureMailer($mail);

            $subject = $templateName;
            $body = $HTML_TEMPLATES[$templateName];

            // Replace placeholders with their values
            foreach ($placeholders as $key => $value) {
                $body = str_replace($key, htmlspecialchars($value), $body);
            }

            $mail->setFrom($this->mailUsername, 'Kernel');
            $mail->addAddress($receiverEmail, $receiverName);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body); // strip HTML tags for non-HTML email clients

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Sends an email for the "Notification of New Contact Form Submission".
     *
     * @param string $receiverEmail The email address of the recipient.
     * @param string $receiverName The name of the recipient.
     * @param string $senderName The name of the sender.
     * @param string $senderEmail The email address of the sender.
     * @param string $reason The subject of inquiry.
     * @param string $message The message content.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     */
    public function sendNewContactFormSubmissionEmail($receiverEmail, $receiverName, $senderName, $senderEmail, $reason, $message) {
        $placeholders = [
            '$receiverName' => $receiverName,
            '$senderName' => $senderName,
            '$senderEmail' => $senderEmail,
            '$reason' => $reason,
            '$message' => $message
        ];
        return $this->sendEmailTemplate('Notification of New Contact Form Submission', $placeholders, $receiverEmail, $receiverName);
    }

    /**
     * Sends an email for the "New User Registration Notification".
     *
     * @param string $receiverEmail The email address of the recipient.
     * @param string $receiverName The name of the recipient.
     * @param string $senderName The name of the sender.
     * @param string $senderEmail The email address of the sender.
     * @param string $registrationDate The registration date.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     */
    public function sendNewUserRegistrationNotificationEmail($receiverEmail, $receiverName, $senderName, $senderEmail, $registrationDate) {
        $placeholders = [
            '$receiverName' => $receiverName,
            '$senderName' => $senderName,
            '$senderEmail' => $senderEmail,
            '$registrationDate' => $registrationDate
        ];
        return $this->sendEmailTemplate('New User Registration Notification', $placeholders, $receiverEmail, $receiverName);
    }

    /**
     * Sends an email for the "Password Reset Request Notification".
     *
     * @param string $receiverEmail The email address of the recipient.
     * @param string $receiverName The name of the recipient.
     * @param string $passwordResetLink The password reset link.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     */
    public function sendPasswordResetRequestNotificationEmail($receiverEmail, $receiverName, $passwordResetLink) {
        $placeholders = [
            '$receiverName' => $receiverName,
            '$passwordResetLink' => $passwordResetLink
        ];
        return $this->sendEmailTemplate('Password Reset Request Notification', $placeholders, $receiverEmail, $receiverName);
    }

    /**
     * Sends an email for the contact form submission.
     *
     * @param string $receiverEmail The email address of the recipient.
     * @param string $receiverName The name of the recipient.
     * @param string $reason The subject of the message.
     * @param string $message The message content.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     */
    public function sendEmailContact($receiverEmail, $receiverName, $reason, $message) {
        $mail = new PHPMailer(true);

        try {
            $this->configureMailer($mail);

            $subject = "New Contact Form Submission";
            $body = "<html><body>
                <p><strong>Subject:</strong> $subject</p>
                <p>Dear $receiverName,</p>
            
                <p>A new user has submitted the contact form on our website.</p>
            
                <p>Here are the details of the form:</p>
                <ul>
                    <li><strong>User's Name:</strong> " . htmlspecialchars($receiverName) . "</li>
                    <li><strong>User's Email Address:</strong> " . htmlspecialchars($receiverEmail) . "</li>
                    <li><strong>Message Subject:</strong> " . htmlspecialchars($reason) . "</li>
                    <li><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</li>
                </ul>
            
                <p>Please take appropriate action to respond to this request.</p>
            
                <p>Best Regards,<br>WW1RC Administrator</p>
            </body></html>";

            $mail->setFrom($this->mailUsername, 'Kernel');
            $mail->addAddress('dadi94230@hotmail.fr', 'Charles');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body); // strip HTML tags for non-HTML email clients

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Sends an email for the "Help Us" form submission.
     *
     * @param string $firstName The first name of the sender.
     * @param string $lastName The last name of the sender.
     * @param int $age The age of the sender.
     * @param string $address The address of the sender.
     * @param string $email The email address of the sender.
     * @param string $zipCode The zip code of the sender.
     * @param string $country The country of the sender.
     * @param string $message The message content.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     */
    public function sendEmailHelpUs($firstName, $lastName, $age, $address, $email, $zipCode, $country, $message) {
        $mail = new PHPMailer(true);

        try {
            $this->configureMailer($mail);

            $subject = "New Volunteer Request from $firstName $lastName";
            $body = "<html><body>
                <p><strong>Subject:</strong> $subject</p>
                <p>Dear Charles,</p>
            
                <p>Someone has expressed interest in becoming a volunteer.</p>
            
                <p>Here are the details of the request:</p>
                <ul>
                    <li><strong>First Name:</strong> $firstName</li>
                    <li><strong>Last Name:</strong> $lastName</li>
                    <li><strong>Age:</strong> $age</li>
                    <li><strong>Address:</strong> $address, $zipCode $country</li>
                    <li><strong>Email Address:</strong> $email</li>
                    <li><strong>Message:</strong><br>$message</li>
                </ul>
            
                <p>Please take appropriate action to address this volunteer request.</p>
            
                <p>Best Regards,<br>WW1RC Administrator</p>
            </body></html>";

            $mail->setFrom($this->mailUsername, 'Kernel');
            $mail->addAddress('charles@h.fr', 'Charles');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body); // strip HTML tags for non-HTML email clients

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }    

    /**
     * Sends an email for the activity reservation.
     *
     * @param string $firstName The first name of the person making the reservation.
     * @param string $lastName The last name of the person making the reservation.
     * @param int $age The age of the person making the reservation.
     * @param string $address The address of the person making the reservation.
     * @param string $email The email address of the person making the reservation.
     * @param string $zipCode The zip code of the person making the reservation.
     * @param string $country The country of the person making the reservation.
     * @param string $activity The activity being reserved.
     * @param string $date The date of the reservation.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     */
    public function sendActivityReservationEmail($firstName, $lastName, $age, $address, $email, $zipCode, $country, $activity, $date) {
        $mail = new PHPMailer(true);

        try {
            $this->configureMailer($mail);

            $subject = "New Activity Reservation";
            $body = "<html><body>
                <p><strong>Subject:</strong> $subject</p>
                <p>Dear WW1RC Administrator,</p>
            
                <p>A new activity reservation has been made.</p>
            
                <p>Here are the details of the reservation:</p>
                <ul>
                    <li><strong>First Name:</strong> " . htmlspecialchars($firstName) . "</li>
                    <li><strong>Last Name:</strong> " . htmlspecialchars($lastName) . "</li>
                    <li><strong>Age:</strong> " . htmlspecialchars($age) . "</li>
                    <li><strong>Address:</strong> " . htmlspecialchars($address) . ", " . htmlspecialchars($zipCode) . " " . htmlspecialchars($country) . "</li>
                    <li><strong>Email Address:</strong> " . htmlspecialchars($email) . "</li>
                    <li><strong>Activity:</strong> " . htmlspecialchars($activity) . "</li>
                    <li><strong>Date:</strong> " . htmlspecialchars($date) . "</li>
                </ul>
            
                <p>Please take appropriate action to confirm the reservation.</p>
            
                <p>Best Regards,<br>WW1RC Administrator</p>
            </body></html>";

            $mail->setFrom($this->mailUsername, 'Kernel');
            $mail->addAddress('charles@h.fr', 'Charles');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body); // strip HTML tags for non-HTML email clients

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}