<?php

class User
{
    private int $id;
    private int $id_subscription;
    private string $login;
    private string $password;
    private int $balance;

    public function __construct(int $id, int $id_subscription, string $login, string $password, string $balance)
    {
        $this->id = $id;
        $this->id_subscription = $id_subscription;
        $this->login = $login;
        $this->password = $password;
        $this->balance = $balance;
    }

    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setIdSubscription(int $id_subscription): void
    {
        $this->id_subscription = $id_subscription;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdSubscription(): int
    {
        return $this->id_subscription;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

?>
