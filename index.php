<?php

include_once './ORM/tests/testUserController.php';

$test_user = new testUserController();
$test_user->insertUser();
$test_user->authUser('test_213', 'lala_1235');
?>
