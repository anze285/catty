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
            <h2 class="text-center">Login Form</h2>
            <?php if (!empty($notice)) : ?>
            <div class="alert alert-danger"><?= $notice ?></div>
            <?php endif; ?>
            <form method="POST" action="<?= BASE_URL . "login" ?>">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="<?= isset($formData['email']) ? htmlspecialchars($formData['email']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>