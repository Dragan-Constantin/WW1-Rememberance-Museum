<?php
require_once("libraries/Database.php");

/**
 * Model for handling volunteer-related operations.
 */
class VolunteerModel {
    private $db;

    /**
     * Constructor to initialize the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Retrieves the count of volunteers in the database.
     *
     * @return int The number of volunteers.
     */
    public function getVolunteerCount() {
        $sql = "SELECT COUNT(*) AS volunteer_count FROM volunteers";
        $this->db->prepareQuery($sql);
        $this->db->execute();
        $result = $this->db->resultSingle();
        return $result ? (int)$result['volunteer_count'] : 0;
    }

    /**
     * Retrieves all volunteers from the database.
     *
     * @return array The list of all volunteers.
     */
    public function getAllVolunteers() {
        $sql = "SELECT VolunteerID, FirstName, LastName, Email FROM volunteers";
        $this->db->prepareQuery($sql);
        $this->db->execute();
        return $this->db->resultSet();
    }

    /**
     * Inserts a new volunteer into the database.
     *
     * @param array $volunteerData The data of the volunteer to be inserted.
     * @return bool True on success, false on failure.
     */
    public function insertVolunteer($volunteerData) {
        $sql = "INSERT INTO volunteers (FirstName, LastName, Age, Address, Email, PostCode, Country, Details) 
                VALUES (:first_name, :last_name, :age, :address, :email, :post_code, :country, :details)";
        $this->db->prepareQuery($sql);
        return $this->db->execute([
            ':first_name' => $volunteerData['FirstName'],
            ':last_name' => $volunteerData['LastName'],
            ':age' => $volunteerData['Age'],
            ':address' => $volunteerData['Address'],
            ':email' => $volunteerData['Email'],
            ':post_code' => $volunteerData['PostCode'],
            ':country' => $volunteerData['Country'],
            ':details' => $volunteerData['Details']
        ]);
    }

    /**
     * Retrieves the information of a volunteer by their ID.
     *
     * @param int $volunteerId The ID of the volunteer.
     * @return array The information of the volunteer.
     */
    public function getVolunteerById($volunteerId) {
        $sql = "SELECT * FROM volunteers WHERE VolunteerID = :volunteer_id";
        $params = [':volunteer_id' => $volunteerId];
        $this->db->prepareQuery($sql);
        return $this->db->resultSingle($params);
    }

    /**
     * Updates the information of a volunteer in the database.
     *
     * @param int $volunteerId The ID of the volunteer to be updated.
     * @param array $volunteerData The new data for the volunteer.
     * @return bool True on success, false on failure.
     */
    public function updateVolunteer($volunteerId, $volunteerData) {
        $sql = "UPDATE volunteers 
                SET FirstName = :first_name, 
                    LastName = :last_name, 
                    Age = :age, 
                    Address = :address, 
                    Email = :email, 
                    PostCode = :post_code, 
                    Country = :country, 
                    Details = :details 
                WHERE VolunteerID = :volunteer_id";
        $params = [
            ':volunteer_id' => $volunteerId,
            ':first_name' => $volunteerData['first_name'],
            ':last_name' => $volunteerData['last_name'],
            ':age' => $volunteerData['age'],
            ':address' => $volunteerData['address'],
            ':email' => $volunteerData['email'],
            ':post_code' => $volunteerData['post_code'],
            ':country' => $volunteerData['country'],
            ':details' => $volunteerData['details']
        ];
        $this->db->prepareQuery($sql);
        return $this->db->execute($params);
    }

    /**
     * Deletes a volunteer from the database.
     *
     * @param int $id The ID of the volunteer to be deleted.
     * @return bool True on success, false on failure.
     */
    public function deleteVolunteer($id) {
        $sql = "DELETE FROM volunteers WHERE VolunteerID = :id";
        $this->db->prepareQuery($sql);
        return $this->db->execute([':id' => $id]);
    }
}