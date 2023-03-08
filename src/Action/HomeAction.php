<?php

namespace Projectmodule3\Action;

use Projectmodule3\Factory\ProductRepositoryFactory;

class HomeAction
{
    public function handle(): void
    {
        $repository = ProductRepositoryFactory::make();
        $product = $repository->findAll();

        require_once __DIR__ . '/../../views/home.php';
    }
}
