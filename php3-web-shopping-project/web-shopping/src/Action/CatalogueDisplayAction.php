<?php

namespace Projectmodule3\Action;

use Projectmodule3\Entity\Product;
use Projectmodule3\Factory\ProductRepositoryFactory;

class CatalogueDisplayAction
{
    public function handle()
    {
        require_once __DIR__ . '/../../views/catalogue.php';
    }

}