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
            SELECT * FROM order_items WHERE order_id=:id
        SQL
            );

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, OrderItems::class);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll();
    }
}