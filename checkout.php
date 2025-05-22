<?php
session_start(); // Инициализация сессии

// Генерация CSRF токена, если он еще не был сгенерирован
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));  // Генерация случайного токена
}
?>




<?php 
include('partals/header.php'); 
?>
        <h2>Checkout</h2>
    <h5><strong>BILLING INFORMATION</strong></h5>

    <form method="POST" action="checkout_form.php"> 
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

    <div class="content_half float_l checkout">
        Full Name (must be same as on your credit card):  
        <input type="text" name="full_name" style="width:300px;" required />
        <br /><br />
        
        Address:
        <input type="text" name="address" style="width:300px;" required />
        <br /><br />
        
        City:
        <input type="text" name="city" style="width:300px;" required />
        <br /><br />
        
        Country:
        <input type="text" name="country" style="width:300px;" required />
    </div>
    
    <div class="content_half float_r checkout">
        E-MAIL:
        <input type="email" name="email" style="width:300px;" required />
        <br /><br />
        
        PHONE:
        <span style="font-size:10px">Please, specify your reachable phone number. YOU MAY BE GIVEN A CALL TO VERIFY AND COMPLETE THE ORDER.</span>
        <input type="text" name="phone" style="width:300px;" required />
    </div>

    <br /><br />
    
    <input type="submit" value="Submit Order" class="submit_btn" />
</form>

            
            <div class="cleaner h50"></div>
            <h3>SHOPPING CART</h3>
            <h4>TOTAL AMOUNT: <strong>$240</strong></h4>
			<p><input type="checkbox" />
			I accept the <a href="#">terms of use</a> of this website.</p>
            <table style="border:1px solid #CCCCCC;" width="100%">
                <tr>
                    <td height="80px"> <img src="images/paypal.gif" alt="paypal" /></td>
                    <td width="400px;" style="padding: 0px 20px;">Recommended if you have a PayPal account. Fastest delivery time.
                    </td>
                    <td><a href="#" class="more">PAYPAL</a></td>
                </tr>
                <tr>
                    <td  height="80px"><img src="images/2co.gif" alt="paypal" />
                    </td>
                    <td  width="400px;" style="padding: 0px 20px;">2Checkout.com, Inc. is an authorized retailer of goods and services. 2CheckOut accepts customer orders via online checks, Visa, MasterCard, Discover, American Express, Diners, JCB and debit cards with the Visa, Mastercard logo. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow">CSS</a>.</td>
                    <td><a href="#" class="more">2CHECKOUT</a></td>
                </tr>
            </table>
        </div> 
        <?php include('partals/footer.php'); ?>