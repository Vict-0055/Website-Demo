<?php
// Handle form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $visitor_email = $_POST['visitor_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate form data (basic validation)
    if (empty($name) || empty($visitor_email) || empty($subject) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Prepare email
    $to = "vickykich002@gmail.com";
    $email_subject = "New Form Submission";
    $email_body = "User Name: $name.\n".
                   "User Email: $visitor_email.\n".
                   "Subject: $subject.\n".
                   "User Message: $message.\n";
    $headers = "From: $visitor_email \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";

    // Send email
    mail($to, $email_subject, $email_body, $headers);

    // Redirect to contact page
    header("Location: contact.html");
}
?>