<?php
session_start();
require_once 'classes/Cart.php';

$cart = new Cart();

if ($cart->getItems() == []) {
    header("Location: shoppingcart.php");
    exit();
}

$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

include('partals/header.php');
?>

<h1>Checkout</h1>

<form action="checkout_form.php" method="post" id="checkout_form">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

    <label for="full_name">FULL NAME:</label><br>
    <input type="text" id="full_name" name="full_name" required><br><br>

    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" required><br><br>

    <label for="city">City:</label><br>
    <input type="text" id="city" name="city" required><br><br>

    <label for="country">Country:</label><br>
    <input type="text" id="country" name="country" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" required><br><br>

    <button type="submit">Place an order</button>
</form>

<?php include('partals/footer.php'); ?>
