<?php

use db\DB;
use db\Controllers\UserController;
include_once __DIR__.'/../DB.php';
include_once './ORM/Objects/User.php';
include_once './ORM/Controllers/UserController.php';

class testUserController
{
    private $controller;
    public function __construct(){
        $dbGetdata = DB::getInstance();
        $this->controller = new UserController($dbGetdata);
    }
    public function insertUser()
    {
        $user = new User(0, 1, 'test_login', 'pass1245', 0);
        if($this->controller->insert($user)){
            echo 'Successful insert to db';
        }
        else{
            echo 'Error in insert user';
        }
    }

    public function authUser(string $login, string $password){
        foreach ($this->select() as $item){
            if($item->getLogin() == $login && $item->getPassword() == $password){
                echo 'Successful auth user!';
            }
            else{
                echo 'Error in auth user';
            }
        }
    }
}

?>
