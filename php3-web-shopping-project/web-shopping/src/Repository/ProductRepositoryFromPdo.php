<?php

namespace Projectmodule3\Repository;

use Projectmodule3\Entity\Product;

use PDO;

class ProductRepositoryFromPdo implements ProductRepository
{
    public function __construct(public PDO $pdo)
    {}

    public function store(Product $product): void
    {
        $sql = $this->getStoreQuery($product);
        $stm = $this->pdo->prepare($sql);

        $param = [
             ':name' => $product->name(),
             ':description' => $product->description(),
             ':price' => $product->price(),
             ':quantity' => $product->quantity(),
        ];

        if ($product->id()){
            $param[':id'] = $product->id();
        }
        $stm->execute($param);
    }

    private function getStoreQuery(Product $product) {
        if ($product->id()) {
            return <<<SQL
                UPDATE products
                SET name=:name,
                    description=:description,
                    price=:price,
                    quantity=:quantity
                WHERE id=:id
            SQL;
        }
        return <<<SQL
            INSERT INTO products (name, description, price, quantity)
            VALUES (:name, :description, :price, :quantity)
        SQL;
    }

    public function findAll(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, name, description, price, quantity
            FROM products
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stm->execute();

        return $stm->fetchAll();
    }

    public function find(int $id): Product
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, name, description, price, quantity
            FROM products
            WHERE id=:id
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stm->bindParam(':id', $id);
        $stm->execute();

        return $stm->fetch();
    }

    public function delete($product): void
    {
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $sql = "DELETE FROM products WHERE id=?";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$id]);

    }

}