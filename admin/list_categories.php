<?php
include "../config.php";

if (!isset($_SESSION['current_user'])) {
    header("location: ../account/login.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../php_library/html_header.php"; ?>
</head>

<body class="sidebar-pinned ">
    <?php include "../php_library/aside.php"; ?>
    <main class="admin-main">
        <?php include "../php_library/header.php"; ?>

        <!-- PLACE CODE INSIDE THIS AREA -->
        <section class="manage-product">
            <div class="container m-t-30">
                <div class="row ">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4 class="text-center mt-3" style="color: #72cddc; font-weight: 500;"> Select categories </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group has-search">
                                            <span class="fa fa-search form-control-feedback"></span>
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                    </div>

                                </div> -->
                                <div class="table-responsive p-t-10">
                                    <table id="table_categories" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Id</th>
                                                <th>Categories name</th>
                                                <th>Categories description</th>
                                                <th>Categories image</th>

                                                <th>Select</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                            $i = 1;
                                            $result = $link->query("select * from categories");
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $row["ctg_name"]; ?></td>
                                                    <td><?= $row["ctg_description"]; ?></td>
                                                    <td><?php
                                                        if ($result->num_rows > 0) {
                                                            $imageURL = '../admin/image_categories/' . $row["ctg_image"];
                                                        ?>
                                                            <img src="<?php echo $imageURL; ?>" alt="" height="50" width="50" style="border-radius:10px" />
                                                        <?php
                                                        } else { ?>
                                                            <p>No image(s) found...</p>

                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="./manage_products.php?idctg=<?= $row["ctg_id"] ?>" class="btn btn-info  btn-edit-role" role="button">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <i class="mdi mdi-pencil-outline"></i>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--/ PLACE CODE INSIDE THIS AREA -->
    </main>
    <?php include "../php_library/js_libs.php"; ?>

    <script>
        $(document).ready(function() {
            $('#table_categories').DataTable();
        })
        document.addEventListener("DOMContentLoaded", function(e) {
            let activeId = null;
            $(document).on('click', ".btn-add-role", function(e) {
                Utils.api("add_role_info", {
                    roleName: $('#addNameRole').val(),
                    roleDescription: $('#addDescriptionRole').val(),
                }).then(response => {



                }).catch(err => {

                })
            });
            $(document).on('click', ".btn-get-role-info", function(e) {
                e.preventDefault();
                $('#roleDetailModal').modal();
                const roleId = parseInt($(this).data("id"));
                activeId = roleId;
                console.log(roleId);
                Utils.api("get_role_info", {
                    id: roleId
                }).then(response => {
                    console.log("name", response.data.role_name);
                    $('#roleNameDetail').text(response.data.role_name);
                    $('#roleDescription').text(response.data.role_description);
                    $('#roelStatus').texy(response.data.role_status);
                    $('#roelCreateTime').text(response.data.role_create_time);
                    $('#roelUpdateTime').text(response.data.topic_update_time);
                    $('#roleDetailModal').modal();
                }).catch(err => {

                })
            });
        })
    </script>
</body>

</html>