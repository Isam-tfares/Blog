<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('src/model/user.php');
function login($input=null){
    if($input===null){
        require('templates/login.php');
    }
    else{
        $username=null;
        $password=null;
        if (!empty($input['username']) && !empty($input['password'])) {
            $username=$input['username'];
            $password=$input['password'];
        }
        else{
            throw new \Exception('Les données du post sont invalides.');
        }
        $succes=LoginToDB( $username,$password);
        if(!$succes){
            throw new \Exception('Impossible d\'ajouter le post !');
        }
        else{
            $_SESSION['id']=$succes['id'];
            $_SESSION['username']=$succes['username'];
            header('Location: index.php');
        }
    }
}