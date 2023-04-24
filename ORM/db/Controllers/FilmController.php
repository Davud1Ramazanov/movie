<?php

namespace Controllers;

include_once 'Controller.php';
include_once 'ORM/db/Objects/Film.php';

class FilmController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = new mysqli("localhost", "root", "", "movie_db");
            if ($connection->connect_error) {
                echo 'Error';
            }
            $insert = $connection->prepare("INSERT INTO `film`(`id_genre`, `name`, `year`, `language`, `member`, `rating`, `IsPremium`) VALUES ('?','?','?','?','?','?','?')");
            $id_genre = trim($title->getIdGenre());
            $name = trim($title->getName());
            $year = trim($title->getYear());
            $language = trim($title->getLanguage());
            $member = trim($title->getMember());
            $rating = trim($title->getRating());
            $isPremium = trim($title->getIsPremium());
            $insert->bind_param("ssd", $id_genre, $name, $year, $language, $member, $rating, $isPremium);
            $insert->execute();
        } finally {
            $connection->close();
        }
    }

    public function delete($id)
    {
        $connection = null;
        try {
            $connection = new mysqli("localhost", "root", "", "movie_db");
            if ($connection->connect_error) {
                echo 'Error';
            }
            $delete = $connection->prepare("DELETE FROM `film` WHERE `id`='?'");
            $delete->bind_param("i", $id);
            $delete->execute();
        } finally {
            $connection->close();
        }
    }

    public function update($title)
    {
        $connection = null;
        try {
            $connection = new mysqli("localhost", "root", "", "movie_db");
            if ($connection->connect_error) {
                echo 'Error';
            }
            $update = $connection->prepare("UPDATE `film` SET `id_genre`='?',`name`='?',`year`='?',`language`='?',`member`='?',`rating`='?',`isPremium`='?' WHERE `id`='?'");
            $id_genre = trim($title->getIdGenre());
            $name = trim($title->getName());
            $year = trim($title->getYear());
            $language = trim($title->getLanguage());
            $member = trim($title->getMember());
            $rating = trim($title->getRating());
            $isPremium = trim($title->getIsPremium());
            $id = trim($title->getId());
            $update->bind_param("ssdi", $id_genre, $name, $year, $language, $member, $rating, $isPremium, $id);
            $update->execute();
        } finally {
            $connection->close();
        }
    }

    public function select()
    {
        $connection = null;
        try {
            $connection = new mysqli("localhost", "root", "", "movie_db");
            if ($connection->connect_error) {
                echo 'Error';
            }
            $select = $connection->prepare("SELECT * FROM `film`");
            $result = $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>
