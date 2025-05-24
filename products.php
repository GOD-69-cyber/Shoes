<?php 
include('partals/header.php'); 
?>

<h1>Products</h1>

<?php
$products = [
    1 => ['name' => 'Ut eu feugiat', 'price' => 100, 'img' => 'images/product/01.jpg', 'desc' => 'Fusce in dui et neque malesuada tincidunt nec at urna.'],
    2 => ['name' => 'Curabitur et turpis', 'price' => 80, 'img' => 'images/product/02.jpg', 'desc' => 'Etiam et sapien ut nunc blandit euismod.'],
    3 => ['name' => 'Mauris consectetur', 'price' => 60, 'img' => 'images/product/03.jpg', 'desc' => 'Curabitur pellentesque ullamcorper massa ac ultricies.'],
    4 => ['name' => 'Proin volutpat', 'price' => 260, 'img' => 'images/product/04.jpg', 'desc' => 'Morbi non risus vitae est vestibulum tincidunt ac eget metus.'],
    5 => ['name' => 'Aenean tempus', 'price' => 80, 'img' => 'images/product/05.jpg', 'desc' => 'Aenean eu elit arcu. Quisque eget blandit erat.'],
    6 => ['name' => 'Nulla luctus urna', 'price' => 190, 'img' => 'images/product/06.jpg', 'desc' => 'Nunc nisl nisi, aliquet eu gravida vitae, porta vel ante.'],
   
];

$counter = 0;
foreach ($products as $id => $product):
    $counter++;
    $noMarginClass = ($counter % 3 === 0) ? ' no_margin_right' : '';
?>
    <div class="product_box<?= $noMarginClass ?>">
        <h3><?= htmlspecialchars($product['name']) ?></h3>
        <a href="productdetail.php?id=<?= $id ?>">
            <img src="<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" />
        </a>
        <p><?= htmlspecialchars($product['desc']) ?></p>
        <p class="product_price">$ <?= $product['price'] ?></p>
        <a href="index.php?addcart=<?= $id ?>" class="addtocart" title="Add to Cart"></a>
        <a href="productdetail.php?id=<?= $id ?>" class="detail" title="View Details"></a>
    </div>
<?php endforeach; ?>

<div class="cleaner"></div>

<?php include('partals/footer.php'); ?>
