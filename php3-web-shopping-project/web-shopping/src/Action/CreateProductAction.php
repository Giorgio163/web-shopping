<?php

namespace Projectmodule3\Action;

use Projectmodule3\Entity\Product;
use Projectmodule3\Factory\ProductRepositoryFactory;


class CreateProductAction
{
    public function handle(): void
    {
        $product = new Product(
            filter_input(INPUT_POST, 'name'),
            filter_input(INPUT_POST, 'description'),
            filter_input(INPUT_POST, 'price'),
            filter_input(INPUT_POST, 'quantity'),
        );

        $repository = ProductRepositoryFactory::make();
        $repository->store($product);

        header('Location: /index.php');
    }
}