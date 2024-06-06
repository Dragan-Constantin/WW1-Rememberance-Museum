<?php
include_once("libraries/Database.php");

/**
 * Model for handling data related to assets.
 */
class AssetModel {
    private $db;

    /**
     * Constructor initializes the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Retrieves all assets from the database.
     *
     * @return array The result set of assets.
     */
    public function getAssets() {
        $sql = "SELECT * FROM assets";
        $this->db->prepareQuery($sql);
        return $this->db->resultSet();
    }
}