<?php

namespace Projectmodule3\Repository;
use Projectmodule3\Entity\OrdersItems;

use PDO;

class OrdersItemsRepositoryFromPdo implements OrdersItemsRepository
{
    public function __construct(private PDO $pdo)
    {}

    public function storeOrdersItems(OrdersItems $ordersItems): void
    {
        $sql = $this->getStoreQuery($ordersItems);
        $stm = $this->pdo->prepare($sql);

        $param = [
            ':order_id' => $ordersItems->orderId(),
            ':quantity' => $ordersItems->quantity(),
            ':price' => $ordersItems->price(),
        ];

        if ($ordersItems->orderId()){
            $param[':id'] = $ordersItems->orderId();
        }
        $stm->execute($param);
    }

    private function getStoreQuery(OrdersItems $ordersItems) {
        if ($ordersItems->orderId()) {
            return <<<SQL
                UPDATE order_items
                SET order_id=:id,
                    quantity=:quantity,
                    price=:price
                WHERE order_id=:id
            SQL;
        }
        return <<<SQL
            INSERT INTO order_items (order_id, quantity, price)
            VALUES (:id, :quantity, :price)
        SQL;
    }

    public function findAllOrdersItems(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT order_id, product_id, price, quantity
            FROM order_items
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, OrdersItems::class);
        $stm->execute();

        return $stm->fetchAll();
    }
}