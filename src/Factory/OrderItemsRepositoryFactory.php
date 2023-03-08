<?php

namespace Projectmodule3\Factory;

use Projectmodule3\Repository\OrderItemsRepository;
use Projectmodule3\Repository\OrderItemsRepositoryFromPdo;

class OrderItemsRepositoryFactory
{
    public static function makeOrderItems(): OrderItemsRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new OrderItemsRepositoryFromPdo($pdo);
    }
}
