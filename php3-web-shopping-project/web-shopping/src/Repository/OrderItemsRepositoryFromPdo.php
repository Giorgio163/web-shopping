<?php

namespace Projectmodule3\Repository;
use Projectmodule3\Entity\OrderItems;

use PDO;

class OrderItemsRepositoryFromPdo implements OrderItemsRepository
{
    public function __construct(private PDO $pdo)
    {}

    public function storeOrdersItems(OrderItems $orderItems): void
    {
        $stmt = $this->pdo->prepare(<<<SQL
           INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `price`)
           VALUES (:order_id, :product_id, :quantity, :price);                  
        SQL);
        $orderId = $orderItems->order_id;
        $productId = $orderItems->product_id;
        $productQ = $orderItems->quantity;
        $productPrice = $orderItems->price;

        foreach ($productQ as $proQ){
            $quantity = $proQ;
        }
        foreach ($productPrice as $proP){
            $price = $proP;
        }
        foreach ($productId as $proId) {
            $param = [
                ':order_id' => $orderId,
                ':product_id' => $proId,
                ':quantity' => $proQ,
                ':price' =>  $price
            ];

            $stmt->execute($param);
        }
    }

    public function findAllOrderItems(): array
    {
        $stmt = $this->pdo->prepare(<<<SQL
            SELECT * FROM order_items
        SQL);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, OrderItems::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}