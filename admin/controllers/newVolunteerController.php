<?php
require_once("model/volunteers.php");

/**
 * Controller class for handling new volunteer-related operations.
 */
class NewVolunteerController {
    private $model;

    /**
     * Constructor to initialize the VolunteerModel.
     */
    public function __construct() {
        $this->model = new VolunteerModel();
    }

    /**
     * Displays the page to create a new volunteer.
     */
    public function getNewVolunteerPage() {
        include_once('view/new_volunteer.php');
    }

    /**
     * Processes the form submission for creating a new volunteer.
     */
    public function processNewVolunteer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $volunteerData = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'age' => $_POST['age'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'post_code' => $_POST['post_code'],
                'country' => $_POST['country'],
                'details' => $_POST['details']
            ];

            if ($this->validateVolunteerData($volunteerData)) {
                $this->model->insertVolunteer($volunteerData);
                header("Location: volunteers.php");
                exit();
            } else {
                echo "Invalid input data.";
                include_once('view/new_volunteer.php');
            }
        } else {
            include_once('view/new_volunteer.php');
        }
    }

    /**
     * Validates the data submitted for creating a new volunteer.
     *
     * @param array $data The data to validate.
     * @return bool Returns true if the data is valid, false otherwise.
     */
    private function validateVolunteerData($data) {
        $namePattern = "/^[A-Za-z]{2,}$/";
        if (!preg_match($namePattern, $data['first_name']) || !preg_match($namePattern, $data['last_name'])) {
            return false;
        }
        if ($data['age'] < 0) {
            return false;
        }

        $allowedCountries = [
            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Argentina", "Armenia", "Australia", "Austria",
            "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin",
            "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso",
            "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile",
            "China", "Colombia", "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba",
            "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt",
            "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland",
            "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea",
            "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran",
            "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
            "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
            "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives",
            "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco",
            "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands",
            "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau",
            "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania",
            "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa",
            "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone",
            "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka",
            "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand",
            "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu",
            "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan",
            "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
        ];

        if (!in_array($data['country'], $allowedCountries)) {
            return false;
        }
        return true;
    }
}
