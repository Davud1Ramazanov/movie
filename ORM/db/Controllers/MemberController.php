<?php

namespace Controllers;

include_once 'Controller.php';
include_once 'ORM/db/Objects/Member.php';

class MemberController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = new mysqli("localhost", "root", "", "movie_db");
            if ($connection->connect_error) {
                echo 'Error';
            }
            $insert = $connection->prepare("INSERT INTO `member`(`role`, `first_name`, `last_name`) VALUES ('?', '?','?')");
            $role = trim($title->getRole());
            $first_name = trim($title->getFirstName());
            $last_name = trim($title->getLastName());
            $insert->bind_param("ssd", $role, $first_name, $last_name);
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
            $delete = $connection->prepare("DELETE FROM `member` WHERE `id`='?'");
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
            $update = $connection->prepare("UPDATE `member` SET `role`='?',`first_name`='?',`last_name`='?' WHERE `id_member`='?'");
            $role = trim($title->getRole());
            $first_name = trim($title->getFirstName());
            $last_name = trim($title->getLastName());
            $id_member = trim($title->getIdMember());
            $update->bind_param("ssdi", $role, $first_name, $last_name, $id_member);
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
            $select = $connection->prepare("SELECT * FROM `member`");
            $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>
