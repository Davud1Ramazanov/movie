<?php

namespace db\Objects;

class Film
{
    private int $id;
    private int $id_genre;
    private string $name;
    private DateTime $year;
    private string $language;
    private int $member;
    private int $rating;
    private bool $isPremium;

    public function __construct(int $id, int $id_genre, string $name, DateTime $year, string $language, int $member, int $rating, bool $isPremium)
    {
        $this->id = $id;
        $this->id_genre = $id_genre;
        $this->name = $name;
        $this->year = $year;
        $this->language = $language;
        $this->member = $member;
        $this->rating = $rating;
        $this->isPremium = $isPremium;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setIdGenre(int $id_genre): void
    {
        $this->id_genre = $id_genre;
    }

    public function setIsPremium(bool $isPremium): void
    {
        $this->isPremium = $isPremium;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function setMember(int $member): void
    {
        $this->member = $member;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function setYear(datetime $year): void
    {
        $this->year = $year;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIdGenre(): int
    {
        return $this->id_genre;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getMember(): int
    {
        return $this->member;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getYear(): DateTime
    {
        return $this->year;
    }

    public function getIsPremium(): bool
    {
        return $this->isPremium;
    }
}

?>
