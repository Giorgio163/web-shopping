<?php

namespace Projectmodule3\Entity;

class Order
{
    private string $id;
    private string $total;
    private string $completed_at;

    public function __construct(
        string $id = '',
        string $total = '',
        string $completed_at = '',
    ) {
        $this->id = $id;
        $this->total = $total;
        $this->completed_at = $completed_at;
    }

    public function id(): string
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
