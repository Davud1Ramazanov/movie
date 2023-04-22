<?php

class Subscription
{
    private int $id_subscription;
    private string $name;
    private int $price;

    public function __construct(int $id_subscription, string $name, int $price)
    {
        $this->id_subscription = $id_subscription;
        $this->name = $name;
        $this->price = $price;
    }

    public function setIdSubscription(int $id_subscription): void
    {
        $this->id_subscription = $id_subscription;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIdSubscription(): int
    {
        return $this->id_subscription;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

?>
