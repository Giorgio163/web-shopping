<?php

namespace Projectmodule3\Action;

use Projectmodule3\Factory\ProductRepositoryFactory;

class UpdateCartAction
{
    public function handle()
    {
        session_name('session_cart');
        session_start();

        $productRepository = ProductRepositoryFactory::make();


        $quantity = filter_input(INPUT_GET, 'quantity');
         var_dump($quantity);
         die;

        require_once __DIR__ . '/../../views/cart.php';
    }
}