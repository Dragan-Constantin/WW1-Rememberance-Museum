<?php
include_once("libraries/Database.php");

/**
 * Model for handling data related to the About page.
 */
class AboutModel {
    private $db;

    /**
     * Constructor initializes the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }
}