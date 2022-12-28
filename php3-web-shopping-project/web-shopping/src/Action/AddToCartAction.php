<?php

namespace Projectmodule3\Action;

use Projectmodule3\Entity\Product;
use Projectmodule3\Factory\ProductRepositoryFactory;

session_name('session_cart');
session_start();
class AddToCartAction
{
    public function handle()
    {
        $pdo = require_once __DIR__ . '/../../config/conn.php';
        $productRepository = ProductRepositoryFactory::make();
        $id = (int)filter_input(INPUT_GET, 'id');
        $products = $productRepository->find($id);

        if(!isset($_SESSION['session_cart'])) {
            $_SESSION['session_cart'] = array();
        }

        $productArray = $_SESSION['session_cart'];
        $productArray[] = $products;
        $_SESSION['session_cart'] = $productArray;
       require_once __DIR__ . '/../../views/cart.php';
    }
}