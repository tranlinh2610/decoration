<?php
// var_dump(($currentUser));
?>
<aside class="admin-sidebar" style="background-image: linear-gradient(62deg, #F3DBCF 12%, #AAC9CE 41%);" ;>
    <div class="admin-sidebar-brand" style="background-color: #b7c5d2;">
        <!-- begin sidebar branding-->
        <img class="admin-brand-logo pt-4" style=" width: 150; height: 150;" src="../public/image/logo_noback.png"></img>
        <!-- end sidebar branding-->
        <div class="ml-lg-n4">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle text-white"></a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar text-white"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu mt-4">
            <?php if (!$isLoggedIn) : ?>
                <li class="menu-item active ">
                    <a href="../account/login.php" class="menu-link">
                        <span class="menu-label">
                            <span class="menu-name">
                                Login
                            </span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder fe fe-activity "></i>
                        </span>
                    </a>
                </li>
            <?php else : ?>
                <?php if ($currentUser['user_role_id'] == "3") : ?>
                    <li class="menu-item ">
                        <a href="../admin/index.php" class=" menu-link">
                            <span class="menu-icon">
                                <i class="mdi mdi-chart-bar mdi-24px " style=" color: #ff9800b3;"></i>
                            </span>
                            <span class="menu-label">
                                <span class="menu-name ml-2 text-light font-weight-bold">Dashboard</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="open-dropdown menu-link">
                            <span class="menu-icon">
                                <i class="mdi mdi-cogs mdi-24px  mdi-spin" style=" color: #ff9800b3;"></i>
                            </span>
                            <span class="menu-label">
                                <span class="menu-name ml-2 text-light font-weight-bold">Manage Store
                                    <span class="menu-arrow"></span>
                                </span>
                            </span>

                        </a>
                        <!--submenu-->
                        <ul class="" style="display: block;">
                            <li class="menu-item ">
                                <a href="../admin/list_categories.php" class=" menu-link">
                                    <span class="menu-icon">
                                        <i class="mdi mdi-cart-outline mdi-24px" style=" color: #ff9800b3;"></i>
                                    </span>
                                    <span class="menu-label">
                                        <span class="menu-name ml-2 text-light font-weight-bold">Manage Product</span>
                                    </span>

                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../admin/manage_categories.php" class=" menu-link">
                                    <span class="menu-icon">
                                        <i class="mdi mdi-basket mdi-24px " style=" color: #ff9800b3;"></i>
                                    </span>
                                    <span class="menu-label">
                                        <span class="menu-name ml-2 text-light font-weight-bold">Manage Categories</span>
                                    </span>

                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>
            <?php endif; ?>
        </ul>
    </div>
</aside>