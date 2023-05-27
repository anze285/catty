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
                <!-- Left column for displaying posts -->
                <div class="posts-container">
                    <?php 
                    foreach ($posts as $post) :
                        include 'view/posts/_post.php';
                    endforeach; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Right column (empty for now) -->dsadsas
                <div class="right-column">
                    <!-- Placeholder content -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>