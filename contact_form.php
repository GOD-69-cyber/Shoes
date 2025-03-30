<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $author = htmlspecialchars($_POST['author']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']); // Subject field
    $text = htmlspecialchars($_POST['text']); // Message field
// Check if all fields are filled
    if (!empty($author) && !empty($email) && !empty($phone) && !empty($text)) {
        // Additional email format validation
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Thank you, $author! We have received your message.<br>";
            echo "Email: $email<br>";
            echo "Subject: $phone<br>";
            echo "Message: $text<br>";
        } else {
            echo "Please provide a valid email address.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
