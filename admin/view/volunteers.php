<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Volunteers</h1>
    <a href="new-volunteer" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-solid fa-plus text-white-50"></i> New Volunteer
    </a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- DataTales Example -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Volunteers Information</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($volunteers as $volunteer): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($volunteer['FirstName']); ?></td>
                                <td><?php echo htmlspecialchars($volunteer['LastName']); ?></td>
                                <td><?php echo htmlspecialchars($volunteer['Email']); ?></td>
                                <td>
                                    <!-- Lien d'édition du volontaire avec l'ID du volontaire comme paramètre -->
                                    <button class="btn btn-primary btn-sm" onclick="editVolunteer(<?php echo $volunteer['VolunteerID']; ?>)">Edit</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $volunteer['VolunteerID']; ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function editVolunteer(volunteerId) {
        window.location.href = 'edit-volunteer?id=' + volunteerId; // Assurez-vous que le fichier PHP est correctement référencé ici
    }

    function confirmDelete(volunteerId) {
        if (confirm('Are you sure you want to delete this volunteer?')) {
            window.location.href = 'delete-volunteer?id=' + volunteerId; // Assurez-vous que le fichier PHP est correctement référencé ici
        }
    }
</script>
