<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Roles</h1>
    <a href="new_user" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> New user
    </a>
</div>

<div>
<div class="row"><div class="col-md-6">
    <!-- SMTP Server Settings Form -->
    <div class="card mb-4">
        <div class="card-header">
            SMTP Server Settings
        </div>
        <div class="card-body">
            <p class="mb-4">Configure the SMTP (Simple Mail Transfer Protocol) server settings to send emails. You'll need the SMTP server address, port number, your email address, and the password for authentication.</p>
            <form action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="smtpServer">SMTP Server</label>
                        <input type="text" class="form-control" id="smtpServer" name="smtpServer" placeholder="Enter SMTP server" value="<?php echo $_ENV['SMTP_SERVER'];?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="smtpPort">Port</label>
                        <input type="number" class="form-control" id="smtpPort" name="smtpPort" placeholder="Enter port number" value="<?php echo $_ENV['SMTP_PORT']?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" class="form-control" id="smtpMail" name="smtpMail" placeholder="Enter email address" value="<?php echo $_ENV['SMTP_MAIL']?>" required>
                    </div>
                    <div class="form-group col-md-6 position-relative">
                        <label for="smtpPass">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="smtpPass" name="smtpPass" placeholder="Enter password" value="<?php echo $_ENV['SMTP_PASS']?>" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div></div>

    <!-- Email Address Settings Form -->
    <div class="col-md-6">
    <div class="card mb-4">
        <div class="card-header">
            Email Address Settings
        </div>
        <div class="card-body">
            <p class="mb-4">Specify the default email addresses used for sending and receiving emails. You can add multiple email addresses as needed.</p>
            <!-- Form to add a new email address -->
            <div class="form-row">
                <div class="col-md-12">
                <form id="addEmailAddressForm" action="" method="POST">
                    <div class="form-group">
                        <label for="newEmailAddress">Add New Email Address</label>
                        <input type="email" class="form-control" id="newEmailAddress" name="newEmailAddress" placeholder="Enter new email address">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Email</button>
                </form>
            </div>
            </div>

            <!-- Display existing email addresses -->
            <?php if(!empty($emails_array)): ?>
                <p class="mt-4">Existing Email Addresses:</p>
                <div class="row">
                    <?php foreach($emails_array as $email): ?>
                        <div class="col-md-6 mb-2">
                            <form class="existing-email-form" action="" method="POST">
                                <div class="input-group">
                                    <input type="email" name="originalEmailAddress" value="<?php echo $email?>" style="display:none;">
                                    <input type="email" class="form-control" name="existingEmailAddress" value="<?php echo $email; ?>">
                                    <input type="number" name="actionMail" id="actionMail-<?php echo $email; ?>" value="0" style="display:none;">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary edit-email" onclick="submitMailingListForm(this, 1)">Edit</button>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger delete-email" onclick="submitMailingListForm(this, 2)">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No email addresses found.</p>
            <?php endif; ?>
        </div>
    </div></div></div>

    <!-- Email Templates Form -->
    <div class="card mb-4">
        <div class="card-header">
            Email Templates
        </div>
        <div class="card-body">
            <p class="mb-4">Manage the templates used for automated emails. You can edit and save the content of these email templates.</p>
            <?php foreach ($HTML_TEMPLATES as $key => $email) { ?>
            <form class="emailTemplateForm mb-4" action="" method="POST">
                <div class="form-group">
                    <div class="emailTemplateContent" style="display: block;">
                        <?php echo $email;?>
                    </div>
                    <textarea class="form-control adminEmailTemplate" name="emailTemplate" rows="5" style="display: none;"></textarea>
                    <input name="emailTemplateKey" value="<?php echo $key?>" style="display: none;"></input>
                    <input name="emailTemplateOriginal" value="<?php echo $email?>" style="display: none;"></input>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="mx-2 editEmailTemplate btn btn-secondary">Edit</button>
                    <button type="button" class="mx-2 saveEmailTemplate btn btn-primary" onclick="submitTemplateForm(this)" style="display: none;">Save</button>
                </div>
            </form>
            <hr class="mt-4 mb-6">
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function submitMailingListForm(button, action) {
        var form = button.closest('form');
        var actionInput = form.querySelector('input[name="actionMail"]');
        actionInput.value = action;
        form.submit();
    };

    function submitTemplateForm(button) {
        var form = button.closest('form');
        // var actionInput = form.querySelector('input[name="actionMail"]');
        // actionInput.value = action;
        form.submit();
    };

    document.addEventListener('DOMContentLoaded', function() {

        const togglePasswordButton = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('smtpPass');
        
        togglePasswordButton.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        const emailTemplateForms = document.querySelectorAll('.emailTemplateForm');

        emailTemplateForms.forEach(function(form) {
            const editButton = form.querySelector('.editEmailTemplate');
            const saveButton = form.querySelector('.saveEmailTemplate');
            const emailTemplateContent = form.querySelector('.emailTemplateContent');
            const emailTemplateTextarea = form.querySelector('.adminEmailTemplate');

            editButton.addEventListener('click', function() {
                // Calculate the height of the content
                const contentHeight = emailTemplateContent.scrollHeight;
                // Set the textarea height to match the content height
                emailTemplateTextarea.style.height = contentHeight + 'px';

                emailTemplateContent.style.display = 'none';
                emailTemplateTextarea.style.display = 'block';
                editButton.style.display = 'none';
                saveButton.style.display = 'block';

                emailTemplateTextarea.value = emailTemplateContent.innerHTML.trim();
            });

            saveButton.addEventListener('click', function(event) {
                event.preventDefault();

                emailTemplateContent.innerHTML = emailTemplateTextarea.value.trim();
                emailTemplateContent.style.display = 'block';
                emailTemplateTextarea.style.display = 'none';
                editButton.style.display = 'block';
                saveButton.style.display = 'none';
            });
        });
    });
</script>
