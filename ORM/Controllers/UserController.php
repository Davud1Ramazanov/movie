<?php

class UserController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = new mysqli("localhost", "root", "", "movie_db");
            if ($connection->connect_error) {
                echo 'Error';
            }
            $insert = $connection->prepare("INSERT INTO `user`(`id_subscription`, `login`, `password`, `balance`) VALUES ('?','?','?','?','?')");
            $id_subscription = trim($title->getIdSubscription());
            $login = trim($title->getLogin());
            $password = trim($title->getPassword());
            $balance = trim($title->getBalance());
            $insert->bind_param("ssd", $id_subscription, $login, $password, $balance);
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
            $delete = $connection->prepare("DELETE FROM `user` WHERE `id`='?'");
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
            $insert = $connection->prepare("UPDATE `user` SET `id_subscription`='?',`login`='?',`password`='?',`balance`='?' WHERE `id`='?'");
            $id_subscription = trim($title->getIdSubscription());
            $login = trim($title->getLogin());
            $password = trim($title->getPassword());
            $balance = trim($title->getBalance());
            $id = trim($title->getId());
            $insert->bind_param("ssd", $id_subscription, $login, $password, $balance, $id);
            $insert->execute();
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
            $select = $connection->prepare("SELECT * FROM `user`");
            $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>
