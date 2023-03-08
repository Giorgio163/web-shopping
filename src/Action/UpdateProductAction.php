<?php

namespace Projectmodule3\Action;

use Projectmodule3\Factory\ProductRepositoryFactory;

class UpdateProductAction
{
    public function handle()
    {
        if (isset($_POST['id']) && $_POST['name'] && $_POST['description'] && $_POST['price'] && $_POST['quantity']) {
            $productParams = [
                $id = $_POST['id'],
                $name = $_POST['name'],
                $description = $_POST['description'],
                $price = $_POST['price'],
                $quantity = $_POST['quantity'],
            ];

            $productRepository = ProductRepositoryFactory::make();
            $productRepository->update();

            header('Location: /index.php');
        }
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $productRepository = ProductRepositoryFactory::make();
        $product = $productRepository->find($id);

        require_once __DIR__ . '/../../views/update.php';
    }
}
