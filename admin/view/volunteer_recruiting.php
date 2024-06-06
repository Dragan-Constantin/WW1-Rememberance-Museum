<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Volunteer Requests</h1>
    <a href="new_volunteers.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-solid fa-plus text-white-50"></i> New Volunteer
    </a>
</div>

<!-- Content Row -->
<div class="row">
    <!-- DataTales Example -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Volunteer Requests Information</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($candidates as $candidate) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($candidate['FirstName']); ?></td>
                                <td><?php echo htmlspecialchars($candidate['LastName']); ?></td>
                                <td><?php echo htmlspecialchars($candidate['Email']); ?></td>
                                <td>
                                    <button class="btn btn-success btn-sm" onclick="confirmAction('accept', <?php echo $candidate['CandidateID']; ?>)">Accept</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmAction('reject', <?php echo $candidate['CandidateID']; ?>)">Reject</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmAction(action, candidateId) {
        let message = "";
        if (action === 'accept') {
            message = "Are you sure you want to accept this volunteer?";
        } else if (action === 'reject') {
            message = "Are you sure you want to reject this volunteer?";
        }

        if (confirm(message)) {
            window.location.href = action + '-candidate?id=' + candidateId;
        }
    }
</script>
