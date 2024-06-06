<?php

require_once("model/candidates.php");
require_once("model/volunteers.php");

/**
 * Controller for handling volunteer recruiting operations.
 */
class RecruitingController {
    private $candidateModel;
    private $volunteerModel;

    /**
     * Constructor to initialize the models.
     */
    public function __construct() {
        $this->candidateModel = new CandidateModel();
        $this->volunteerModel = new VolunteerModel();
    }

    /**
     * Displays the volunteer recruiting page.
     */
    public function getRecruitingPage() {
        $candidates = $this->candidateModel->getAllCandidates();
        include_once('view/volunteer_recruiting.php');
    }

    /**
     * Accepts a candidate and converts them to a volunteer.
     *
     * @param int $id The ID of the candidate to be accepted.
     */
    public function acceptCandidate($id) {
        $candidate = $this->candidateModel->getCandidateById($id);
        if ($candidate) {
            $this->volunteerModel->insertVolunteer($candidate);
            $this->candidateModel->deleteCandidate($id);
        }
        echo '<meta http-equiv="refresh" content="0;url=volunteers-recruiting">';
        exit();
    }

    /**
     * Rejects a candidate by deleting their record.
     *
     * @param int $id The ID of the candidate to be rejected.
     */
    public function rejectCandidate($id) {
        $this->candidateModel->deleteCandidate($id);
        echo '<meta http-equiv="refresh" content="0;url=volunteers-recruiting">';
    }
}