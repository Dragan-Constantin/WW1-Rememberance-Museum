<?php
require_once("libraries/Database.php");

/**
 * CandidateModel handles operations related to candidates.
 */
class CandidateModel {
    private $db;

    /**
     * Constructor initializes the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Gets the count of candidates.
     *
     * @return int The count of candidates.
     */
    public function getCandidateCount() {
        $sql = "SELECT COUNT(*) as count FROM candidates";
        $this->db->prepareQuery($sql);
        $result = $this->db->resultSingle();

        return $result ? $result['count'] : 0;
    }

    /**
     * Retrieves all candidates from the database.
     *
     * @return array An associative array of all candidates.
     */
    public function getAllCandidates() {
        $sql = "SELECT * FROM candidates";
        $this->db->prepareQuery($sql);
        return $this->db->resultSet();
    }

    /**
     * Retrieves a candidate by their ID.
     *
     * @param int $CandidateID The ID of the candidate.
     * @return array An associative array of the candidate's details.
     */
    public function getCandidateById($CandidateID) {
        $sql = "SELECT * FROM candidates WHERE CandidateID = :CandidateID";
        $this->db->prepareQuery($sql);
        return $this->db->resultSingle([':CandidateID' => $CandidateID]);
    }

    /**
     * Deletes a candidate by their ID.
     *
     * @param int $CandidateID The ID of the candidate to be deleted.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function deleteCandidate($CandidateID) {
        $sql = "DELETE FROM candidates WHERE CandidateID = :CandidateID";
        $this->db->prepareQuery($sql);
        return $this->db->execute([':CandidateID' => $CandidateID]);
    }
}
