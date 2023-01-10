<?php

namespace Projectmodule3\Repository;
use PDOException;
use Projectmodule3\Entity\OrderItems;

use PDO;

class OrderItemsRepositoryFromPdo implements OrderItemsRepository
{
    public function __construct(private PDO $pdo)
    {}

    public function storeOrdersItems(OrderItems $orderItems): void
    {
        $product = $_SESSION['session_cart'];
        foreach ($product as $pro) {
            $product->id = $_GET['id'];
        }
        $stmt = $this->pdo->prepare(<<<SQL
            INSERT INTO order_items
            (order_id, product_id, quantity, price)
            VALUES
            (:order_id, :$pro->id, :quantity, :price)
        SQL);



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