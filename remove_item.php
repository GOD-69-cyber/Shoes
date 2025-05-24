<?php
session_start();
require_once 'classes/Cart.php';

$cart = new Cart();

if (isset($_GET['id'])) {
    $cart->removeItem((int)$_GET['id']);
}

header("Location: shoppingcart.php");
exit();
