<?php

namespace db\Controllers;

use Controllers\mysqli;

include_once 'Controller.php';
include_once 'db/Objects/Role.php';

class RoleController extends Controller
{

    public function insert($title)
    {
        $connection = null;
        try {
            $connection = $this->db->connect();
            if ($connection->connect_error) {
                echo 'Error';
            }
            $insert = $connection->prepare("INSERT INTO `role`(`role`) VALUES ('?')");
            $role = trim($title->getRole());
            $insert->bind_param("ssd", $role);
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
            $delete = $connection->prepare("DELETE FROM `role` WHERE `id_role`='?'");
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
            $update = $connection->prepare("UPDATE `role` SET `role`='?' WHERE `id_role`='?'");
            $role = trim($title->getRole());
            $id_role = trim($title->getIdRole());
            $update->bind_param("ssdi", $role, $id_role);
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
            $select = $connection->prepare("SELECT * FROM `role`");
            $select->get_result();
        } finally {
            $connection->close();
        }
    }
}

?>
