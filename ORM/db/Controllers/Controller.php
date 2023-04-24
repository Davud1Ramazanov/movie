<?php

namespace Controllers;

abstract class Controller
{
    private $db_controller;

    public function __construct($db_controller)
    {
        $this->db_controller = $db_controller;
    }

    public abstract function insert($title);

    public abstract function delete($id);

    public abstract function update($title);

    public abstract function select();
}

?>
