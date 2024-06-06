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
    $target = $address;

    // Remove query parameters from the address
    if (str_contains($address, "?")) {
        $target = substr($target, 0, strpos($target, '?'));
    }

    $localhost = rtrim(str_replace('http://localhost', '', $_ENV['SITE_URL']), '/');

    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        // User is not logged in, redirect to login page
        if ($address != "/login" && $address != "/register") {
            echo '<meta http-equiv="refresh" content="0;url=login">';
        }
    }

    // Check if the user's role is pending
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'pending') {
        if ($address != "/login" && $address != "/register" && $address != "/pending") {
            echo '<meta http-equiv="refresh" content="0;url=pending">';
        }
    }

    // Include the header for most pages
    if ($address != '/login' && $address != '/register' && $address != '/pending') {
        include_once("view/header.php");
    }

    // Route the request to the appropriate controller and method
    switch ($target) {
        case "/":
            echo '<meta http-equiv="refresh" content="0;url=home">';
            break;
        case "/home":
            include_once("controllers/homeController.php");
            $page = new HomeController;
            $page->getHomePage();
            break;
        case "/pending":
            include_once("view/pending.php");
            break;
        case "/events":
            include_once("controllers/eventsController.php");
            $page = new EventsController;
            $page->getEventsPage();
            break;
        case "/volunteers":
            include_once("controllers/volunteersController.php");
            $page = new VolunteersController;
            $page->getVolunteersPage();
            break;
        case "/new-volunteer":
            include_once("controllers/newVolunteerController.php");
            $page = new NewVolunteerController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $page->processNewVolunteer();
            } else {
                $page->getNewVolunteerPage();
            }
            break;
        case "/edit-volunteer":
            $volunteerId = isset($_GET['id']) ? $_GET['id'] : null;
            include_once("controllers/editVolunteerController.php");
            $page = new EditVolunteerController();
            $page->getEditVolunteerPage($volunteerId);
            break;
        case "/media":
            include_once("controllers/mediaController.php");
            $page = new MediaController;
            $page->getMediaPage();
            break;
        case "/new-media":
            include_once("controllers/newMediaController.php");
            $page = new NewMediaController();
            $page->getNewMediaPage();
            break;
        case "/settings":
            include_once("controllers/settingsController.php");
            $page = new SettingsController;
            $page->getSettingsPage();
            break;
        case "/manage-users":
            include_once("controllers/manageUsersController.php");
            $page = new ManageUsersController();
            $page->getManageUsersPage();
            break;
        case "/new-user":
            include_once("controllers/newUserController.php");
            $page = new NewUserController();
            $page->getNewUserPage();
            break;
        case "/manage-profile":
            include_once("controllers/manageProfileController.php");
            $page = new ManageProfileController();
            $page->getManageProfilePage();
            break;
        case "/manage-mailing":
            include_once("controllers/manageMailingController.php");
            $page = new ManageMailingController();
            $page->getManageMailingPage();
            break;
        case "/volunteers-recruiting":
            include_once("controllers/recruitingController.php");
            $page = new RecruitingController;
            $page->getRecruitingPage();
            break;
        case "/accept-candidate":
            include_once("controllers/recruitingController.php");
            $page = new RecruitingController();
            $candidateId = isset($_GET['id']) ? $_GET['id'] : null;
            $page->acceptCandidate($candidateId);
            break;
        case "/reject-candidate":
            include_once("controllers/recruitingController.php");
            $page = new RecruitingController();
            $candidateId = isset($_GET['id']) ? $_GET['id'] : null;
            $page->rejectCandidate($candidateId);
            break;
        case "/delete-volunteer":
            $volunteerId = isset($_GET['id']) ? $_GET['id'] : null;
            include_once("controllers/volunteersController.php");
            $page = new VolunteersController();
            $page->deleteVolunteer($volunteerId);
            break;
        case "/login":
            include_once("controllers/loginController.php");
            $page = new LoginController;
            $page->getLoginPage();
            $page->authenticate();
            break;
        case "/register":
            include_once("controllers/registerController.php");
            $page = new RegisterController;
            $page->getRegisterPage();
            $page->register();
            break;
        case "/logout":
            session_unset();
            session_destroy();
            echo '<meta http-equiv="refresh" content="0;url=login">';
            exit();
        case "/business-hours":
            include_once("controllers/businessHoursController.php");
            $page = new BusinessHoursController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $businessHours = $_POST;
                $page->changeBusinessHours($businessHours);
            } else {
                $page->getBusinessHoursPage();
            }
            break;
        default:
            include_once("view/404.php");
            break;
    }

    // Include the footer for most pages
    if ($address != '/login' && $address != '/register' && $address != '/pending') {
        include_once("view/footer.php");
    }
}
