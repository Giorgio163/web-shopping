<?php

namespace Projectmodule3\Repository;

use Projectmodule3\Entity\Order;
use PDO;

class OrderRepositoryFromPdo implements OrderRepository
{
    public function __construct(private PDO $pdo)
    {}

    public function storeOrder(Order $orders): void
    {

        $stm = $this->pdo->prepare(<<<SQL
            INSERT INTO Orders (id, total, completed_at)
            VALUES (:id, :total, :completed_at)
        SQL);

        $orderId = $orders->id();

        $param = [
            ':id' => $orderId,
            ':total' => $orders->total(),
            ':completed_at' => $orders->completedAt(),
        ];

        if ($orders->id()){
            $param[':id'] = $orders->id();
        }
        $stm->execute($param);
    }

    private function getStoreQuery(Order $orders) {
        if ($orders->id()) {
            return <<<SQL
                UPDATE orders
                SET id=:id,
                    total=:total,
                    completed_at=:completed_at
                WHERE id=:id
            SQL;
        }
        return <<<SQL
            INSERT INTO Orders (id, total, completed_at)
            VALUES (:id, :total, :completed_at)
        SQL;
    }

    public function findAllOrders(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, total, completed_at
            FROM orders
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Order::class);
        $stm->execute();

        return $stm->fetchAll();
    }
}