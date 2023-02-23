<?php $title = $post->title; ?>

<?php ob_start(); ?>

<div class="container p-2 mt-3">
    <div>
        <h3 class="text-center p-2">
            <?= htmlspecialchars($post->title) ?>
           <br> <em class="fw-light text-secondary fs-5">le <?= $post->frenchCreationDate ?> By</em>
           <a href="index.php?action=profile&id=<?= $post->auteur_id ?>" class="fw-light text-primary fs-4"> <?= $post->auteur ?></a>
        </h3>

        <p class="p-4 mx-auto  text-secondary">
            <?= nl2br(htmlspecialchars($post->content)) ?>
        </p>
    </div>
    
    <?php if (isset($_SESSION['id'])) { ?>
        <div class=" bg-light px-4 py-1 w-75">
            <form action="index.php?action=addComment&id=<?= $post->identifier ?>" method="post" class="">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="author" name="author" value="<?= $_SESSION['username'] ?>">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                </div>
                <div class="m-2">
                    <input type="submit" value="Add" class="form-control btn btn-primary " style="width:100px;" />
                </div>
            </form>

        </div>
        <h4 class="text-primary ps-4">Comments</h4>
    <?php } ?>

    <?php
    foreach ($comments as $comment) {
    ?>
        <p class="p-2 fw-light"><a href="index.php?action=profile&id=<?= $comment->user_identifier ?>"><strong class="fw-bold pe-4"><?= htmlspecialchars($comment->author) ?></strong></a> le <?= $comment->frenchCreationDate ?>
            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $comment->author) { ?>
                (<a href="index.php?action=updateComment&id=<?= $comment->identifier ?>">modifier</a>)
            <?php } ?>
        </p>
        <p class="p-3 text-dark rounded-pill w-75 fw-light bg-light"><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
    <?php
    }
    ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>