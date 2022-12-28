<?php

namespace Projectmodule3\Action;

use Projectmodule3\Factory\ProductRepositoryFactory;

class DeleteProductAction
{
    public function handle(): void
    {
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $productRepository = ProductRepositoryFactory::make();
        $product = $productRepository->find($id);
        $productRepository->delete($product);

        header('Location: /index.php');

    }


}