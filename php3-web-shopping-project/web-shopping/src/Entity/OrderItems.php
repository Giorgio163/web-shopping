<?php

namespace Projectmodule3\Entity;

class OrderItems
{
    public string $order_id;
    public int $product_id;
    public int $quantity;
    public float $price;

    public function __construct(
        string $order_id = '',
        int $product_id = 0,
        int $quantity = 0,
        float $price = 0,
    ){
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function orderId(): string
    {
        return $this->order_id;
    }

    public function productId(): int
    {
        return $this->product_id;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function price(): float
    {
        return $this->price;
    }
}