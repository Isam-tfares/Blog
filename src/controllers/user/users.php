<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('src/model/user.php');
function UsersController(){
    $users=getUsers();
    require('templates/Users.php');
}