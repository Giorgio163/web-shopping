<?php

namespace Projectmodule3\Repository;
use Projectmodule3\Entity\OrderItems;

use PDO;

class OrderItemsRepositoryFromPdo implements OrderItemsRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function storeOrdersItems(OrderItems $orderItems): void
    {
        $stmt = $this->pdo->prepare(<<<SQL
           INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `price`)
           VALUES (:order_id, :product_id, :quantity, :price);                  
        SQL
        );
        $orderId = $orderItems->order_id;
        $productId = $orderItems->product_id;
        $productQ = $orderItems->quantity;
        $productPrice = $orderItems->price;

            $param = [
                ':order_id' =>  $orderId,
                ':product_id' => $productId,
                ':quantity' => $productQ,
                ':price' => $productPrice
            ];

            $stmt->execute($param);


}

    public function findOrderItems($id): array|bool
    {
            $stmt = $this->pdo->prepare(<<<SQL
           SELECT oi.order_id AS order_id, oi.product_id AS product_id, p.name AS name, oi.quantity AS quantity, oi.price AS price
            FROM orders o 
            JOIN order_items oi ON oi.order_id=o.id
            JOIN products p ON oi.product_id=p.id
            WHERE order_id = :order_id
        SQL);

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, OrderItems::class);
            $stmt->bindParam(':order_id', $id);
            $stmt->execute();

            return $stmt->fetchAll();
    }
}