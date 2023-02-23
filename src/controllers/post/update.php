<?php

namespace Application\Controllers\post\Update;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;

class UpdatePost
{
    public function execute(string $identifier, ?array $input)
    {
        if($input!==null){
        // It handles the form submission when there is an input.
        $author = $_SESSION['id'];
        $post = null;
        $title = null;
        if ( !empty($input['content']) && !empty($input['title'])) {
            $post = $input['content'];
            $title = $input['title'];
        } else {
            throw new \Exception('Les données du post sont invalides.');
        }

        $postrepository = new PostRepository();
        $postrepository->connection = new DatabaseConnection();
        $success = $postrepository->UpdatePost($identifier, $title, $post, $author);
        if (!$success) {
            throw new \Exception('Impossible de modifier le post !');
        } else {
            header('Location: index.php?action=blog');
        }
    }else{
        $postrepository = new PostRepository();
        $postrepository->connection = new DatabaseConnection();
        $post = $postrepository->getPost($identifier);
        if ($post === null || $post->auteur_id!=$_SESSION['id']) {
            throw new \Exception("Le post $identifier n'existe pas.");
        }

        require('templates/update_post.php');
    }
    }
}
