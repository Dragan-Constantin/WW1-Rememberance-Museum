<?php
require_once("libraries/Database.php");

/**
 * Model for handling user registration operations.
 */
class RegisterModel {
    private $db;

    /**
     * Constructor to initialize the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Registers a new user with the provided form data.
     */
    public function register() {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Validate input data
        if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
            echo 'All fields are required.';
            exit;
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Invalid email format.';
            exit;
        }

        // Concatenate firstname and lastname to create the username
        $username = $firstname . ' ' . $lastname;

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $sql = "SELECT id FROM users WHERE email = :email";
        $this->db->prepareQuery($sql);
        $result = $this->db->resultSingle([':email' => $email]);

        if ($result) {
            echo 'Email already registered.';
            exit;
        }

        // Insert the new user into the database
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $this->db->prepareQuery($sql);
        $params = [
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashed_password,
        ];

        if ($this->db->execute($params)) {
            // Get last userID to create profile folder
            $sql = "SELECT MAX(id) as id FROM users";
            $this->db->prepareQuery($sql);
            $lastID = $this->db->resultSingle()['id'];

            $folderName = "view/img/profiles/$lastID";
            if (!is_dir($folderName)) {
                mkdir($folderName, 0777);
            }
            echo '<meta http-equiv="refresh" content="0;url=login">';
        } else {
            echo 'Registration failed. Please try again.';
        }
    }
}
