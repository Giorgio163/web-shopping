<?php

namespace Projectmodule3\Action;

use Projectmodule3\Entity\Order;
use Projectmodule3\Entity\OrderItems;
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

        $pdo = require __DIR__ . '/../../config/conn.php';
        $product = $_SESSION['session_cart'];
        foreach ($product as $pro) {
            $productId = $pro->id;
        }
        var_dump($productId);
        die;
        $stmt = $this->pdo->prepare(<<<SQL
            INSERT INTO order_items
            (order_id, product_id, quantity, price)
            VALUES
            (:order_id, :$pro->id, :quantity, :price)
        SQL);

        session_destroy();
        require_once __DIR__ . '/../../views/orders.php';
    }
}