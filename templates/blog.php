<?php $title = "Blog"; ?>

<?php ob_start(); ?>

<h1 class="text-center">Welcome To My Blog </h1>
<p class="text-center text-primary pt-5">All Posts</p>

<div class="container  ">
    <?php
    foreach ($posts as $post) {

    ?>

        <div class="px-3 py-2 m-2 border">
            <h3 class="">
                <?= htmlspecialchars($post->title); ?>
                <em class="fw-light text-secondary fs-5 ">le <?= $post->frenchCreationDate; ?></em>
                <em class="fw-normal text-secondary fs-5 ">By <?= $post->auteur; ?></em>
                <?php if ($_SESSION['username'] == $post->auteur) { ?>
                    <a class="fw-normal text-primary fs-4 text-decoration-underline " href="index.php?action=updatePost&id=<?= $post->identifier ?>">Edit</a>
                <?php } ?>
            </h3>
            <p class="fw-light">
                <?= nl2br(htmlspecialchars($post->content)); ?>
                <br />
                <em><a class="fw-normal" href="index.php?action=post&id=<?= urlencode($post->identifier) ?>">See it</a></em>
            </p>
        </div>

    <?php
    }
    ?>
</div>
<h1 class="text-center">Add Post </h1>


<div class="container  " id="AddPost">
    <form action="index.php?action=AddPost" method="post">
        <div class="mb-3">
            <label for="ff" class="form-label">Title</label>
            <input type="text" name='title' class="form-control" id="ff" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content of post</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary py-2 px-5" name="submit" value="Add">
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>