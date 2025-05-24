<?php
session_start();
require_once 'classes/Cart.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: checkout.php");
    exit();
}

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Security error: invalid CSRF token.");
}

$cart = new Cart();

$items = $cart->getItems();
if (empty($items)) {
    die("Shopping cart is empty.");
}


$products = [
    1 => ['name' => 'Ut eu feugiat', 'price' => 100],
    2 => ['name' => 'Curabitur et turpis', 'price' => 80],
    3 => ['name' => 'Mauris consectetur', 'price' => 60],
    4 => ['name' => 'Proin volutpat', 'price' => 220],
    5 => ['name' => 'Aenean tempus', 'price' => 180],
    6 => ['name' => 'Nulla luctus urna', 'price' => 160],
];


$total = 0;
foreach ($items as $productId => $qty) {
    if (!isset($products[$productId])) {
        die("Error: product with ID $productId was not found.");
    }
    $total += $products[$productId]['price'] * $qty;
}

$full_name = trim($_POST['full_name'] ?? '');
$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$country = trim($_POST['country'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');

if (!$full_name || !$address || !$city || !$country || !$email || !$phone) {
    die("Please fill in all fields.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Incorrect email format.");
}


$host = 'localhost';
$dbname = 'data';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Error connecting to the base: " . $e->getMessage());
}


$stmt = $pdo->prepare("INSERT INTO orders (full_name, address, city, country, email, phone, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$full_name, $address, $city, $country, $email, $phone, $total]);

$orderId = $pdo->lastInsertId();




$cart->clear();

header("Location: thankyou.php?order_id=$orderId");
exit();
