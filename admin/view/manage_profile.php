<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
</div>

<!-- Content Row -->
<div class="row justify-content-center">

    <!-- Edit Profile Form -->
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="text-center mb-4 position-relative">
                        <div class="profile-image-wrapper">
                            <img class="img-profile rounded-circle" src="<?php echo $_SESSION['profile_picture'];?>" alt="Profile Picture" id="profileImage" style="cursor: pointer;">
                            <span class="edit-icon"><i class="fas fa-pen"></i></span>
                        </div>
                        <input type="file" class="form-control-file d-none" id="profilePicture" name="profilePicture" accept="image/*">
                    </div>
                    <!--<div class="form-group">
                        <label for="profilePictureHidden">Profile Picture</label>
                        <input type="file" class="form-control-file" id="profilePictureHidden" name="profilePictureHidden" accept="image/*">
                    </div>-->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="newUserFName">First Name</label>
                            <input type="text" class="form-control" id="newUserFName" name="newUserFName" value='<?php echo explode(" ", $_SESSION['username'])[0];?>' required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="newUserLName">Last Name</label>
                            <input type="text" class="form-control" id="newUserLName" name="newUserLName" value='<?php echo explode(" ", $_SESSION['username'])[1];?>' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newUserEmail">Email</label>
                        <input type="email" class="form-control" id="newUserEmail" name="newUserEmail" value='<?php echo $_SESSION['email'];?>' required>
                    </div>
                    <div class="form-group">
                        <label for="newUserPassword">Password</label>
                        <input type="password" class="form-control" id="newUserPassword" name="newUserPassword" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<style>
    .profile-image-wrapper {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto;
        border-radius: 50%;
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
    .edit-icon {
        position: absolute;
        bottom: 8px;
        right: 8px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        border-radius: 50%;
        padding: 6px;
        cursor: pointer;
        z-index: 1;
    }
    .profile-image-wrapper:hover .img-profile {
        opacity: 0.7;
    }
    .profile-image-wrapper:hover .edit-icon {
        opacity: 1;
    }
</style>

<script>
    document.getElementById('profileImage').onclick = function() {
        document.getElementById('profilePicture').click();
    };

    document.getElementById('profilePicture').onchange = function(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('profileImage').src = URL.createObjectURL(file);
        }
    };
</script>
