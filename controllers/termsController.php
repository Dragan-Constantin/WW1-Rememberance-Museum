<?php

/**
 * Controller for the Terms and Conditions page.
 */
class TermsController {

    /**
     * Displays the Terms and Conditions page.
     *
     * Includes the Terms and Conditions page view.
     */
    public function getTermsPage() {
        include_once("view/terms.php");
    }
}