<?php

namespace Objects;

class Rating
{
    private int $id_rating;
    private int $likes;
    private int $dislikes;

    public function __construct(int $id_rating, int $likes, $dislikes)
    {
        $this->id_rating = $id_rating;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
    }

    public function setDislikes(int $dislikes): void
    {
        $this->dislikes = $dislikes;
    }

    public function setIdRating(int $id_rating): void
    {
        $this->id_rating = $id_rating;
    }

    public function setLikes(int $likes): void
    {
        $this->likes = $likes;
    }

    public function getDislikes(): int
    {
        return $this->dislikes;
    }

    public function getIdRating(): int
    {
        return $this->id_rating;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }
}

?>
