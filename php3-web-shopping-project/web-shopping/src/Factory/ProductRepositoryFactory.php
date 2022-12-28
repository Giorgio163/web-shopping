<?php

namespace Projectmodule3\Factory;

use Projectmodule3\Repository\ProductRepository;
use Projectmodule3\Repository\ProductRepositoryFromPdo;

class ProductRepositoryFactory
{
    public static function make(): ProductRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new ProductRepositoryFromPdo($pdo);
    }
}