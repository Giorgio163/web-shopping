<?php

namespace Projectmodule3\Repository;

use Projectmodule3\Entity\Product;

interface ProductRepository
{
    public function store(Product $product): void;

    /**
     * @return array
     */
    public function findAll(): array;
    public function find(int $id): Product;
    public function update();
    public function delete($id): void;
}
