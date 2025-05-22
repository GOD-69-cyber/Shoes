<?php
session_start(); // Инициализируем сессию

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = ""; // Используем пустой пароль для XAMPP
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка на ошибки подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка CSRF токена
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Ошибка валидации CSRF токена.");
    }

    // Получаем данные из формы
    $author = htmlspecialchars($_POST['author']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $text = htmlspecialchars($_POST['text']);

    // Проверка на заполненность всех полей
    if (!empty($author) && !empty($email) && !empty($phone) && !empty($text)) {
        // Дополнительная проверка email на корректность
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Подготовленное выражение для вставки данных
            $stmt = $conn->prepare("INSERT INTO messages (author, email, phone, text) VALUES (?, ?, ?, ?)");

            if ($stmt === false) {
                die("Ошибка подготовки запроса: " . $conn->error);  // Ошибка подготовки запроса
            }

            // Привязка параметров
            $stmt->bind_param("ssss", $author, $email, $phone, $text);

            // Выполнение запроса
            if ($stmt->execute()) {
                echo "Thank you, $author! We have received your message.<br>";
                echo "Email: $email<br>";
                echo "Phone: $phone<br>";
                echo "Message: $text<br>";
            } else {
                echo "Ошибка при отправке данных: " . $stmt->error;  // Если ошибка выполнения запроса
                file_put_contents("error_log.txt", "Ошибка при выполнении запроса: " . $stmt->error . "\n", FILE_APPEND);
            }

            // Закрываем подготовленное выражение
            $stmt->close();
        } else {
            echo "Please provide a valid email address.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}

// Закрываем соединение с базой данных
$conn->close();
?>