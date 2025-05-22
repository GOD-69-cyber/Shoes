<?php
require_once 'Auth.php';

$auth = new Auth();
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($auth->login($username, $password)) {
        header("Location: admin_panel.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="templatemo_body_wrapper">
        <div id="templatemo_wrapper">
            <div id="templatemo_header">
                <div id="site_title"><h1>Admin Login</h1></div>
            </div>
            
            <div id="templatemo_main">
                <div id="content" class="float_r" style="width:100%">
                    <h2>Admin Login</h2>
                    <?php if($error): ?>
                        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
                    <?php endif; ?>
                    <form action="login.php" method="post">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required><br><br>
                        
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required><br><br>
                        
                        <input type="submit" value="Login">
                    </form>
                </div>
                <div class="cleaner"></div>
            </div>
        </div>
    </div>
</body>
</html>