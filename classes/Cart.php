<?php
class Cart {
    private $sessionKey = 'cart_items';

    public function __construct() {
        if (!isset($_SESSION[$this->sessionKey])) {
            $_SESSION[$this->sessionKey] = [];
        }
    }

    
    public function addItem(int $productId, int $quantity = 1) {
        if (isset($_SESSION[$this->sessionKey][$productId])) {
            $_SESSION[$this->sessionKey][$productId] += $quantity;
        } else {
            $_SESSION[$this->sessionKey][$productId] = $quantity;
        }
    }

   
    public function getItems(): array {
        return $_SESSION[$this->sessionKey];
    }

    
    public function updateItem(int $productId, int $quantity) {
        if ($quantity <= 0) {
            $this->removeItem($productId);
        } else {
            $_SESSION[$this->sessionKey][$productId] = $quantity;
        }
    }

    
    public function removeItem(int $productId) {
        if (isset($_SESSION[$this->sessionKey][$productId])) {
            unset($_SESSION[$this->sessionKey][$productId]);
        }
    }

    
    public function clear() {
        $_SESSION[$this->sessionKey] = [];
    }

    
    public function getTotal(array $products): float {
        $total = 0;
        foreach ($this->getItems() as $productId => $qty) {
            if (isset($products[$productId])) {
                $total += $products[$productId]['price'] * $qty;
            }
        }
        return $total;
    }
}
