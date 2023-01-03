<?php

namespace Projectmodule3\Entity;

class Order
{
    private ?int $id;
    private string $total;
    private string $completed_at;

    public function __construct(
        string $total = '',
        string $completed_at = '',
    ){
        $this->id = null;
        $this->total = $total;
        $this->completed_at =$completed_at;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function total(): float
    {
        return $this->total;
    }

    public function completedAt(): string
    {
        return $this->completed_at;
    }
}