<?php

namespace Projectmodule3\Action;

use Projectmodule3\Factory\ProductRepositoryFactory;

class UpdateProductAction
{
    public function handle()
    {
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $productRepository = ProductRepositoryFactory::make();
        $product = $productRepository->find($id);

        require_once __DIR__ . '/../../views/update.php';
    }

    public function update()
    {
        $pdo = require_once __DIR__ . '/../../config/conn.php';

        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $params = [
            ':id' => $id,
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':quantity' => $quantity,
        ];

        $productRepository = ProductRepositoryFactory::make();

        $sql = "UPDATE products SET name=:name, description=:description, price=:price, quantity=:quantity 
                    WHERE id=:id";
        $productRepository->pdo->prepare($sql)->execute($params);

        header('Location: /index.php');
    }
}