<?php

namespace Projectmodule3\Action;

class OrdersDisplayAction
{
    public function handle()
    {
        require_once __DIR__ . '/../../views/orders.php';
    }

}