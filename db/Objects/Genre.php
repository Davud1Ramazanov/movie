<?php

namespace db\Objects;

class Genre
{
    private int $id_genre;
    private string $genre;

    public function __construct(int $id_genre, string $genre)
    {
        $this->id_genre = $id_genre;
        $this->genre = $genre;
    }

    public function setIdGenre(int $id_genre): void
    {
        $this->id_genre = $id_genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getIdGenre(): int
    {
        return $this->id_genre;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }
}

?>
