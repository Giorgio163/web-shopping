<?php

namespace Projectmodule3\Action;

use PDOException;
use Projectmodule3\Factory\ProductRepositoryFactory;

class DeleteProductAction
{
    public function handle(): void
    {
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        try {
            $productRepository = ProductRepositoryFactory::make();
            $product = $productRepository->find($id);
            $productRepository->delete($product);

            header('Location: /index.php');
        }catch (PDOException $exception) {
            error_log($exception);
            echo <<<HTML
            <meta http-equiv="refresh" content="2; url='/index.php'" />
            HTML;
            echo "<b><i>Unable to delete a product that is present inside an order!</b></i>";
        }


    }


}