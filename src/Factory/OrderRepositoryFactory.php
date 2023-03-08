<?php

namespace Projectmodule3\Factory;

use Projectmodule3\Repository\OrderRepository;
use Projectmodule3\Repository\OrderRepositoryFromPdo;

class OrderRepositoryFactory
{
    public static function makeOrder(): OrderRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new OrderRepositoryFromPdo($pdo);
    }
}
