<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Media</h1>
    <a href="new-media" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-solid fa-plus text-white-50"></i> New Media
    </a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Page Selector -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Page Selector</h6>
            </div>
            <div class="card-body">
                <select class="form-control" id="pageSelector">
                    <option value="all">All</option>
                    <option value="homepage">Home</option>
                    <option value="about">About</option>
                    <option value="activities">Activities</option>
                    <option value="gift shop">Gift Shop</option>
                    <option value="help us">Help Us</option>
                    <option value="contact">Contact</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Media Content -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Media Content</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Function to truncate the string to a specific length
                            function truncateString($string, $length) {
                                if (strlen($string) > $length) {
                                    $string = substr($string, 0, $length) . '...';
                                }
                                return $string;
                            }
                            ?>
                            <?php foreach ($media['all'] as $item) {
                                $id=$item['id'];
                                $category=$item['category'];
                                $l_category = strtolower($category);
                                $title = $item['title'];
                                $type = $item['type'];
                                $description = truncateString($item['description'], 40);
                                if (str_contains($item['file_path'], "assets/images")) {
                                    $relativePath = '../' . $item['file_path'];
                                    $realPath = realpath($relativePath);
                                    $file_path = 'serve_image.php?path=' . urlencode(basename($item['file_path'])); // Use the serving script
                                } else { $file_path = $item['file_path'];}
                                ?>
                                <?php echo "<tr data-page='$l_category'>
                                    <td>$category</td>
                                    <td>$title</td>
                                    <td>$type</td>
                                    <td>$description</td>
                                    <td>
                                        <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editMediaModal$id'>Edit</button>
                                        <button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteUserModal$id'>Delete</button>
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
                                </div>
                                <!-- Edit Media Modal-->
                                <div class='modal fade' id='editMediaModal$id' tabindex='-1' role='dialog' aria-labelledby='editMediaModalLabel$id' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='editMediaModalLabel$id'>Edit Media</h5>
                                                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>×</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                <form action='' method='POST'>
                                                    <div class='text-center mb-4 position-relative'>
                                                        <div class='profile-image-wrapper'>
                                                            <img class='img-profile' src='$file_path' alt='$title' id='selectedImage' style='cursor: pointer;'>
                                                        </div>
                                                        <!--<textarea class='form-control'>$file_path</textarea>-->
                                                        <input type='file' class='form-control-file d-none' id='selectedImage' name='selectedImage' accept='image/*'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='category'>Category: $category</label>
                                                        <!--<input type='text' class='form-control' name='category' value='$category' disabled>-->
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='title'>Title: $title</label>
                                                        <!--<input type='text' class='form-control' name='title' value='$title' disabled>-->
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='description'>Description</label>
                                                        <textarea class='form-control' name='description' required>$description</textarea>
                                                    </div>
                                                    <input type='hidden' name='id' value='$id'>
                                                    <button type='submit' class='btn btn-primary'>Save Changes</button>
                                                </form>
                                            </div>
                                            <div class='modal-footer'>
                                                <button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>"?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .profile-image-wrapper {
        position: relative;
        width: 150px;
        margin: 0 auto;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .img-profile {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease-in-out;
    }
    .profile-image-wrapper:hover .img-profile {
        opacity: 0.7;
    }
    .profile-image-wrapper:hover .edit-icon {
        opacity: 1;
    }
</style>

<script>
document.getElementById('pageSelector').addEventListener('change', function() {
    var selectedPage = this.value.toLowerCase();
    console.log('Selected Page:', selectedPage);
    var rows = document.querySelectorAll('#dataTable tbody tr');
    
    rows.forEach(function(row) {
        var page = row.getAttribute('data-page').toLowerCase();
        console.log('Row Page:', page);
        if (selectedPage === 'all' || page === selectedPage) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
