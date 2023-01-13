<?php

namespace Projectmodule3\Action;

class OrderItemsDisplayAction
{
    public function handle()
    {
        require_once __DIR__ . '/../../views/orderItems.php';
    }

}