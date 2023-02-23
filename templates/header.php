<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Blog</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php?action=blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#AddPost">Add Post</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="index.php?action=profiles">
                    Users
                </a>
                <!-- <ul class="dropdown-menu">
                    <?php foreach ($profiles as $profile) { ?>
                        <li><a class="dropdown-item" href="index.php?action=Profile&id=<?= $profile['id'] ?>">Action</a></li>
                    <?php } ?>
                </ul> -->
            </li>

            <?php if (isset($_SESSION["username"]) && isset($_SESSION['id'])) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php?action=profile&id=<?= $_SESSION['id'] ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION["username"]; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?action=logOut">Log out</a>
                    </div>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=login">Login</a>
                </li>
            <?php  } ?>


        </ul>
    </div>
</nav>