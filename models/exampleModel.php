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

    /**
     * Retrieves the count of music scores from the database.
     *
     * @return array The result containing the count of music scores.
     */
    public function getCountScores() {
        $this->db->prepareQuery("SELECT COUNT(`link`) as `count` FROM musics");
        $res = $this->db->resultSingle();
        return $res;
    }
}