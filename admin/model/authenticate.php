<?php
require_once("libraries/Database.php");

/**
 * AuthenticateModel handles user authentication.
 */
class AuthenticateModel {
    private $db;

    /**
     * Constructor initializes the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Authenticates the user by verifying email and password.
     */
    public function authenticate() {
        // Sanitize and validate input
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            echo 'Email and password are required.';
            exit;
        }

        // Prepare and execute the query
        $sql = "SELECT id, username, role, email, password, picture FROM users WHERE email = :email";
        $this->db->prepareQuery($sql);
        $result = $this->db->resultSingle([':email' => $email]);

        if ($result && password_verify($password, $result['password'])) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['profile_picture'] = $result['picture'];
            $_SESSION['role'] = $result['role'];
            echo 'Login successful! Welcome ' . htmlspecialchars($result['username']);
            // Redirect to a protected page
            echo '<meta http-equiv="refresh" content="0;url=home">';
            exit;
        } else {
            // Invalid credentials
            echo 'Invalid username, email or password.';
        }
    }
}
