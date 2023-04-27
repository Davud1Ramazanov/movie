<?php

abstract class Controller
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public abstract function insert($title);

    public abstract function delete($id);

    public abstract function update($title);

    public abstract function select();
    public abstract function selectById($id);
}

?>