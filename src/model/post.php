<?php

namespace Application\Model\Post;

require_once('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Post
{
    public string $title;
    public string $frenchCreationDate;
    public string $content;
    public string $identifier;
    public string $auteur;
    public string $auteur_id;
}

class PostRepository
{
    public DatabaseConnection $connection;

    public function getPost(string $identifier): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT posts.id, posts.title, posts.content, DATE_FORMAT(posts.creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date ,users.username AS auteur ,users.id AS auteur_id FROM posts,users WHERE posts.auteur=users.id and posts.id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        $post = new Post();
        $post->title = $row['title'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->identifier = $row['id'];
        $post->auteur = $row['auteur'];
        $post->auteur_id = $row['auteur_id'];

        return $post;
    }

    public function getPosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT posts.id, posts.title, posts.content, DATE_FORMAT(posts.creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date ,users.username AS auteur FROM posts,users WHERE posts.auteur=users.id ORDER BY ID DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post();
            $post->title = $row['title'];
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->identifier = $row['id'];
            $post->auteur = ($row['auteur']===null)?'Unknown':$row['auteur'];
            $posts[] = $post;
        }

        return $posts;
    }
    public function getPostsALL(){
        $statement = $this->connection->getConnection()->query(
            "SELECT posts.id, posts.title, posts.content, DATE_FORMAT(posts.creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date ,users.username AS auteur FROM posts,users WHERE posts.auteur=users.id ORDER BY ID DESC "
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post();
            $post->title = $row['title'];
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->identifier = $row['id'];
            $post->auteur = $row['auteur'];
            $posts[] = $post;
        }

        return $posts;
    }
    public function CreatePost(string $title,string $content, $auteur):bool{
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO `posts`( id,title, auteur, content, creation_date) VALUES (NULL,?,?,?,NOW())'
        );
        $affectedLines = $statement->execute([$title, $auteur, $content]);

        return ($affectedLines > 0);
    }
    public function UpdatePost($id,$title,$content,$auteur): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE posts SET auteur = ?, content = ?, title= ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$auteur,$content, $title, $id]);

        return ($affectedLines > 0);
    }
}
