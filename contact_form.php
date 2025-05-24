<?php
session_start(); 


$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation error.");
    }


    $author = htmlspecialchars($_POST['author']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $text = htmlspecialchars($_POST['text']);

    
    if (!empty($author) && !empty($email) && !empty($phone) && !empty($text)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("INSERT INTO messages (author, email, phone, text) VALUES (?, ?, ?, ?)");

            if ($stmt === false) {
                die("Request preparation error: " . $conn->error);  
            }

            $stmt->bind_param("ssss", $author, $email, $phone, $text);

            
            if ($stmt->execute()) {
                echo "Thank you, $author! We have received your message.<br>";
                echo "Email: $email<br>";
                echo "Phone: $phone<br>";
                echo "Message: $text<br>";
            } else {
                echo "Error when sending data: " . $stmt->error; 
                file_put_contents("error_log.txt", "Error while executing the query: " . $stmt->error . "\n", FILE_APPEND);
            }

            
            $stmt->close();
        } else {
            echo "Please provide a valid email address.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}


$conn->close();
?>