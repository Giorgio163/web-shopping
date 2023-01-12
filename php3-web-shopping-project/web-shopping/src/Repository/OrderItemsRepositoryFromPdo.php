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

        $productId = $orderItems->product_id;
        $productQ = $orderItems->quantity;
        $productPrice = $orderItems->price;
        foreach ($productId as $proId){
            $proId = implode(',', $productId);
        }
        foreach ($productQ as $proQ){
            $proQ = implode(',', $productQ);
        }
        foreach ($productPrice as $proP)
        $proP = implode(',', $productPrice);

        $param = [
            ':order_id' => 95,
            ':product_id' => $proId,
            ':quantity' => $proQ,
            ':price' =>  $proP
        ];

        $stmt->execute($param);





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