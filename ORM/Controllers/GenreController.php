<?php

namespace db\Controllers;

use Controllers\mysqli;

require_once 'Controller.php';
require_once './db/Objects/Genre.php';
require_once './db/DB.php';

class GenreController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $insert = $connection->prepare("INSERT INTO `genre`(`genre`) VALUES ('?')");
            $genre = trim($title->getGenre());
            $insert->bind_param("ssd", $genre);
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
            $delete = $connection->prepare("DELETE FROM `genre` WHERE `id_genre`='?'");
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
            $update = $connection->prepare("UPDATE `genre` SET `genre`='?' WHERE `id_genre`='?'");
            $genre = trim($title->getGenre());
            $id_genre = trim($title->getIdGenre());
            $update->bind_param("ssdi", $genre, $id_genre);
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
            $select = $connection->prepare("SELECT * FROM `genre`");
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
            $select = $connection->prepare("SELECT * FROM `genre` WHERE `$id`");
            $result = $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>