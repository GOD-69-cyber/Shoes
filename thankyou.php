<?php
session_start();

$orderId = $_GET['order_id'] ?? null;
if (!$orderId) {
    header("Location: index.php");
    exit();
}

include('partals/header.php');
?>

<h1>Thank you for ordering!</h1>
<p>Your order №<?= htmlspecialchars($orderId) ?> has been successfully accepted.</p>
<p>We will contact you shortly for confirmation.</p>

<?php include('partals/footer.php'); ?>
