<?php

namespace Projectmodule3\Action;

use Projectmodule3\Entity\Product;
use Projectmodule3\Factory\ProductRepositoryFactory;

class CartDisplayAction
{
    public function handle()
    {

        session_name('session_cart');
        session_start();
        if (!isset($_SESSION['session_cart'])) {
            $_SESSION['session_cart'] = array();
        }

        require_once __DIR__ . '/../../views/cart.php';
    }
}
