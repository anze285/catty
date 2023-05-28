<html>
<?php
    include 'view/application/head.php';
?>

<body>
    <?php
        include 'view/application/navbar.php';
    ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                <div>
                    <?php
                        include 'view/posts/_post.php';
                    ?>
                </div>
            </div>
            <div class="col-lg-6">
                <?php
                    include 'view/comments/_comments.php';
                ?>
            </div>
        </div>
    </div>

</body>

</html>