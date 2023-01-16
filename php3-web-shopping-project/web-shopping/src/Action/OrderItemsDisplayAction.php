<?php

namespace Projectmodule3\Action;

use Projectmodule3\Factory\OrderItemsRepositoryFactory;

class OrderItemsDisplayAction
{
    public function handle()
    {
        require_once __DIR__ . '/../../views/orderItems.php';
    }

}