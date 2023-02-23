<?php

namespace Application\Controllers\Post\Add;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\post\PostRepository;

class AddPost
{
    public function execute(array $input)
    {
        $author = $_SESSION['id'];
        $post = null;
        $title = null;
        if (!empty($input['title']) && !empty($input['title'])) {
            $post = $input['content'];
            $title = $input['title'];
        } else {
            throw new \Exception('Les données du post sont invalides.');
        }

        $postrepository = new PostRepository();
        $postrepository->connection = new DatabaseConnection();
        $success = $postrepository->CreatePost($title, $post, $author);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php');
        }
    }
}
