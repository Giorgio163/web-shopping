<?php

namespace Projectmodule3\Repository;

use Projectmodule3\Entity\OrdersItems;

interface OrdersItemsRepository
{
    public function storeOrdersItems(OrdersItems $ordersItems): void;

    /**
     * @return array
     */
    public function findAllOrdersItems(): array;

}