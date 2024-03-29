<header class="admin-header" style="background-image: linear-gradient(62deg, #F3DBCF 12%, #AAC9CE 41%);">

    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>
    <nav class=" ml-auto">
        <ul class="nav align-items-center m-r-30">

            <?php if (!empty($_SESSION["current_user"]["username"])) : ?>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img class="avatar-img rounded-circle bg-info" src="../public/image/logo_noback.png" alt="No image" height="70" width="70" style="border-radius:10px" />
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right">
                        <a href="../account/logout.php" class="dropdown-item"> Logout</a>
                    </div>
                </li>
                <div class="nav-item m-r-3">
                    <a href="#">
                        <b class="text-white">Administrator</b>
                    </a>
                </div>
            <?php elseif (!empty($_SESSION["current_user"]["username"])) : ?>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <span class="avatar-title rounded-circle bg-dark">T</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href=""> Help </a>
                        <div class="dropdown-divider"></div>
                        <a href="../account/logout.php" class="dropdown-item"> Logout</a>
                    </div>
                </li>
                <div class="nav-item m-r-3">
                    <a href="#">
                        <b><?= $_SESSION['current_username']['username'] ?></b>
                    </a>
                </div>
            <?php else : ?>
                <li class="nav-item m-r-3">
                    <a href="./admin/account/login.php" class="btn btn-dark">Login</a>
                </li>
            <?php endif; ?>
        </ul>

    </nav>
</header>