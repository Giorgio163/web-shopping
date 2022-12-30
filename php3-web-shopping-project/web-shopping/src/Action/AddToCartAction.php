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

        if (!isset($_SESSION['session_cart'])) {
            $_SESSION['session_cart'] = array();
        }

        $product = new \stdClass();
        $product->id = $_GET['id'];
        $product->name = $_GET['name'];
        $product->description = $_GET['description'];
        $product->price = $_GET['price'];
        $product->quantity = 1;

        $productArrayDuplicate = array();
        $productArray = $_SESSION['session_cart'];

//        if (empty($productArray)) {
//            $productArrayDuplicate[] = $product;
//        } else {
//            foreach ($productArray as $pro) {
//                if ($_GET['id'] === $pro->id) {
//                    echo 'The product is already in the cart';
//                    $_SESSION['session_cart'] = $productArray;
//                } else {
//                    $productArrayDuplicate[] = $pro;
//                    $_SESSION['session_cart'] = $productArrayDuplicate;
//                }
//            }
//        }


        $found = false;
        foreach ($productArray as $pro) {
            if ($_GET['id'] == $pro->id) {
                $found = true;
                echo "$pro->name already in cart, added 1 quantity";
                $pro->quantity = ($pro->quantity + 1);
            }
            $productArrayDuplicate[] = $pro;
        }

        if (!$found) {
            $productArrayDuplicate[] = $product;
            echo "Product added to the cart";
        }

        //       $productArrayDuplicate[] = $product;
        //       foreach ($productArray as $pro) {
        //           if ($_GET['id'] == $pro->id) {
        //               echo "$pro->name already in cart";
//            } else {
//                $productArrayDuplicate[] = $pro;
//            }
//        }

//        sort($productArrayDuplicate);

        $_SESSION['session_cart'] = $productArrayDuplicate;
        require_once __DIR__ . '/../../views/catalogue.php';
    }
}