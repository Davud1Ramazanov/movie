<?php

use db\DB;
use db\Controllers\UserController;
include_once './ORM/Objects/User.php';
include_once './ORM/Controllers/UserController.php';

class testUserController
{
    private $controller;
    public function __construct(){
        $this->controller = new UserController(DB::getInstance());
    }
    public function insertUser()
    {
        $user = new User(null, null, 'test_login', 'pass1245', null);
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
