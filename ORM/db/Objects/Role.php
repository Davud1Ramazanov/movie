<?php

namespace Objects;

class Role
{
    private int $id_role;
    private string $role;

    public function __construct(int $id_role, string $role)
    {
        $this->id_role = $id_role;
        $this->role = $role;
    }

    public function setIdRole(int $id_role): void
    {
        $this->id_role = $id_role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getIdRole(): int
    {
        return $this->id_role;
    }
}

?>
