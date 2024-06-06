<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    Edit Volunteer
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo htmlspecialchars($volunteerData['FirstName']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo htmlspecialchars($volunteerData['LastName']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($volunteerData['Age']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($volunteerData['Address']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($volunteerData['Email']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="postCode">Post Code</label>
                            <input type="text" class="form-control" id="postCode" name="post_code" value="<?php echo htmlspecialchars($volunteerData['PostCode']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country" required>
                                <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo htmlspecialchars($country); ?>" <?php if($country == $volunteerData['Country']) echo "selected"; ?>><?php echo htmlspecialchars($country); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control" id="details" name="details" rows="3" required><?php echo htmlspecialchars($volunteerData['Details']); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
