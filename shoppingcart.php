<?php
session_start();
require_once 'classes/Cart.php';

$cart = new Cart();

$products = [
    1 => ['name' => 'Ut eu feugiat', 'price' => 100, 'img' => 'images/product/01.jpg', 'desc' => 'Nulla rutrum neque vitae erat condimentum eget malesuada.'],
    2 => ['name' => 'Curabitur et turpis', 'price' => 80, 'img' => 'images/product/02.jpg', 'desc' => 'Sed congue, erat id congue vehicula. Validate XHTML & CSS.'],
    3 => ['name' => 'Mauris consectetur', 'price' => 60, 'img' => 'images/product/03.jpg', 'desc' => 'Morbi non risus vitae est vestibulum tincidunt ac eget metus.'],
    4 => ['name' => 'Proin volutpat', 'price' => 220, 'img' => 'images/product/04.jpg', 'desc' => 'Sed semper euismod dolor sit amet interdum. Phasellus in mi eros.'],
    5 => ['name' => 'Aenean tempus', 'price' => 180, 'img' => 'images/product/05.jpg', 'desc' => 'Maecenas porttitor erat quis leo pellentesque molestie.'],
    6 => ['name' => 'Nulla luctus urna', 'price' => 160, 'img' => 'images/product/06.jpg', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['quantities'] as $productId => $qty) {
        $cart->updateItem((int)$productId, (int)$qty);
    }
    header("Location: shoppingcart.php");
    exit();
}

include('partals/header.php');
?>

<h1>Shopping Cart</h1>

<form method="POST" action="shoppingcart.php">
<table width="680px" cellspacing="0" cellpadding="5">
    <tr bgcolor="#ddd">
        <th width="220" align="left">Image</th>
        <th width="180" align="left">Description</th>
        <th width="100" align="center">Quantity</th>
        <th width="60" align="right">Price</th>
        <th width="60" align="right">Total</th>
        <th width="90"></th>
    </tr>
    <?php
    $items = $cart->getItems();
    if (empty($items)):
    ?>
    <tr><td colspan="6" align="center">Shopping cart is empty</td></tr>
    <?php else:
        foreach ($items as $productId => $qty):
            $product = $products[$productId];
            $lineTotal = $product['price'] * $qty;
    ?>
    <tr>
        <td><img src="<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" /></td>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td align="center">
            <input type="number" name="quantities[<?= $productId ?>]" value="<?= $qty ?>" min="0" style="width: 40px; text-align: right" />
        </td>
        <td align="right">$<?= $product['price'] ?></td>
        <td align="right">$<?= $lineTotal ?></td>
        <td align="center">
            <a href="remove_item.php?id=<?= $productId ?>" onclick="return confirm('Remove an item?')">
                <img src="images/remove_x.gif" alt="remove" /><br />Remove
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3" align="right" height="30px">
            Click “Update Cart” after changing the quantity
        </td>
        <td align="right" style="background:#ddd; font-weight:bold">Total</td>
        <td align="right" style="background:#ddd; font-weight:bold">$<?= $cart->getTotal($products) ?></td>
        <td style="background:#ddd; font-weight:bold"></td>
    </tr>
    <?php endif; ?>
</table>

<p>
    <input type="submit" value="Update cart" />
</p>
</form>

<div style="float:right; width: 180px; margin-top: 10px">
    <a href="checkout.php" class="checkout_btn">Place an order</a>
</div>

<?php include('partals/footer.php'); ?>
