<?php

namespace db\Controllers;

use Controllers\mysqli;

require_once 'Controller.php';
require_once './db/Objects/Member.php';
require_once './db/DB.php';

class MemberController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = $this->db->connect();
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
            $connection = $this->db->connect();
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
            $connection = $this->db->connect();
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
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $select = $connection->prepare("SELECT * FROM `member`");
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
            $select = $connection->prepare("SELECT * FROM `member` WHERE `$id`");
            $result = $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>
