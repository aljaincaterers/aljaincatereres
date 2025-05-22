<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_email = "admin@example.com"; // Replace with your email
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $category = $_POST['category'];
    $message = $_POST['message'];

    $subject = "New Catering Booking Request";
    $body = "You have received a new booking:\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Phone: $phone\n" .
            "Food Category: $category\n" .
            "Special Request: $message";

    $headers = "From: noreply@example.com";

    // Send to admin
    mail($admin_email, $subject, $body, $headers);

    // Send confirmation to user
    $user_subject = "Booking Confirmation - A L Jain Catering";
    $user_body = "Dear $name,\n\nThank you for your booking!\n\nDetails:\n$body\n\nWe will contact you shortly.";
    mail($email, $user_subject, $user_body, $headers);

    echo "Thank you! Your booking has been sent.";
} else {
    echo "Invalid request.";
}
?>
