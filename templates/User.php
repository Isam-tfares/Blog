<?php
$title = $user['username']; ?>
<?php ob_start(); ?>
<style>
    .card-style1 {
        box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
    }

    .border-0 {
        border: 0 !important;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 0.25rem;
    }

    section {
        padding: 120px 0;
        overflow: hidden;
        background: #fff;
    }

    .mb-2-3,
    .my-2-3 {
        margin-bottom: 2.3rem;
    }

    .section-title {
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 10px;
        position: relative;
        display: inline-block;
    }

    .text-primary {
        color: #ceaa4d !important;
    }

    .text-secondary {
        color: #15395A !important;
    }

    .font-weight-600 {
        font-weight: 600;
    }

    .display-26 {
        font-size: 1.3rem;
    }

    @media screen and (min-width: 992px) {
        .p-lg-7 {
            padding: 4rem;
        }
    }

    @media screen and (min-width: 768px) {
        .p-md-6 {
            padding: 3.5rem;
        }
    }

    @media screen and (min-width: 576px) {
        .p-sm-2-3 {
            padding: 2.3rem;
        }
    }

    .p-1-9 {
        padding: 1.9rem;
    }

    .bg-secondary {
        background: #15395A !important;
    }

    @media screen and (min-width: 576px) {

        .pe-sm-6,
        .px-sm-6 {
            padding-right: 3.5rem;
        }
    }

    @media screen and (min-width: 576px) {

        .ps-sm-6,
        .px-sm-6 {
            padding-left: 3.5rem;
        }
    }

    .pe-1-9,
    .px-1-9 {
        padding-right: 1.9rem;
    }

    .ps-1-9,
    .px-1-9 {
        padding-left: 1.9rem;
    }

    .pb-1-9,
    .py-1-9 {
        padding-bottom: 1.9rem;
    }

    .pt-1-9,
    .py-1-9 {
        padding-top: 1.9rem;
    }

    .mb-1-9,
    .my-1-9 {
        margin-bottom: 1.9rem;
    }

    @media (min-width: 992px) {
        .d-lg-inline-block {
            display: inline-block !important;
        }
    }

    .rounded {
        border-radius: 0.25rem !important;
    }
</style>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0 px-5"><?= $user['username'] ?></h3>

                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> <?= $user['email'] ?></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="posts">
            <?php foreach($posts as $post) {?>
                <div class="px-3 py-2 m-2 border">
            <h3 class="">
                <?= htmlspecialchars($post['title']); ?>
                <em class="fw-light text-secondary fs-5 ">le <?= $post['frenchCreationDate']; ?></em>
               
                <?php if ($_SESSION['username'] == $post['auteur']) { ?>
                    <a class="fw-normal text-primary fs-4 text-decoration-underline " href="index.php?action=updatePost&id=<?= $post['identifier'] ?>">Edit</a>
                <?php } ?>
            </h3>
            <p class="fw-light">
                <?= nl2br(htmlspecialchars($post['content'])); ?>
                <br />
                <em><a class="fw-normal" href="index.php?action=post&id=<?= urlencode($post['identifier']) ?>">See it</a></em>
            </p>
        </div>

            <?php } ?>

        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php');
?>