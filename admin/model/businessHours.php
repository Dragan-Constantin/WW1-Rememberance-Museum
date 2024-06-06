<?php
require_once("libraries/Database.php");

/**
 * BusinessHoursModel handles operations related to business hours.
 */
class BusinessHoursModel {
    private $db;

    /**
     * Constructor initializes the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Inserts or updates business hours in the database.
     *
     * @param array $businessHours Associative array of business hours with days as keys.
     */
    public function insertBusinessHours($businessHours) {
        $sql = "INSERT INTO business_hours (day, open_time, close_time, closed) VALUES (:day, :open, :close, :closed)
                ON DUPLICATE KEY UPDATE open_time = VALUES(open_time), close_time = VALUES(close_time), closed = VALUES(closed)";

        foreach ($businessHours as $day => $hours) {
            if ($hours['closed'] == 1) {
                $hours['open'] = null;
                $hours['close'] = null;
            }

            $params = [
                ':day' => $day,
                ':open' => $hours['open'],
                ':close' => $hours['close'],
                ':closed' => $hours['closed'],
            ];

            $this->db->prepareQuery($sql);
            $this->db->execute($params);
        }
    }

    /**
     * Retrieves all business hours from the database.
     *
     * @return array Associative array of business hours.
     */
    public function getAllBusinessHours() {
        $sql = "SELECT day, open_time, close_time, closed FROM business_hours";

        $this->db->prepareQuery($sql);
        $businessHours = $this->db->resultSet();

        return $businessHours;
    }
}
