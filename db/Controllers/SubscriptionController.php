<?php

namespace db\Controllers;

use Controllers\mysqli;

require_once 'Controller.php';
require_once './db/Objects/Subscription.php';
require_once './db/DB.php';

class SubscriptionController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = $this->db->connect();
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
            $connection = $this->db->connect();
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
            $connection = $this->db->connect();
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
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $select = $connection->prepare("SELECT * FROM `subscription`");
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
            $select = $connection->prepare("SELECT * FROM `subscription` WHERE `$id`");
            $result = $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>
