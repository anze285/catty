<!DOCTYPE html>
<html>
<?php
    include 'view/application/head.php';
?>

<body>
    <?php
        include 'view/application/navbar.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 d-flex justify-content-center justify-content-lg-end">
                <div class="posts-container">
                    <?php if (!empty($notice)) : ?>
                        <div class="alert alert-warning"><?= $notice ?></div>
                    <?php endif; ?>
                    <?php 
                    foreach ($posts as $post) :
                        include 'view/posts/_post.php';
                    endforeach; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-column">
                    <?php
                        include 'view/threads/_thread_list.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>