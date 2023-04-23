<?php
include_once 'Controller.php';
include_once 'ORM/Objects/Subscription.php';

class SubscriptionController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = new mysqli("localhost", "root", "", "movie_db");
            if ($connection->connect_error) {
                echo 'Error';
            }
            $insert = $connection->prepare("INSERT INTO `subscription`(`name`, `price`) VALUES ('?', '?')");
            $name = trim($title->getName());
            $price = trim($title->getPrice());
            $insert->bind_param("ssd", $name, $price);
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
            $delete = $connection->prepare("DELETE FROM `subscription` WHERE `id_subscription`='?'");
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
            $update = $connection->prepare("UPDATE `subscription` SET `Name`='?',`Price`='?' WHERE `id_subscription`='?'");
            $name = trim($title->getName());
            $price = trim($title->getPrice());
            $id_subscription = trim(($title->getIdSubscription()));
            $update->bind_param("ssdi", $name, $price, $id_subscription);
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
            $select = $connection->prepare("SELECT * FROM `subscription`");
            $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>
