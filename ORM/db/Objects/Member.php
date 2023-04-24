<?php

namespace Objects;

class Member
{
    private int $id_member;
    private int $role;
    private string $first_name;
    private string $last_name;

    public function __construct(int $id_member, int $role, string $first_name, string $last_name)
    {
        $this->id_member = $id_member;
        $this->role = $role;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function setIdMember(int $id_member): void
    {
        $this->id_member = $id_member;
    }

    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getIdMember(): int
    {
        return $this->id_member;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getRole(): int
    {
        return $this->role;
    }
}

?>
