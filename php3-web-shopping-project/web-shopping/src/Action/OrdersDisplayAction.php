<?php

namespace Projectmodule3\Action;

use Projectmodule3\Factory\OrderRepositoryFactory;

class OrdersDisplayAction
{
    public function handle()
    {
        require_once __DIR__ . '/../../views/orders.php';
    }

}