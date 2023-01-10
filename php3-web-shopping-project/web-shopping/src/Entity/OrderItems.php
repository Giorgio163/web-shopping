<?php

namespace Projectmodule3\Entity;

class OrderItems
{
    private ?int $order_id;
    private ?int $product_id;
    private float $quantity;
    private float $price;

    public function __construct(
        float $quantity = 1,
        float $price = 1,
    ){
        $this->order_id = null;
        $this->product_id = null;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function orderId(): ?int
    {
        return $this->order_id;
    }

    public function productId(): ?int
    {
        return $this->product_id;
    }

    public function quantity(): float
    {
        return $this->quantity;
    }

    public function price(): float
    {
        return $this->price;
    }
}