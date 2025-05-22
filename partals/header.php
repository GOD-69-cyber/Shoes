<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= isset($pageTitle) ? $pageTitle : 'Shoes Store from templatemo' ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
    mainmenuid: "top_nav",
    orientation: 'h',
    classname: 'ddsmoothmenu',
    contentsource: "markup"
})
</script>
</head>

<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

    <div id="templatemo_header">
        <div id="site_title"><h1><a href="index.php">Online Shoes Store</a></h1></div>
        <div id="header_right">
            <p>
            <a href="#">My Account</a> | <a href="#">My Wishlist</a> | 
            <a href="#">My Cart</a> | <a href="checkout.php">Checkout</a> | 
            <a href="login.php">Log In</a></p>
            <p>Shopping Cart: <strong>3 items</strong> (<a href="shoppingcart.php">Show Cart</a>)</p>
        </div>
        <div class="cleaner"></div>
    </div>
    
    <div id="templatemo_menubar">
        <div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'class="selected"' : '' ?>>Home</a></li>
                <li><a href="products.php" <?= basename($_SERVER['PHP_SELF']) == 'products.php' ? 'class="selected"' : '' ?>>Products</a>
                    <ul>
                        <li><a href="#submenu1">Sub menu 1</a></li>
                        <li><a href="#submenu2">Sub menu 2</a></li>
                        <li><a href="#submenu3">Sub menu 3</a></li>
                        <li><a href="#submenu4">Sub menu 4</a></li>
                        <li><a href="#submenu5">Sub menu 5</a></li>
                    </ul>
                </li>
                <li><a href="about.php" <?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'class="selected"' : '' ?>>About</a>
                    <ul>
                        <li><a href="#submenu1">Sub menu 1</a></li>
                        <li><a href="#submenu2">Sub menu 2</a></li>
                        <li><a href="#submenu3">Sub menu 3</a></li>
                    </ul>
                </li>
                <li><a href="faqs.php" <?= basename($_SERVER['PHP_SELF']) == 'faqs.php' ? 'class="selected"' : '' ?>>FAQs</a></li>
                <li><a href="checkout.php" <?= basename($_SERVER['PHP_SELF']) == 'checkout.php' ? 'class="selected"' : '' ?>>Checkout</a></li>
                <li><a href="contact.php" <?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'class="selected"' : '' ?>>Contact Us</a></li>
            </ul>
            <br style="clear: left" />
        </div>
        <div id="templatemo_search">
            <form action="products.php" method="get">
                <input type="text" name="keyword" id="keyword" placeholder="Search..." class="txt_field" />
                <input type="submit" name="Search" value=" " alt="Search" class="sub_btn" />
            </form>
        </div>
    </div>
    
    <div id="templatemo_main">
        <div id="sidebar" class="float_l">
            <div class="sidebar_box"><span class="bottom"></span>
                <h3>Categories</h3>   
                <div class="content"> 
                    <ul class="sidebar_list">
                        <li class="first"><a href="#">Sed eget purus</a></li>
                        <li><a href="#">Vestibulum eleifend</a></li>
                        <li><a href="#">Nulla odio ipsum</a></li>
                        <li><a href="#">Suspendisse posuere</a></li>
                        <li><a href="#">Nunc a dui sed</a></li>
                        <li><a href="#">Curabitur ac mauris</a></li>
                        <li><a href="#">Mauris nulla tortor</a></li>
                        <li><a href="#">Nullam ultrices</a></li>
                        <li><a href="#">Nulla odio ipsum</a></li>
                        <li><a href="#">Suspendisse posuere</a></li>
                        <li><a href="#">Nunc a dui sed</a></li>
                        <li><a href="#">Curabitur ac mauris</a></li>
                        <li><a href="#">Mauris nulla tortor</a></li>
                        <li><a href="#">Nullam ultrices</a></li>
                        <li class="last"><a href="#">Sed eget purus</a></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar_box"><span class="bottom"></span>
                <h3>Bestsellers</h3>   
                <div class="content"> 
                    <div class="bs_box">
                        <a href="#"><img src="images/templatemo_image_01.jpg" alt="image" /></a>
                        <h4><a href="#">Donec nunc nisl</a></h4>
                        <p class="price">$10</p>
                        <div class="cleaner"></div>
                    </div>
                    <div class="bs_box">
                        <a href="#"><img src="images/templatemo_image_01.jpg" alt="image" /></a>
                        <h4><a href="#">Lorem ipsum dolor sit</a></h4>
                        <p class="price">$12</p>
                        <div class="cleaner"></div>
                    </div>
                    <div class="bs_box">
                        <a href="#"><img src="images/templatemo_image_01.jpg" alt="image" /></a>
                        <h4><a href="#">Phasellus ut dui</a></h4>
                        <p class="price">$20</p>
                        <div class="cleaner"></div>
                    </div>
                    <div class="bs_box">
                        <a href="#"><img src="images/templatemo_image_01.jpg" alt="image" /></a>
                        <h4><a href="#">Vestibulum ante</a></h4>
                        <p class="price">$8</p>
                        <div class="cleaner"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="float_r">