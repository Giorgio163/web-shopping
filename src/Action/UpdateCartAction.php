<?php

namespace Projectmodule3\Action;

use Projectmodule3\Factory\ProductRepositoryFactory;
session_name('session_cart');
session_start();

class UpdateCartAction
{
    public function handle()
    {
        if (isset($_POST['id']) && $_POST['name'] && $_POST['description'] && $_POST['price'] && $_POST['quantity']) {


            $productArrayUpdated = array();

            $productArray = $_SESSION['session_cart'];
            foreach ($productArray as $pro){
                if($_POST['id'] === $pro->id){
                    $pro->quantity = $_POST['quantity'];
                }
                $productArrayUpdated[] = $pro;
            }
            $_SESSION['session_cart'] = $productArrayUpdated;

            require_once __DIR__ . '/../../views/cart.php';
        } else {

            $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            $productRepository = ProductRepositoryFactory::make();
            $product = $productRepository->find($id);


            require_once __DIR__ . '/../../views/updateCart.php';
        }
    }
}