<!DOCTYPE html>
<html>
<?php
    include 'view/application/head.php';
?>

<body>
    <?php
        include 'view/application/navbar.php';
    ?>
    <form class="container-fluid container-lg" method="POST" action="<?= BASE_URL . "posts/edit" ?>">
        <input type="hidden" class="form-control" id="id" name="id" value="<?= $post["id"] ?>">
        <?php if (!empty($notice)) : ?>
            <div class="alert alert-danger"><?= $notice ?></div>
            <?php endif; ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required
            value="<?= $post["title"] ?>">
        </div>
        <div class="form-group">
            <label for="text">Text:</label>
            <textarea class="form-control" id="text" name="text" rows="5"><?= $post["text"] ?></textarea>
        </div>
        <div class="form-group">
            <label for="thread">Thread:</label>
            <select class="form-control" id="thread" name="thread" required>
                <?php foreach ($threads as $thread) : ?>
                    <option value="<?= $thread['id'] ?>" <?php if ($post["tid"] == $thread['id']) echo 'selected' ?>><?= $thread['title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

</body>

</html>