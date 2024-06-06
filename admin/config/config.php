<?php

$HTML_TEMPLATES = array (
  'Notification of New Contact Form Submission' => '<meta charset=\'UTF-8\'>
        <meta http-equiv=\'X-UA-Compatible\' content=\'IE=edge\'>
        <meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'>
        <title>New Contact Form Submission</title>
        <!-- Tailwind CSS -->
        <script src=\'https://cdn.tailwindcss.com\'></script>
    
    <div class=\'bg-gray-100 p-4\'>
        <div class=\'max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl\'>
            <div class=\'flex\'>
                <div class=\'h-48 w-full\'>
                    <img class=\'h-full w-full object-cover\' src=\'view/img/mail-cover-lego-war.png\' alt=\'cover\'>
                </div>
            </div>
            <div class=\'p-8\'>
                <div class=\'uppercase tracking-wide text-xl font-bold text-indigo-500 text-center mb-6\'>Notification of New Contact Form Submission</div>
                <p class=\'mt-2 text-gray-600\'>Dear $receiverName,</p>
                <p class=\'mt-2 text-gray-600\'>I trust this message finds you well.</p>
                <p class=\'mt-2 text-gray-600\'>This email serves as a notification that you have recently received a new submission via your contact form on <a href=\'https://ww1rc.org.uk\' class=\'text-blue-500\'>ww1rc.org.uk</a>.</p>
                <div class=\'mt-4\'>
                    <p class=\'text-gray-600\'>The details of the submission are as follows:</p>
                    <div class=\'bg-gray-100 p-4 rounded-md shadow-md mb-4\'>
                        <ul class=\'text-gray-600\'>
                            <li><strong>Name of the Sender:</strong> $senderName</li>
                            <li><strong>Email Address:</strong> $senderEmail</li>
                            <li><strong>Subject of Inquiry:</strong> $reason</li>
                            <li><strong>Message:</strong> $message</li>
                        </ul>
                    </div>
                    <p class=\'mt-4 text-gray-600\'>Please take note of the information provided above for your records and ensure that appropriate action is taken.</p>
                    <p class=\'mt-4 text-gray-600\'>Thank you for your attention to this notification.</p>
                    <p class=\'mt-4 text-gray-600\'>Best regards,</p>
                    <p class=\'text-gray-600\'>The WW1 Remembrance Centre, IT Department</p>
                    <p class=\'mt-2 text-gray-600\'><i>(Note: This email is sent from a no-reply address. Please refrain from replying directly to this message.)</i></p>
                </div>
            </div>
        </div>
    </div>',
  'New User Registration Notification' => '<meta charset=\'UTF-8\'>
        <meta http-equiv=\'X-UA-Compatible\' content=\'IE=edge\'>
        <meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'>
        <title>New Contact Form Submission</title>
        <script src=\'https://cdn.tailwindcss.com\'></script>
    
    <div class=\'bg-gray-100 p-4\'>
        <div class=\'max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl\'>
            <div class=\'flex\'>
                <div class=\'h-48 w-full\'>
                    <img class=\'h-full w-full object-cover\' src=\'view/img/lego-ww1.jpg\' alt=\'cover\'>
                </div>
            </div>
            <div class=\'p-8\'>
                <div class=\'uppercase tracking-wide text-xl font-bold text-indigo-500 text-center mb-6\'>Notification of New User Registration</div>
                <p class=\'mt-2 text-gray-600\'>Dear $receiverName,</p>
                <p class=\'mt-2 text-gray-600\'>I trust this message finds you well.</p>
                <p class=\'mt-2 text-gray-600\'>This email serves as a notification that a new user has recently registered on the <a href=\'https://admin.ww1rc.org.uk\' class=\'text-blue-500\'>admin panel</a> of your website <a href=\'https://www.ww1rc.org.uk\' class=\'text-blue-500\'>ww1rc.org.uk</a>.</p>
                <div class=\'mt-4\'>
                    <p class=\'text-gray-600\'>The details of the registration are as follows:</p>
                    <div class=\'bg-gray-100 p-4 rounded-md shadow-md mb-4\'>
                        <ul class=\'text-gray-600\'>
                            <li><strong>Name:</strong> $senderName</li>
                            <li><strong>Email Address:</strong> $senderEmail</li>
                            <li><strong>Registration Date:</strong> $registrationDate</li>
                            <li><strong>Current Role:</strong> Pending Approval</li>
                        </ul>
                    </div>
                    <p class=\'mt-4 text-gray-600\'>Please take note of the information provided above for your records and ensure that appropriate action is taken.</p>
                    <p class=\'mt-4 text-gray-600\'>Thank you for your attention to this notification.</p>
                    <p class=\'mt-4 text-gray-600\'>Best regards,</p>
                    <p class=\'text-gray-600\'>The WW1 Remembrance Centre, IT Department</p>
                    <p class=\'mt-2 text-gray-600\'><i>(Note: This email is sent from a no-reply address. Please refrain from replying directly to this message.)</i></p>
                </div>
            </div>
        </div>
    </div>',
  'Password Reset Request Notification' => '<meta charset=\'UTF-8\'>
        <meta http-equiv=\'X-UA-Compatible\' content=\'IE=edge\'>
        <meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'>
        <title>New Contact Form Submission</title>
        <script src=\'https://cdn.tailwindcss.com\'></script>
    

    <div class=\'bg-gray-100 p-4\'>
        <div class=\'max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl\'>
            <div class=\'flex\'>
                <div class=\'h-48 w-full\'>
                    <img class=\'h-full w-full object-cover\' src=\'view/img/mail-change-password.jpg\' alt=\'cover\'>
                </div>
            </div>
            <div class=\'text-justify p-8\'>
                <div class=\'uppercase tracking-wide text-xl font-bold text-indigo-500 text-center mb-6\'>Password Reset Request</div>
                <p class=\'mt-2 text-gray-600\'>Dear $receiverName,</p>
                <p class=\'mt-2 text-gray-600\'>We hope this email finds you well.</p>
                <p class=\'mt-2 text-gray-600\'>We have received a request to reset the password associated with your account on the <a href=\'https://admin.ww1rc.org.uk\' class=\'text-blue-500\'>admin panel</a> of the website <a href=\'https://www.ww1rc.org.uk\' class=\'text-blue-500\'>ww1rc.org.uk</a>.</p>
                <p class=\'mt-2 text-gray-600\'>If you did not initiate this request, please ignore this email.</p>
                <p class=\'mt-2 text-gray-600\'>However, if you did request a password reset, please follow the instructions below:</p>
                <div class=\'mt-4\'>
                    <div class=\'bg-gray-100 p-2 rounded-md shadow-md mb-4 text-justify\'>
                        <p class=\'text-gray-600\'>To reset your password, please click on the following link: $passwordResetLink</p>
                        <p class=\'mt-4 text-gray-600\'>Once you click the link, you will be directed to a page where you can set a new password for your account.</p>
                        <p class=\'mt-4 text-gray-600\'>Please ensure that you choose a strong and secure password to protect your account.</p>
                    </div>
                    <p class=\'mt-4 text-gray-600\'>If you encounter any issues or require further assistance, please do not hesitate to contact us.</p>
                    <p class=\'mt-4 text-gray-600\'>Thank you for your attention to this notification.</p>
                    <p class=\'mt-4 text-gray-600\'>Best regards,</p>
                    <p class=\'text-gray-600\'>The WW1 Remembrance Centre, IT Department</p>
                    <p class=\'mt-2 text-gray-600\'><i>(Note: This email is sent from a no-reply address. Please refrain from replying directly to this message.)</i></p>
                </div>
            </div>
        </div>
    </div>',
);