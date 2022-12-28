<?php

namespace Projectmodule3;

use Projectmodule3\Action\AddToCartAction;
use Projectmodule3\Action\CartDisplayAction;
use Projectmodule3\Action\CatalogueDisplayAction;
use Projectmodule3\Action\CreateProductAction;
use Projectmodule3\Action\DeleteProductAction;
use Projectmodule3\Action\HomeAction;
use Projectmodule3\Action\UpdateProductAction;


class Application
{
    public function run(): void
    {
        $action = filter_input(INPUT_GET, 'action');

        match ($action){
            'create-product' => (new CreateProductAction())->handle(),
            default => (new HomeAction())->handle(),
            'delete' => (new DeleteProductAction())->handle(),
            'update' => (new UpdateProductAction())->handle(),
            'update-product' => (new UpdateProductAction())->update(),
            'catalogue' => (new CatalogueDisplayAction())->handle(),
            'cart' => (new CartDisplayAction())->handle(),
            'addToCart' => (new AddToCartAction())->handle(),
        };
    }
}