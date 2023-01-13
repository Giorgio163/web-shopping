<?php

namespace Projectmodule3\Entity;

class OrderItems
{
    public String $order_id;
    public array $product_id;
    public array $quantity;
    public array $price;

    public function __construct(
        string $order_id = '',
        float $quantity = 1,
        float $price = 1,
    ){
        $this->order_id = $order_id;
        $this->product_id = array();
        $this->quantity = array();
        $this->price = array();
    }

    public function orderId(): ?int
    {
        return $this->order_id;
    }

    public function productId(): array
    {
        return $this->product_id;
    }

    public function quantity(): array
    {
        return $this->quantity;
    }

    public function price(): array
    {
        return $this->price;
    }
}