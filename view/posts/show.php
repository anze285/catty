<html>
<?php
    include 'view/application/head.php';
?>

<body>
    <?php
        include 'view/application/navbar.php';
    ?>
    <br><br><br><br>
    <div class="container">
        <h1><?= htmlspecialchars($post['title']) ?></h1>
        <p><?= nl2br(htmlspecialchars($post['text'])) ?></p>
        <?php if (!empty($post['photo_url'])) : ?>
            <img src="<?= ASSETS_URL . htmlspecialchars($post['photo_url']) ?>" alt="Post Photo" class="img-fluid">
        <?php endif; ?>
        <p>Posted by: <?= htmlspecialchars($post['catname']) ?></p>
        <p>Thread: <?= htmlspecialchars($post['thread_title']) ?></p>
    </div>

</body>

</html>