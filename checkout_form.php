<?php
session_start(); // Инициализация сессии

// Подключаемся к базе данных
$servername = "localhost";
$username = "root";
$password = "";  // Используем пустой пароль для XAMPP
$dbname = "data";  // Укажите имя вашей базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка CSRF токена
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Ошибка валидации CSRF токена.");
    }

    // Получаем данные из формы
    $full_name = htmlspecialchars($_POST['full_name']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $country = htmlspecialchars($_POST['country']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    // Проверяем, что все обязательные поля заполнены
    if (!empty($full_name) && !empty($address) && !empty($city) && !empty($country) && !empty($email) && !empty($phone)) {
        // Дополнительная валидация email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Подготовленное выражение для вставки данных в базу
            $stmt = $conn->prepare("INSERT INTO orders (full_name, address, city, country, email, phone) VALUES (?, ?, ?, ?, ?, ?)");

            if ($stmt === false) {
                die("Ошибка подготовки запроса: " . $conn->error);  // Ошибка подготовки запроса
            }

            // Привязываем параметры
            $stmt->bind_param("ssssss", $full_name, $address, $city, $country, $email, $phone);

            // Выполняем запрос
            if ($stmt->execute()) {
                echo "Thank you for your order!<br>";
                echo "Full Name: $full_name<br>";
                echo "Address: $address<br>";
                echo "City: $city<br>";
                echo "Country: $country<br>";
                echo "Email: $email<br>";
                echo "Phone: $phone<br>";
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