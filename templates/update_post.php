<?php $title = "Edit"; ?>

<?php ob_start(); ?>


<h1 class="text-center py-3">Edit Post</h1>
<div class="container py-3">
<form action="index.php?action=updatePost&id=<?= $post->identifier ?>" method="post" class="py-5  mx-auto" style="width:400px;">
<div class=" form-outline mb-4">
      <label class="form-label" for="author">title</label><br />
      <input class="form-control" type="text" id="title" name="title" value="<?= $post->title ?>"/>
   </div>
   <div class=" form-outline mb-4">
      <label class="form-label" for="comment">content of post</label><br />
      <textarea class="form-control" id="comment"  rows="10" name="content"><?= $post->content ?></textarea>
   </div>
   <div class=" form-outline mb-4">
      <input type="submit" class="form-control btn btn-primary" style="width:100px;"/>
   </div>
</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
