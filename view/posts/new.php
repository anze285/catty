<!DOCTYPE html>
<html>
<?php
    include 'view/application/head.php';
?>

<body>
    <?php
        include 'view/application/navbar.php';
    ?>
    <br><br><br><br><br>
    <form class="" method="POST" action="<?= BASE_URL . "posts/new" ?>" enctype="multipart/form-data">
        <?php if (!empty($notice)) : ?>
            <div class="alert alert-danger"><?= $notice ?></div>
            <?php endif; ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required
            value="<?= isset($formData['title']) ? htmlspecialchars($formData['title']) : '' ?>">
        </div>
        <div class="form-group">
            <label for="text">Text:</label>
            <textarea class="form-control" id="text" name="text" rows="5"><?= isset($formData['text']) ? htmlspecialchars($formData['text']) : '' ?></textarea>
        </div>
        <div class="form-group">
            <label for="photo">Select Photo:</label>
            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
        </div>
        <div class="form-group">
            <label for="thread">Thread:</label>
            <select class="form-control" id="thread" name="thread" required>
                <?php
                    foreach ($threads as $thread) {
                        echo '<option value="' . $thread['id'] . '">' . $thread['title'] . '</option>';
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>