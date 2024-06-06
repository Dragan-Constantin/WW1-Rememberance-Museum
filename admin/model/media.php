<?php
require_once("libraries/Database.php");

/**
 * Model for managing media-related operations.
 */
class MediaModel {
    private $db;

    /**
     * Constructor to initialize the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Retrieves media assets by page name.
     *
     * @param string $page_name The name of the page to filter media assets by.
     * @return array The list of media assets for the specified page.
     */
    public function getMediaByPage($page_name) {
        $sql = "SELECT * FROM assets WHERE category = :page_name";
        $this->db->prepareQuery($sql);
        return $this->db->resultSet([':page_name' => $page_name]);
    }

    /**
     * Retrieves all media assets ordered by category.
     *
     * @return array The list of all media assets.
     */
    public function getAllMedia() {
        $sql = "SELECT * FROM assets ORDER BY category ASC";
        $this->db->prepareQuery($sql);
        return $this->db->resultSet();
    }
}
