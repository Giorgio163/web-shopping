<?php

namespace Projectmodule3\Action;

use Projectmodule3\Entity\Order;
use Projectmodule3\Entity\OrdersItems;
use Projectmodule3\Factory\OrderRepositoryFactory;

class CreateOrderAction
{
    public function handle()
    {
        $orders = new Order(
            filter_input(INPUT_POST, 'total'),
            filter_input(INPUT_POST, 'dateTime')
        );

      

        $repository = OrderRepositoryFactory::makeOrder();
        $repository->storeOrder($orders);

        session_name('session_cart');
        session_start();
        session_destroy();
        require_once __DIR__ . '/../../views/orders.php';
    }
}