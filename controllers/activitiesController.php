<?php

require("models/asset.php");

/**
 * Class ActivitiesController
 *
 * This class manages the operations related to the activities page.
 * It is responsible for rendering the activities page with various events, displays, and temporary exhibitions.
 */
class ActivitiesController {
    private $model;
    
    /**
     * ActivitiesController constructor.
     *
     * Instantiates the ActivitiesModel object (commented out in this example).
     */
    public function __construct() {
        $this->model = new AssetModel();
    }

    /**
     * Displays the activities page.
     *
     * This method prepares lists of events, displays, and temporary exhibitions,
     * and includes the activities page view file to render this information.
     */
    public function getActivitiesPage() {
        $assets = $this->model->getAssets();
        $events = ["WW1 Battlefield Trips", "Book Sales", "Various Lectures and Talks"];
        $theDisplays = ["Exhibits & Collections", "Reproduction trench system", "Ship Hall", "Shop - Cash and Cards accepted.", "Outside displays: Re-enactor displays"];
        $temporaryExhibitions = ["From Flare Guns to Moon Landings", "Native Americans in WW1", "South with Shackleton", "Famous Actors and Actresses in WW1", 'The making of the original Film "All Quiet on the Western Front"', "Brides in bath murders 1915", "Percy Toplis - the monocled mutineer"];
        include_once('view/activities.php');
    }
}
