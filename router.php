<?php

/**
 * Routes the incoming request to the appropriate controller and view.
 *
 * This function handles the routing for a web application by including the necessary controller
 * and calling the appropriate methods based on the request address.
 *
 * @param string $address The request URI to be routed.
 */
function route_request($address) {
    // Include the header view
    include_once("view/header.php");

    // Route the request to the appropriate controller based on the address
    switch ($address) {
        case "/":
            // Redirect to home
            echo '<meta http-equiv="refresh" content="0;url=home">';
            break;
        case "/home":
            include_once("controllers/homeController.php");
            $page = new HomeController;
            $page->getHomePage();
            break;
        case "/activities":
            include_once("controllers/activitiesController.php");
            $page = new ActivitiesController;
            $page->getActivitiesPage();
            break;
        case "/activities/register":
            include_once("controllers/activitiesRegisterController.php");
            $page = new ActivitiesRegisterController;
            $page->getActivitiesRegisterPage();
            break;
        case "/about":
            include_once("controllers/aboutController.php");
            $page = new AboutController;
            $page->getAboutPage();
            break;
        case "/gift-shop":
            include_once("controllers/giftShopController.php");
            $page = new GiftShopController;
            $page->getGiftShopPage();
            break;
        case "/help-us":
            include_once("controllers/helpUsController.php");
            $page = new HelpUsController;
            $page->getHelpUsPage();
            $page->sendHelpUsForm();
            break;
        case "/gallery":
            include_once("controllers/galleryController.php");
            $page = new GalleryController;
            $page->getGalleryPage();
            break;
        case "/contact":
            include_once("controllers/contactController.php");
            $page = new ContactController;
            $page->getContactPage();
            $page->sendContactForm();
            break;
        case "/visit-us":
            include_once("controllers/visitUsController.php");
            $page = new VisitUsController;
            $page->getVisitUsPage();
            break;
        case "/checkout":
            include_once("view/checkout.php");
            break;
        case "/success":
            include_once("view/success.php");
            break;
        case "/terms":
            include_once("controllers/termsController.php");
            $page = new TermsController;
            $page->getTermsPage();
            break;
        case "/activity-reservation":
            include_once("controllers/activityReservationController.php");
            $page = new ActivityReservationController;
            $page->getActivityReservationPage();
            $page->sendActivityReservationForm();
            break;
        default:
            include_once("view/404.php");
            break;
    }

    // Include the footer view
    $year = date("Y");
    $name = "WW1RC";
    include_once("view/footer.php");
}