<?php

namespace Projectmodule3\Repository;

use Projectmodule3\Entity\Order;

interface OrderRepository
{
    public function storeOrder(Order $orders): void;

    /**
     * @return array
     */
    public function findAllOrders(): array;
}