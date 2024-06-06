<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New User</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- New User Form -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="newUserFName">First Name</label>
                            <input type="text" class="form-control" id="newUserFName" name="newUserFName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="newUserLName">Last Name</label>
                            <input type="text" class="form-control" id="newUserLName" name="newUserLName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newUserEmail">Email</label>
                        <input type="email" class="form-control" id="newUserEmail" name="newUserEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="newUserPassword" name="newUserPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newUserRole">User Role</label>
                        <select class="form-control" id="newUserRole" name="newUserRole" required>
                            <option value="pending">Pending</option>
                            <option value="viewer">Viewer</option>
                            <option value="editor">Editor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </div>

</div>
