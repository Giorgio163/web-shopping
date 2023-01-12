<?php

namespace Projectmodule3\Action;

use Projectmodule3\Entity\Order;
use Projectmodule3\Entity\OrderItems;
use Projectmodule3\Factory\OrderItemsRepositoryFactory;
use Projectmodule3\Factory\OrderRepositoryFactory;

session_name('session_cart');
session_start();

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

        $product = $_SESSION['session_cart'];
        foreach ($product as $pro) {
            $productId[] = $pro->id;
            $productPrice[] = $pro->price;
            $productQuantity[] = $pro->quantity;

        }

        $orderItems = new OrderItems();
        $orderItems->product_id = $productId;
        $orderItems->quantity =  $productQuantity;
        $orderItems->price = $productPrice;

        $repo = OrderItemsRepositoryFactory::makeOrderItems();
        $repo->storeOrdersItems($orderItems);


        session_destroy();
        require_once __DIR__ . '/../../views/orders.php';
    }
}