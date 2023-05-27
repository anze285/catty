<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand p-0" href="<?= BASE_URL . 'threads' ?>">Catty</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?php if (isset($_SESSION['user'])): ?>
            <div class="d-flex align-items-center">
                <div><span class="text-white h5"><?php echo $_SESSION['user']['catname']; ?>&nbsp;&nbsp;</span></div>

                <div class="profile-container">
                    <img class="profile-picture cursor-pointer"
                        src="https://cdn.shopify.com/s/files/1/1140/3964/products/SB02-A_WB_3_700x700.jpg?v=1653386567"
                        alt="Profile Picture" data-toggle="dropdown">

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">My Page</a>
                        <a class="dropdown-item" href="#">Edit</a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="<?= BASE_URL . "logout" ?>" method="POST" style="display: none;">
                        </form>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                </div>

            </div>
            <?php else: ?>
            <a href="<?= BASE_URL . 'login' ?>" class="btn btn-primary">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>