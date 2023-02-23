<?php
function ConnectToDb()
{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    return $database;
}
function LoginToDB($username, $password)
{
    $database = ConnectToDb();
    $statement = $database->prepare("SELECT * from users WHERE username= ? and password = ?");
    $statement->execute([$username, $password]);
    return ($statement->fetch());
}
function getUsers()
{
    $database = ConnectToDb();
    $statement = $database->prepare("SELECT * from users");
    $statement->execute();
    $users = [];
    while ($row = $statement->fetch()) {
        $user = [
            'id' => $row['id'],
            'email' => $row['email'],
            'username' => $row['username']
        ];
        $users[] = $user;
    }
    return $users;
}
function getUser($identifier)
{
    $database = ConnectToDb();
    $statement = $database->prepare("SELECT * from users WHERE id=?");
    $statement->execute([$identifier]);
    $row = $statement->fetch();
    $user = [
        'id' => $row['id'],
        'email' => $row['email'],
        'username' => $row['username']
    ];
    return $user;
}
function getPostsOfUser($identifier){
    $database = ConnectToDb();
    $statement = $database->prepare("SELECT * from posts WHERE posts.auteur=?");
    $statement->execute([$identifier]);
    $posts = [];
    while ($row = $statement->fetch()) {
        $post = [
            'identifier'=>$row['id'],
            'title' => $row['title'],
            'content' => $row['content'],
            'frenchCreationDate'=>$row['creation_date'],
            'auteur'=>$row['auteur']
        ];
        $posts[] = $post;
    }
    return $posts;
}
