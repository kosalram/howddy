<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = htmlspecialchars($_POST['productName']);
    $productDescription = htmlspecialchars($_POST['productDescription']);
    $productURL = htmlspecialchars($_POST['productURL']);
    $contactEmail = htmlspecialchars($_POST['contactEmail']);
    $contactName = htmlspecialchars($_POST['contactName']);
    $contactTitle = htmlspecialchars($_POST['contactTitle']);
    $comments = htmlspecialchars($_POST['comments']);
    $captcha = htmlspecialchars($_POST['captcha']);

    // Basic validation for required fields (additional captcha validation should go here)
    if (!empty($productName) && !empty($productDescription) && !empty($productURL) && 
        !empty($contactEmail) && !empty($contactName) && !empty($contactTitle) && !empty($captcha)) {

        $to = "mail.howddy@gmail.com";
        $subject = "New Product Submission";
        $message = "
        Product Name: $productName\n
        Product Description: $productDescription\n
        Product URL: $productURL\n
        Contact Email: $contactEmail\n
        Contact Name: $contactName\n
        Contact Title: $contactTitle\n
        Comments: $comments\n
        ";

        $headers = "From: " . $contactEmail;

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Please fill all required fields.";
    }
}
?>
