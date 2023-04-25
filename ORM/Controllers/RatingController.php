<?php

namespace db\Controllers;

use Controllers\mysqli;

require_once 'Controller.php';
require_once './db/Objects/Rating.php';
require_once './db/DB.php';

class RatingController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $insert = $connection->prepare("INSERT INTO `rating`(`likes`, `dislikes`) VALUES ('?','?')");
            $likes = trim($title->getLikes());
            $dislikes = trim($title->getDislikes());
            $insert->bind_param("ssd", $likes, $dislikes);
            $insert->execute();
        } finally {
            $connection->close();
        }
    }

    public function delete($id)
    {
        $connection = null;
        try {
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $delete = $connection->prepare("DELETE FROM `rating` WHERE `id_rating`='?'");
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
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $update = $connection->prepare("UPDATE `rating` SET `likes`='?',`dislikes`='?' WHERE `id_rating`='?'");
            $likes = trim($title->getLikes());
            $dislikes = trim($title->getDislikes());
            $id_rating = trim($title->getIdRating());
            $update->bind_param("ssd", $likes, $dislikes, $id_rating);
            $update->execute();
        } finally {
            $connection->close();
        }
    }

    public function select()
    {
        $connection = null;
        try {
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $select = $connection->prepare("SELECT * FROM `rating`");
            $select->get_result();
        } finally {
            $connection->close();
        }
    }

    public function selectById($id)
    {
        $connection = null;
        try {
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $select = $connection->prepare("SELECT * FROM `rating` WHERE `$id`");
            $result = $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>