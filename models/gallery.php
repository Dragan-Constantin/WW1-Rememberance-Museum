<?php
include_once("libraries/Database.php");

/**
 * Model for handling data related to the gallery.
 */
class GalleryModel {
    private $db;

    /**
     * Constructor initializes the database connection.
     */
    public function __construct() {
        $this->db = new Database();
    }
}