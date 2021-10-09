<?php

if (!empty($_SESSION["current_user"])) { ?>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-index ">
            <a class="navbar-brand" href="./index.php"><img src="../public/image/logo_noback.png" alt="" width="80" height="80"></a>
            <a href="./index.php" class="offset-4 text-brand">CiLi Decor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse justify-content-end navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-primary nav-link dropdown-toggle btn-user" href="#" role="button" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION["current_user"]["fullname"]; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../user/my_cart.php">My cart</a>
                            <a class="dropdown-item" href="../account/change_password.php">Change password</a>
                            <a class="dropdown-item" href="../account/my_profile.php">My profile</a>
                            <a class="dropdown-item" href="../account/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
<?php
} else {
?>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-index">
            <a class="navbar-brand" href="./index.php"><img src="../public/image/logo_noback.png" alt="" width="80" height="80"></a>
            <a href="./index.php" class="offset-4 text-brand">CiLi Decor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <a class="btn btn-outline-primary nav-link dropdown-toggle btn-user" href="../account/login.php">
                    Login
                </a>
            </div>
        </nav>
    </div>
<?php
}
?>