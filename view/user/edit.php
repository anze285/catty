<!DOCTYPE html>
<html>
<?php
    include 'view/application/head.php';
?>

<script>
    $(document).ready(function() {
        $('.catavatar-picture').click(function() {
            $('.catavatar-picture').removeClass('selected');
            $(this).addClass('selected');
            $('#catavatar').val($(this).attr('src'));
        });
    });
</script>

<body>
    <?php
        include 'view/application/navbar.php';
    ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container">
            <h2 class="text-center">Edit User Form</h2>
            <?php if (!empty($notice)) : ?>
            <div class="alert alert-danger"><?= $notice ?></div>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            <form method="POST" action="<?= BASE_URL . "edit" ?>">
                <div class="form-group">
                    <label for="catname">CatNick:</label>
                    <input type="text" class="form-control" id="catname" name="catname" required
                        value="<?= $_SESSION["user"]["catname"] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <div class="text-center"><label for="catavatar">CatAvatar:</label></div>
                    <div class="image-row text-center">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php $selected = strpos($_SESSION["user"]["catavatar"], $i) !== false ? ' selected' : ''; ?>
                            <img class="catavatar-picture cursor-pointer <?php echo $selected; ?>"
                            src="<?php echo ASSETS_URL . "catavatar/catavatar" . $i . ".jpg"; ?>">
                        <?php endfor; ?>
                        <input type="hidden" name="catavatar" id="catavatar" value="<?php echo ASSETS_URL . "catavatar/catavatar1.jpg"; ?>">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>