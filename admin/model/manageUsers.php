<?php
require_once("libraries/Database.php");

/**
 * Model for managing user-related operations.
 */
class ManageUsersModel {
    private $db;

    /**
     * Constructor to initialize the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Retrieves the current users excluding those with the 'pending' role.
     *
     * @return array The list of current users.
     */
    public function getCurrentUsers() {
        $sql = "SELECT id, username, role FROM users WHERE role != 'pending'";
        $this->db->prepareQuery($sql);
        return $this->db->resultSet();
    }

    /**
     * Retrieves the users with the 'pending' role.
     *
     * @return array The list of pending users.
     */
    public function getPendingUsers() {
        $sql = "SELECT id, username, role FROM users WHERE role = 'pending'";
        $this->db->prepareQuery($sql);
        return $this->db->resultSet();
    }

    /**
     * Updates the role of a selected user.
     */
    public function updateUserRole() {
        if (isset($_POST['selectedUserID'])) {
            $userID = $_POST['selectedUserID'];
            $userRole = $_POST['selectedUserRole'];

            $sql = "SELECT id FROM users WHERE id = :userID";
            $this->db->prepareQuery($sql);
            $result = $this->db->resultSingle([':userID' => $userID]);
            
            if ($result != false) {
                $sql = "UPDATE users SET role = :userRole WHERE id = :userID";
                $this->db->prepareQuery($sql);
                $this->db->execute([':userID' => $userID, ':userRole' => $userRole]);
                echo '<meta http-equiv="refresh" content="0">';
            }
        }
    }

    /**
     * Updates the role of a pending user or deletes them based on the action.
     */
    public function updatePendingUser() {
        if (isset($_POST['pendingUserID'])) {
            $userID = $_POST['pendingUserID'];
            $action = $_POST['pendingAction'];

            if ($action == 1) {
                $sql = "UPDATE users SET role = 'editor' WHERE id = :userID";
                $this->db->prepareQuery($sql);
                $this->db->execute([':userID' => $userID]);
                echo '<meta http-equiv="refresh" content="0">';
            } elseif ($action == 2) {
                $sql = "DELETE FROM users WHERE id = :userID";
                $this->db->prepareQuery($sql);
                $this->db->execute([':userID' => $userID]);
                $target_dir = "view/img/profiles/$userID/";
                $this->removeDir($target_dir);
                echo '<meta http-equiv="refresh" content="0">';
            }
            exit();
        }
    }

    /**
     * Deletes a user or updates their role to 'editor' based on the action.
     */
    public function deleteUser() {
        if (isset($_POST['currentUserID'])) {
            $userID = $_POST['currentUserID'];
            $action = $_POST['currentAction'];

            if ($action == 1) {
                $sql = "UPDATE users SET role = 'editor' WHERE id = :userID";
                $this->db->prepareQuery($sql);
                $this->db->execute([':userID' => $userID]);
                echo '<meta http-equiv="refresh" content="0">';
            } elseif ($action == 2) {
                $sql = "DELETE FROM users WHERE id = :userID";
                $this->db->prepareQuery($sql);
                $this->db->execute([':userID' => $userID]);
                $target_dir = "view/img/profiles/$userID/";
                $this->removeDir($target_dir);
                echo '<meta http-equiv="refresh" content="0">';
            }
            exit();
        }
    }

    /**
     * Adds a new user to the database.
     */
    public function addNewUser() {
        if (isset($_POST['newUserFName'])) {
            $firstname = $_POST['newUserFName'];
            $lastname = $_POST['newUserLName'];
            $password = $_POST['newUserPassword'];
            $email = $_POST['newUserEmail'];
            $role = $_POST['newUserRole'];

            $username = $firstname . ' ' . $lastname;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Validate input data
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
                echo 'All fields are required.';
                exit;
            }
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Invalid email format.';
                exit;
            }
            
            // Check if email already exists
            $sql = "SELECT id FROM users WHERE email = :email";
            $this->db->prepareQuery($sql);
            $result = $this->db->resultSingle([':email' => $email]);

            if ($result) {
                echo 'Email already registered.';
                exit;
            }

            // Insert the new user into the database
            $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
            $this->db->prepareQuery($sql);
            $params = [
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashed_password,
                ':role' => $role
            ];

            if ($this->db->execute($params)) {
                $sql = "SELECT MAX(id) as id FROM users";
                $this->db->prepareQuery($sql);
                $lastID = $this->db->resultSingle()['id'];
                
                $folderName = "view/img/profiles/$lastID";
                if (!is_dir($folderName)) {
                    mkdir($folderName, 0777);
                }
                echo '<meta http-equiv="refresh" content="0;url=manage_users">';
            } else {
                echo 'Registration failed. Please try again.';
            }
        }
    }

    /**
     * Updates the profile information of the current user.
     */
    public function updateProfile() {
        if (isset($_POST['newUserFName'])) {
            $firstname = $_POST['newUserFName'];
            $lastname = $_POST['newUserLName'];
            $password = $_POST['newUserPassword'];
            $email = $_POST['newUserEmail'];
            $userID = $_SESSION['user_id'];

            $username = $firstname . ' ' . $lastname;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Validate input data
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
                echo 'All fields are required.';
                exit;
            }
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Invalid email format.';
                exit;
            }
            
            // Check if email already exists
            $sql = "SELECT id FROM users WHERE email = :email";
            $this->db->prepareQuery($sql);
            $result = $this->db->resultSingle([':email' => $email]);
            
            if ($result && $email != $_SESSION['email']) {
                echo 'Email already registered.';
                exit;
            }

            // Update the user's profile in the database
            $sql = "UPDATE users SET username = :username, email = :email, password = :password WHERE id = :userID";
            $this->db->prepareQuery($sql);
            $params = [
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashed_password,
                ':userID' => $userID
            ];

            if ($this->db->execute($params)) {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $this->changeProfilePicture($userID);
                echo '<br/>Profile has been updated';
                echo '<meta http-equiv="refresh" content="0">';
            } else {
                echo 'Profile Update failed. Please try again.';
            }
        }
    }

    /**
     * Changes the profile picture of the current user.
     *
     * @param int $userID The ID of the user whose profile picture is being updated.
     */
    public function changeProfilePicture($userID) {
        if (isset($_FILES['profilePicture'])) {
            if ($_FILES['profilePicture']['error'] == 4) {
                exit();
            } elseif ($_FILES['profilePicture']['error'] == 0) {
                $target_dir = "view/img/profiles/$userID/";
                $basename_file = basename($_FILES["profilePicture"]["name"]);
                $target_file = $target_dir . $basename_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                // Check if image file is an actual image or fake image
                $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            
                // Check if file already exists
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            
                // Check file size
                if ($_FILES["profilePicture"]["size"] > 10000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
            
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "svg") {
                    echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
                    $uploadOk = 0;
                }
            
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";
                        $filePath = $target_file;
                        $sql = "UPDATE users SET picture = :filePath WHERE id = :userID";
                        $this->db->prepareQuery($sql);
                        $params = [
                            ':userID' => $userID,
                            ':filePath' => $filePath
                        ];
                        if ($this->db->execute($params)) {
                            $_SESSION['profile_picture'] = $filePath;
                        } else {
                            echo "Error when executing: " . $sql . "<br>";
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }
    }

    /**
     * Removes a directory and its contents.
     *
     * @param string $dir The path to the directory to be removed.
     */
    public function removeDir(string $dir): void {
        $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getPathname());
            } else {
                unlink($file->getPathname());
            }
        }
        echo "All files in folder have been deleted";
        rmdir($dir);
        echo "Folder has been deleted";
    }
}