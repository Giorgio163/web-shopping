<?php

namespace Projectmodule3\Action;

class CatalogueDisplayAction
{
    public function handle()
    {
        require_once __DIR__ . '/../../views/catalogue.php';
    }
}
