<?php
require_once 'Auth.php';

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: login.php");
    exit;
}


$db = new Database();
$users = $db->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="templatemo_body_wrapper">
        <div id="templatemo_wrapper">
            <div id="templatemo_header">
                <div id="site_title"><h1>Admin Panel</h1></div>
                <div id="header_right">
                    Welcome, <?= htmlspecialchars($_SESSION['admin_username']) ?> | 
                    <a href="logout.php">Logout</a>
                </div>
                <div class="cleaner"></div>
            </div>
            
            <div id="templatemo_main">
                <div id="content" class="float_r" style="width:100%">
                    <h2>User Management</h2>
                    <table border="1" cellpadding="5" cellspacing="0">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>address</th>
                            <th>city</th>
                            <th>country</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>total_amount</th>
                            <th>created_at</th>
                        </tr>
                        <?php while($user = $users->fetch_assoc()): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= htmlspecialchars($user['full_name']) ?></td>
                            <td><?= htmlspecialchars($user['address']) ?></td>
                            <td><?= htmlspecialchars($user['city']) ?></td>
                            <td><?= htmlspecialchars($user['country']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['phone']) ?></td>
                            <td><?= htmlspecialchars($user['total_amount']) ?></td>
                            <td><?= htmlspecialchars($user['created_at']) ?></td>
                            <td>
                                <a href="delete_user.php?id=<?= $user['id'] ?>" 
                                   onclick="return confirm('Are you sure you want to delete this user?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
                <div class="cleaner"></div>
            </div>
        </div>
    </div>
</body>
</html>