<!DOCTYPE html>
<html>
<?php
    include 'view/application/head.php';
?>

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
                    <label for="catavatar">Cat Avatar:</label>
                    <input type="text" class="form-control" id="catavatar" name="catavatar">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>