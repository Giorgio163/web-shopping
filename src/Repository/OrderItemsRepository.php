<?php

namespace Projectmodule3\Repository;

use Projectmodule3\Entity\OrderItems;

interface OrderItemsRepository
{
    public function storeOrdersItems(OrderItems $orderItems): void;

    /**
     * @return array
     */
    public function findOrderItems($id): array|bool;
}
