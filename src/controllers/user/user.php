<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('src/model/user.php');
function UserController($identifier){
    $user=getUser($identifier);
    $posts=getPostsOfUser($identifier);
    require('templates/User.php');
}