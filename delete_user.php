<?php
require_once 'Auth.php';

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $db = new Database();
    $db->query("DELETE FROM orders WHERE id = $id");
    
    header("Location: admin_panel.php");
    exit;
} else {
    header("Location: admin_panel.php");
    exit;
}
?>