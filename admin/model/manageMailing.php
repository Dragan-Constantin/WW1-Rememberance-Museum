<?php
require_once("libraries/Database.php");

/**
 * Model for managing mailing settings and templates.
 */
class ManageMailingModel {
    private $db;

    /**
     * Constructor to initialize the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Updates or adds a key-value pair in the .env file.
     *
     * @param string $key The key to update or add.
     * @param string $value The value to set for the key.
     * @param string $path The path to the .env file.
     */
    function setEnvValue($key, $value, $path) {
        if (!file_exists($path)) {
            die("The .env file does not exist at the given path: $path");
        }

        $envFile = file_get_contents($path);
        if ($envFile === false) {
            die("Failed to read the .env file at: $path");
        }

        $keyValueStr = "{$key}={$value}";
        $keyFound = false;
        $lines = explode("\n", $envFile);

        foreach ($lines as $lineIndex => $line) {
            if (strpos(trim($line), "{$key}=") === 0) {
                $lines[$lineIndex] = $keyValueStr;
                $keyFound = true;
                break;
            }
        }

        if (!$keyFound) {
            $lines[] = $keyValueStr;
        }

        $newEnvFile = implode("\n", $lines);
        $result = file_put_contents($path, $newEnvFile);
        if ($result === false) {
            die("Failed to write to the .env file at: $path");
        }

        echo "The .env file has been updated successfully.";
    }

    /**
     * Updates SMTP configuration data in the .env file.
     */
    public function updateSMTPData() {
        if (isset($_POST['smtpServer'])) {
            $SMTP_Server = $_POST['smtpServer'];
            $SMTP_Port = $_POST['smtpPort'];
            $SMTP_Mail = $_POST['smtpMail'];
            $SMTP_Pass = $_POST['smtpPass'];

            $envPath = str_replace("model", "", __DIR__) . '.env';
            $this->setEnvValue('SMTP_SERVER', $SMTP_Server, $envPath);
            $this->setEnvValue('SMTP_PORT', $SMTP_Port, $envPath);
            $this->setEnvValue('SMTP_MAIL', $SMTP_Mail, $envPath);
            $this->setEnvValue('SMTP_PASS', $SMTP_Pass, $envPath);

            echo '<meta http-equiv="refresh" content="0">';
        }
    }

    /**
     * Updates the admin mailing list in the .env file.
     *
     * @param array $mailArray The current mailing list.
     */
    public function updateAdminMailingList($mailArray) {
        if (isset($_POST['newEmailAddress'])) {
            $mailArray[] = $_POST['newEmailAddress'];
            $mailString = implode(",", $mailArray);
            $envPath = str_replace("model", "", __DIR__) . '.env';
            $this->setEnvValue('ADMIN_MAILING_LIST', $mailString, $envPath);
            echo '<meta http-equiv="refresh" content="0">';
        }

        if (isset($_POST['actionMail'])) {
            if ($_POST['actionMail'] == 1) {
                $original = $_POST['originalEmailAddress'];
                $email = $_POST['existingEmailAddress'];
                if (empty($email) || $email == $original) {exit;}
                else if ($email != $original && in_array($email, $mailArray)) { echo "email already exists"; }
                    echo '<meta http-equiv="refresh" content="0">';
                    exit;
                } else {
                    $mailArray[array_search($original, $mailArray)] = $email;
                }
            }

            if ($_POST['actionMail'] == 2) {
                $email = $_POST['existingEmailAddress'];
                if (in_array($email, $mailArray)) {
                    unset($mailArray[array_search($email, $mailArray)]);
                }
            }

            $mailString = implode(",", $mailArray);
            $envPath = str_replace("model", "", __DIR__) . '.env';
            $this->setEnvValue('ADMIN_MAILING_LIST', $mailString, $envPath);
            echo '<meta http-equiv="refresh" content="0">';
        }

    /**
     * Updates email templates in the configuration file.
     *
     * @param array $templatesArray The current templates array.
     */
    public function updateMailTemplate($templatesArray) {
        if (isset($_POST['emailTemplate'])) {
            $original_content = $_POST['emailTemplateOriginal'];
            $updated_content = str_replace('"', "'", $_POST['emailTemplate']);
            $template_key = $_POST['emailTemplateKey'];

            if ($original_content == $updated_content) {
                exit;
            }

            $config_file = str_replace("model", "config\\", __DIR__) . 'config.php';
            if (file_exists($config_file)) {
                $templatesArray[$template_key] = $updated_content;
                $templatesArray = $this->replacePlaceholders($templatesArray);
                $config_data = "<?php\n\n" . '$HTML_TEMPLATES = ' . var_export($templatesArray, true) . ';';

                if (file_put_contents($config_file, $config_data)) {
                    echo 'Templates updated successfully.';
                } else {
                    echo 'Failed to update templates.';
                }
            } else {
                echo 'Config file not found.';
            }

            echo '<meta http-equiv="refresh" content="0">';
        }
    }

    /**
     * Replaces placeholders in email templates with corresponding variables.
     *
     * @param array $arr The array of email templates.
     * @return array The array with placeholders replaced.
     */
    private function replacePlaceholders($arr) {
        foreach ($arr as $key => $content) {
            switch ($key) {
                case "Notification of New Contact Form Submission":
                    $arr[$key] = str_replace(
                        ["[Recipient's Name]", "[Sender's Name]", "[Sender's Email Address]", "[Subject]", "[Message Content]"],
                        ['$receiverName', '$senderName', '$senderEmail', '$reason', '$message'],
                        $arr[$key]
                    );
                    break;
                case "New User Registration Notification":
                    $arr[$key] = str_replace(
                        ["[Recipient's Name]", "[User's Name]", "[User's Email Address]", "[Date of Registration]"],
                        ['$receiverName', '$senderName', '$senderEmail', '$registrationDate'],
                        $arr[$key]
                    );
                    break;
                case "Password Reset Request Notification":
                    $arr[$key] = str_replace(
                        ["[User's Name]", "[Password Reset Link]"],
                        ['$receiverName', '$passwordResetLink'],
                        $arr[$key]
                    );
                    break;
            }
        }
        return $arr;
    }
}