<?php

namespace Projectmodule3\Action;

session_name('session_cart');
session_start();

class DeleteFromCart
{
    public function handle()
    {
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $productArrayDeleted = array();

        $productArray = $_SESSION['session_cart'];

        foreach ($productArray as $pro) {
            if ($id != $pro->id) {
                $productArrayDeleted[] = $pro;
            }
            $_SESSION['session_cart'] = $productArrayDeleted;
        }


        require_once __DIR__ . '/../../views/cart.php';
    }
}
