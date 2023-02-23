<?php

require_once('src/controllers/comment/add.php');
require_once('src/controllers/comment/update.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post/post.php');
require_once('src/controllers/post/add.php');
require_once('src/controllers/post/update.php');
require_once('src/controllers/user/login.php');
require_once('src/controllers/user/users.php');
require_once('src/controllers/user/user.php');

use Application\Controllers\Post\Add\AddPost;
use Application\Controllers\Comment\Add\AddComment;
use Application\Controllers\Comment\Update\UpdateComment;
use Application\Controllers\post\Update\UpdatePost;
use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Post\Post;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new Post())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'login') {
            if (isset($_SESSION['id'])) {
                header('Location: index.php');
            }

            if (isset($_POST['signin'])) {
                login($_POST);
            } else {
                login();
            }
        } elseif ($_GET['action'] === 'logOut') {
            session_destroy();
            header('Location: index.php');
        } elseif ($_GET['action'] === 'addComment') {
            if (!isset($_SESSION['id'])) {
                header('Location: index.php');
            }
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddComment())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET["action"] === "profiles") {
            UsersController();
        } elseif ($_GET["action"] === "profile") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                UserController($identifier);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } elseif ($_GET["action"] === "AddPost") {
            if (!isset($_SESSION['id'])) {
                header('Location: index.php');
            }
            if (isset($_POST["submit"])) {
                (new AddPost())->execute($_POST);
            }
        } elseif ($_GET["action"] === "blog") {

            (new Post())->excuteAll();
        } elseif ($_GET['action'] === 'updateComment') {
            if (!isset($_SESSION['id'])) {
                header('Location: index.php');
            }
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                // It sets the input only when the HTTP method is POST (ie. the form is submitted).
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }

                (new UpdateComment())->execute($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } elseif ($_GET['action'] === 'updatePost') {
            if (!isset($_SESSION['id'])) {
                header('Location: index.php');
            }
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }

                (new UpdatePost())->execute($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        (new Homepage())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
