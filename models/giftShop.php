<?php
include_once("libraries/Database.php");

/**
 * Model for handling data related to the gift shop.
 */
class GiftShopModel {
    private $db;

    /**
     * Constructor initializes the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Retrieves the business hours of the gift shop from the database.
     *
     * @return array The result set containing the business hours.
     */
    public function getBusinessHours(): array {
        $sql = "SELECT day, open_time, close_time, closed FROM business_hours";
        $this->db->prepareQuery($sql);
        return $this->db->resultSet();
    }
}