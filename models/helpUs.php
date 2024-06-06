<?php
include_once("libraries/Database.php");

/**
 * Model for handling data related to the Help Us section.
 */
class HelpUsModel {
    private $db;

    /**
     * Constructor initializes the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Adds a candidate to the database.
     *
     * @param string $firstName The first name of the candidate.
     * @param string $lastName The last name of the candidate.
     * @param int $age The age of the candidate.
     * @param string $address The address of the candidate.
     * @param string $email The email of the candidate.
     * @param string $zipCode The postal code of the candidate.
     * @param string $country The country of the candidate.
     * @param string $details Additional details about the candidate.
     */
    public function addCandidate($firstName, $lastName, $age, $address, $email, $zipCode, $country, $details) {
        $sql = "INSERT INTO candidates (FirstName, LastName, Age, Address, Email, PostCode, Country, Details) 
                VALUES (:firstName, :lastName, :age, :address, :email, :zipCode, :country, :details)";
        $this->db->prepareQuery($sql);
        $this->db->execute([
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':age' => $age,
            ':address' => $address,
            ':email' => $email,
            ':zipCode' => $zipCode,
            ':country' => $country,
            ':details' => $details
        ]);
    }
}