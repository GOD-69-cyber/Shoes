<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
            // Выводим полученные данные (или можно использовать их для дальнейшей обработки)
            echo "Order Details:<br>";
            echo "Full Name: $full_name<br>";
            echo "Address: $address<br>";
            echo "City: $city<br>";
            echo "Country: $country<br>";
            echo "Email: $email<br>";
            echo "Phone: $phone<br>";
        } else {
            echo "Please provide a valid email address.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
