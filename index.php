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


if (isset($_GET['addcart'])) {
    $productId = (int)$_GET['addcart'];
    if (isset($products[$productId])) {
        $cart->addItem($productId, 1);
    }
    header("Location: index.php");
    exit();
}

include('partals/header.php');
?>

<div id="slider-wrapper">
    <div id="slider" class="nivoSlider">
        <img src="images/slider/02.jpg" alt="" />
        <a href="#"><img src="images/slider/01.jpg" alt="" title="This is an example of a caption" /></a>
        <img src="images/slider/03.jpg" alt="" />
        <img src="images/slider/04.jpg" alt="" title="#htmlcaption" />
    </div>
    <div id="htmlcaption" class="nivo-html-caption">
        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
    </div>
</div>

<script src="js/jquery-1.4.3.min.js"></script>
<script src="js/jquery.nivo.slider.pack.js"></script>
<script>
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>

<h1>New Products</h1>

<?php
$counter = 0;
foreach ($products as $id => $product):
    $counter++;
    $noMarginClass = ($counter % 3 === 0) ? ' no_margin_right' : '';
?>
<div class="product_box<?= $noMarginClass ?>">
    <h3><?= htmlspecialchars($product['name']) ?></h3>
    <a href="productdetail.php"><img src="<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" /></a>
    <p><?= htmlspecialchars($product['desc']) ?></p>
    <p class="product_price">$ <?= $product['price'] ?></p>
    <a href="index.php?addcart=<?= $id ?>" class="addtocart" title="Add to Cart"></a>
    <a href="productdetail.php" class="detail"></a>
</div>
<?php endforeach; ?>

<div class="cleaner"></div>

<?php include('partals/footer.php'); ?>
