<?php

use db\Controllers\FilmController;
use db\Controllers\MemberController;
use db\Controllers\RoleController;
use db\DB;

require_once 'db/DB.php';
require_once 'db/Controllers/RoleController.php';
require_once 'db/Objects/Member.php';

if ($_SERVER["REQUEST_METHOD"] == 'GET' && isset($_GET["author"])) {
    $db = DB::getInstance();
    $roleCtrl = new RoleController($db);
    $authorRole = $roleCtrl->selectById(function ($x) {
        return $x->title == "Author";
    });
    $authorRoleId = $authorRole[0]->id;

    $memberCtrl = new MemberController($db);
    $authorMember = $memberCtrl->selectById(function ($x) use ($authorRoleId) {
        return $x->roleId == $authorRoleId && $x->fio == $_GET["author"];
    });

    if (count($authorMember) > 0) {
        echo json_encode(getByAuthor($authorMember[0], $db));
    } else {
        echo 'Bad Request';
    }
}

function getByAuthor($author, $db): array
{
    $filmCtrl = new FilmController($db);
    $arrFilms = $filmCtrl->selectById(function ($x) use ($author) {
        return $x->participantID == $author->id;
    });
    return count($arrFilms) > 0 ? $arrFilms : [];
}

?>