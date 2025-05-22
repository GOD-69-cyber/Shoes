<?php
require_once 'Database.php';

class Auth {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($username, $password) {
        $username = $this->db->escapeString($username);
        
        $sql = "SELECT * FROM admins WHERE username = '$username' LIMIT 1";
        $result = $this->db->query($sql);
        
        if ($result && $result->num_rows == 1) {
            $admin = $result->fetch_assoc();
            
            // Проверяем пароль (используем password_verify для хешированных паролей)
            if (password_verify($password, $admin['password'])) {
                session_start();
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];
                return true;
            }
        }
        
        return false;
    }

    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

    public function __destruct() {
        $this->db->closeConnection();
    }
}
?>