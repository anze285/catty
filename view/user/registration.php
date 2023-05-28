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
            <h2 class="text-center">Registration Form</h2>
            <?php if (!empty($notice)) : ?>
            <div class="alert alert-danger"><?= $notice ?></div>
            <?php endif; ?>
            <form method="POST" action="<?= BASE_URL . "registration" ?>">
                <div class="form-group">
                    <label for="catname">CatNick:</label>
                    <input type="text" class="form-control" id="catname" name="catname" required
                        value="<?= isset($formData['catname']) ? htmlspecialchars($formData['catname']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="<?= isset($formData['email']) ? htmlspecialchars($formData['email']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <div class="text-center"><label for="catavatar">CatAvatar:</label></div>
                    <div class="image-row text-center">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <img class="catavatar-picture cursor-pointer<?php if ($i === 1) echo ' selected'; ?>"
                            src="<?php echo ASSETS_URL . "catavatar/catavatar" . $i . ".jpg"; ?>">
                        <?php endfor; ?>
                        <input type="hidden" name="catavatar" id="catavatar" value="<?php echo ASSETS_URL . "catavatar/catavatar1.jpg"; ?>">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>