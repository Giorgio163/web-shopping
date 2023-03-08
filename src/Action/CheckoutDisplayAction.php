<?php

namespace Projectmodule3\Action;

class CheckoutDisplayAction
{
    public function handle()
    {
        session_name('session_cart');
        session_start();
        if (!isset($_SESSION['session_cart'])) {
            $_SESSION['session_cart'] = array();
        }
        require_once __DIR__ . '/../../views/checkout.php';
    }
}
