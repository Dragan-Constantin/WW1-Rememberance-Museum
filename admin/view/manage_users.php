<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Roles</h1>
    <a href="new-user" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-solid fa-plus text-white-50"></i> New user
    </a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Manage User Roles Form -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manage User Roles</h6>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="selectedUserID">User ID</label>
                            <input type="number" class="form-control" id="selectedUserID" name="selectedUserID" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="selectedUserRole">User Role</label>
                            <select class="form-control" id="selectedUserRole" name="selectedUserRole" required>
                                <option value="pending">Pending</option>
                                <option value="viewer">Viewer</option>
                                <option value="editor">Editor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User Role</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Current Users Table -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Current Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="currentUsersTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder for current users data -->
                            <?php foreach ($current_users as $current_user) {
                                // var_dump($current_user);
                                $id = $current_user["id"];
                                $name = $current_user["username"];
                                $role = $current_user["role"];
                            echo "<tr>
                                <td>$id</td>
                                <td>$name</td>
                                <td>$role</td>
                                <td>
                                    <!-- Form for editing the user -->
                                    <form action='' method='POST' style='display:inline;'>
                                        <input type='hidden' name='currentUserID' value='$id'>
                                        <input type='hidden' name='currentAction' value='1'>
                                        <button type='submit' class='btn btn-primary btn-sm'>Edit</button>
                                    </form>
                                    <!-- Form for deleting the user -->
                                    <a class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteUserModal$id'>Delete</a>
                                </td>
                            </tr>
                            <!-- Delete User Modal-->
                            <div class='modal fade' id='deleteUserModal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
                                aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Are you sure?</h5>
                                            <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>You are about to remove/delete this user from the user database.<br> Select 'Confirm' below if you are ready to remove/delete this user from your database.</div>
                                        <div class='modal-footer'>
                                            <button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancel</button>
                                            <!-- Form for denying the user -->
                                            <form action='' method='POST' style='display:inline;'>
                                                <input type='hidden' name='currentUserID' value='$id'>
                                                <input type='hidden' name='currentAction' value='2'>
                                                <button type='submit' class='btn btn-danger'>Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>"; } ?>
                            <!-- Additional rows go here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Users Table -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pending Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="pendingUsersTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder for pending users data -->
                            <?php foreach ($pending_users as $pending_user) {
                                $id = $pending_user["id"];
                                $name = $pending_user["username"];
                                $role = $pending_user["role"];
                                echo "<tr>
                                <td>$id</td>
                                <td>$name</td>
                                <td>$role</td>
                                <td>
                                    <!-- Form for approving the user -->
                                    <form action='' method='POST' style='display:inline;'>
                                        <input type='hidden' name='pendingUserID' value='$id'>
                                        <input type='hidden' name='pendingAction' value='1'>
                                        <button type='submit' class='btn btn-success btn-sm'>Approve</button>
                                    </form>
                                    <!-- Button to display modal for deleting user -->
                                    <a class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteUserModal$id'>Deny</a>
                                </td>
                            </tr>
                            <!-- Delete User Modal-->
                            <div class='modal fade' id='deleteUserModal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
                                aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Are you sure?</h5>
                                            <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>You are about to remove/delete this user from the user database.<br> Select 'Confirm' below if you are ready to remove/delete this user from your database.</div>
                                        <div class='modal-footer'>
                                            <button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancel</button>
                                            <!-- Form for denying the user -->
                                            <form action='' method='POST' style='display:inline;'>
                                                <input type='hidden' name='pendingUserID' value='$id'>
                                                <input type='hidden' name='pendingAction' value='2'>
                                                <button type='submit' class='btn btn-danger'>Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>"; } ?>
                            <!-- Additional rows go here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

