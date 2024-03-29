<?php
include "../config.php";
$idCtg = $_GET["idctg"];
if (!isset($_SESSION['current_user'])) {
    header("location: ../account/login.php");
}

$result = $link->query("SELECT categories.* from categories  where ctg_id = $idCtg");
$resultCategories = mysqli_fetch_assoc($result);
$resultProduct = $link->query("SELECT products.*, categories.* from products INNER JOIN categories ON products.category_id = categories.ctg_id  where categories.ctg_id = '$idCtg'  order by `p_id` ASC");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../php_library/html_header.php"; ?>
    <link rel="stylesheet" href="./css/btn_button.css">

</head>

<body class="sidebar-pinned ">
    <?php include "../php_library/aside.php"; ?>
    <main class="admin-main">
        <?php include "../php_library/header.php"; ?>

        <!-- PLACE CODE INSIDE THIS AREA -->

        <section class="manage-page">
            <div class="container m-t-30">
                <div class="row ">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4 class="text-center mt-3" style="color: #72cddc; font-weight: 500;">List product of <?= $resultCategories['ctg_name'] ?> </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12 ">
                                        <a href="" class="btn btn-info float-right" role="button" data-toggle="modal" data-target="#addProduct"><i class="mdi mdi-clipboard-plus"></i> Add new product
                                        </a>
                                    </div>
                                </div>

                                <div class="table-responsive p-t-10">
                                    <table id="table_id" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Id</th>
                                                <th>Product name</th>
                                                <th>Product quantity</th>
                                                <th>Product price</th>
                                                <th>Product image</th>
                                                <th>Create time</th>
                                                <!-- <th>Update time</th> -->
                                                <th>Select</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                            $i = 1;
                                            if (!empty($resultProduct)) {
                                                while ($row = mysqli_fetch_array($resultProduct)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row["p_name"]; ?></td>
                                                        <td><?= $row["p_quantity"]; ?></td>
                                                        <td><?php echo  number_format($row["p_price"], 0, ",", "."), ' VNĐ'; ?></td>
                                                        <td><?php
                                                            if ($result->num_rows > 0) {
                                                                $imageURL = '../admin/image_products/' . $row["p_image"];
                                                            ?>
                                                                <img src="<?php echo $imageURL; ?>" alt="" height="50" width="50" style="border-radius:10px" />
                                                            <?php
                                                            } else { ?>
                                                                <p>No image(s) found...</p>
                                                            <?php } ?>
                                                        </td>

                                                        <td><?= date("Y-M-d H:i:s", strtotime($row["p_date_create"])); ?></td>
                                                        <!-- <?php
                                                                if (!empty($row['p_date_update'] == 0)) {

                                                                ?>
                                                            <td style="padding: 2.5%;">Not Update</td>

                                                        <?php
                                                                } else {  ?>
                                                            <td style="padding: 2.5%;"><?= date("Y-M-d H:i:s", strtotime($row["p_date_update"])); ?></td>
                                                        <?php
                                                                }
                                                        ?> -->

                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button class="btn btn-info  btn-edit-product" role="button" data-id="<?= $row['p_id'] ?>"><i class="mdi mdi-pencil-outline"></i> </button>
                                                                <button class="btn btn-danger btn-delete-product" role="button" data-id="<?= $row['p_id'] ?>"><i class="mdi mdi-delete"></i>
                                                                </button>
                                                                <button class="btn btn-primary btn-detail-product" role="button" data-id="<?= $row['p_id'] ?>"><i class="mdi mdi-dots-horizontal"></i> </button>

                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal add  -->
                <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProduct">Add new product</h5>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" name="manageProduct" id="addNewProduct" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">Product Name</label>
                                        <input type="text" class="form-control" id="inputNameProduct" name="nameProduct" placeholder="Enter name of product" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Product Description</label>
                                        <input type="text" class="form-control" id="descriptionProduct" name="descriptionProduct" placeholder="Enter name of topic" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Product Quantity</label>
                                        <input type="number" class="form-control" id="quantityProduct" name="quantityProduct" placeholder="Enter quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Product price</label>
                                        <input type="number" class="form-control" id="priceProduct" name="priceProduct" placeholder="Enter price" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="control-label">Product Image :</label>
                                        <input type="file" class="form-control" id="imageProduct" name="imageProduct" required>
                                    </div> -->

                                    <div class="form-group">
                                        <div>
                                            <p class=" font-secondary">Product Image</p>
                                            <div class="input-group mb-3">
                                                <div onload="GetFileInfo ()">
                                                    <input type="file" class="custom-file-input" id="inputFile" name="imageProduct" onchange="GetFileInfo ()">
                                                    <label class="custom-file-label" for="inputFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div id="info" style="margin-top:10px"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Product Image Library :</label>
                                        <input type="file" class="form-control" id="imageProductLibrary" name="imageProductLibrary[]" multiple required>
                                    </div>

                                    <input type="submit" class="btn btn-primary btn-md float-right" name="addProduct" value="Create product">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Detail -->
                <div class="modal fade" id="detailProduct" tabindex="-1" role="dialog" aria-labelledby="detailProduct" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailProduct">Detail
                                    Information product
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="detail">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Product name</td>
                                                <td id="detailProductName"></td>
                                            </tr>
                                            <tr>
                                                <td>Product description</td>
                                                <td id="detailProductDescription"></td>
                                            </tr>
                                            <tr>

                                                <div>
                                                    <img src="" alt="" id="detailListProductImage" width="100" height="100" style="display: flex; flex-direction:row; margin: 23px 16px;" />
                                                    <!-- <img src="" class="avatar-img " height="50" width="50" alt="No avatar" id="detailListProductImage"> -->
                                                </div>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="button-close float-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProduct" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProduct">Edit Product Information</h5>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="editProductVali" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="editProductId" name="editProductId" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="editProductName">Product name</label>
                                        <input type="text" class="form-control" id="editProductName" name="editProductName">
                                    </div>
                                    <div class="form-group">
                                        <label for="editProductQuantity">Product quantity</label>
                                        <input type="number" class="form-control" id="editProductQuantity" name="editProductQuantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="editProductPrice">Product price</label>
                                        <input type="number" class="form-control" id="editProductPrice" name="editProductPrice">
                                    </div>
                                    <div class="form-group">
                                        <label for="editProductImage">Product price</label>
                                        <input type="file" class="form-control" id="editProductImage" name="editProductImage">
                                    </div>
                                    <div class="model-footer">
                                        <button type="submit" class="btn btn-warning btn-update-product" name="updateProduct">
                                            Save Changes
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </form>
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



            $.validator.addMethod("lettersOnly", function(value, element) {
                return this.optional(element) || /^[a-z," "]+$/i.test(value);
            }, "Letters and spaces only please");

            $('#editProductVali').validate({
                rules: {
                    editProductName: {
                        required: true,
                        lettersOnly: true
                    },
                    editProductQuantity: {
                        required: true,
                        number: true
                    },
                    editProductFresh: {
                        required: true,
                        number: true
                    },

                    editProductPrice: {
                        required: true,
                        number: true
                    },
                    editProductImage: {
                        required: true,

                    },


                },
                messages: {

                    editProductName: {
                        required: "Please provide product name!",
                        lettersOnly: " Please enter letter only!"
                    },
                    editProductQuantity: {
                        required: "Please provide information!",
                    },
                    editProductFresh: {
                        required: "Please provide information!",
                        number: "Please provide only number!",
                    },
                    editProductPrice: {
                        required: "Please provide information!",
                        number: "Please provide only number!",
                    },
                    editProductPrice: {
                        required: "Please provide information!",
                        number: "Please provide only number!",
                    },
                    editProductImage: {
                        required: "Please provide image!",

                    },

                },
            })



            $('#addNewProduct').validate({
                rules: {
                    nameProduct: {
                        required: true,
                        lettersOnly: true
                    },
                    descriptionProduct: {
                        required: true,

                    },
                    freshProduct: {
                        required: true,
                        number: true,

                    },
                    quantityProduct: {
                        required: true,
                        number: true
                    },
                    priceProduct: {
                        required: true,
                        number: true
                    },

                    imageProduct: {
                        required: true,
                    },

                },
                messages: {

                    nameProduct: {
                        required: "Please provide product name!",
                        lettersOnly: " Please enter letter only!"
                    },
                    descriptionProduct: {
                        required: "Please provide information!",
                    },
                    freshProduct: {
                        required: "Please provide information!",
                        number: "Please provide only number!",
                    },
                    quantityProduct: {
                        required: "Please provide information!",
                        number: "Please provide only number!",
                    },
                    priceProduct: {
                        required: "Please provide information!",
                        number: "Please provide only number!",
                    },
                    imageProduct: {
                        required: "Please provide image!",
                    },



                },
            })





            $('#table_id').DataTable();
        });
        document.addEventListener("DOMContentLoaded", function(e) {

            let activeId = null;
            $(document).on('click', ".btn-delete-product", function(e) {
                e.preventDefault();
                swal({
                    title: "Please confirm",
                    text: 'Are sure you want to delete this user?',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        Utils.api('delete_product_info', {
                            id: $(this).data('id'),
                        }).then(response => {
                            swal("Notice", response.msg, "success").then(function(e) {
                                location.reload()
                            });
                        }).catch(err => {})
                    }
                });
            });
            $(document).on('click', '.btn-detail-product', function(e) {

                e.preventDefault();
                var pathFile = "../admin/image_products/";
                const productId = parseInt($(this).data("id"));
                console.log(productId)
                Utils.api('get_product_detail', {
                    id: productId
                }).then(response => {
                    // $('#detailProductCategory').text(response.data.ctg_name);

                    $('#detailProductName').text(response.data.p_name);
                    $('#detailProductDescription').text(response.data.p_description);
                    $("#detailListProductImage").attr("src", pathFile.concat(response.data.p_image));
                    $('#detailProduct').modal();
                }).catch(err => {

                })
            });

            $(document).on('click', '.btn-edit-product', function(e) {
                e.preventDefault();
                const productId = parseInt($(this).data("id"));
                activeId = productId;
                console.log(productId);
                Utils.api("get_product_edit", {
                    id: productId
                }).then(response => {
                    $('#editProductId').val(response.data.p_id)
                    $('#editProductName').val(response.data.p_name);
                    $('#editProductQuantity').val(response.data.p_quantity);
                    $("#editProductFresh").val(response.data.p_fresh);
                    $('#editProductPrice').val(response.data.p_price);
                    $('#editProduct').modal();
                }).catch(err => {

                });
            });




        })
    </script>
</body>

</html>

<?php
if (isset($_POST["updateProduct"])) {
    $fileCheck = '';
    $id = $_POST['editProductId'];
    $fileCheck = $_FILES["editProductImage"]["name"];

    $editProductName = $_POST['editProductName'];
    $editProductQuantity = $_POST['editProductQuantity'];
    $editProductPrice = $_POST['editProductPrice'];
    if (!empty($fileCheck)) {
        $tm = md5(time());
        $statusMsg = '';
        $uploadPath = "./image_products/";
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $fileName =  $tm . basename($_FILES["editProductImage"]["name"]);

        $targetFilePath = $uploadPath . $fileName;
        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (!empty($fileName)) {
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array(strtolower($fileType), $allowTypes)) {
                if (move_uploaded_file($_FILES["editProductImage"]["tmp_name"], $targetFilePath)) {

                    $productUpdateTime = $timeInVietNam;
                    $stmt = $link->prepare("UPDATE `products` SET `p_name`=?,`p_quantity`=?,`p_price`=?,`p_image`=?,`p_date_update`=? WHERE `p_id`=?");
                    $stmt->bind_param("sssssi", $editProductName, $editProductQuantity, $editProductPrice, $fileName,  $productUpdateTime, $id);
                    if ($stmt->execute()) {
?>
                        <script>
                            swal("Notice", "Record updated successfully", "success").then(function(e) {
                                window.location.replace("./manage_products.php?idctg=<?= $idCtg ?>");
                            });
                        </script>
                    <?php

                    } else {
                    ?>
                        <script>
                            alert("Error try again.!")
                        </script>
                <?php
                    }
                }
            } else {
                ?>
                <script>
                    alert("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.!")
                </script>
            <?php

            }
        } else {

            ?>
            <script>
                alert("Please select a file to upload.!")
            </script>
        <?php
        }
    } else {
        $productUpdateTime = $timeInVietNam;
        $stmt = $link->prepare("UPDATE `products` SET `p_name`=?,`p_quantity`=?,`p_fresh`=?,`p_price`=?,`p_date_update`=? WHERE `p_id`=?");
        $stmt->bind_param("sssssi", $editProductName, $editProductQuantity, $editProductFresh, $editProductPrice,  $productUpdateTime, $id);
        if ($stmt->execute()) {
        ?>
            <script>
                swal("Notice", "Record updated successfully", "success").then(function(e) {
                    window.location.replace("./view_product_in_categories.php?idsh=<?= $shopId ?>&idctg=<?= $idCtg ?>");
                });
            </script>
        <?php

        } else {
        ?>
            <script>
                alert("Error try again.!")
            </script>
<?php
        }
    }
}

?>


<?php

if (isset($_POST["addProduct"])) {

    $count = 0;
    $resultP = $link->query("SELECT * from products where p_name ='$_POST[nameProduct]'");
    $count = mysqli_num_rows($resultP);

    if ($count > 0) {
?>
        <script type="text/javascript">
            alert("Product exits !");
            window.location.replace("./manage_products.php?idctg=<?= $idCtg ?>");
        </script>
    <?php
    } else {

        // File upload configuration 
        $tm = md5(time());
        $statusMsg = '';
        $uploadPath = "./image_products/";
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $fileName =  $tm . basename($_FILES['imageProduct']['name']);
        $targetFilePath = $uploadPath . $fileName;
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (!empty($fileName)) {

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["imageProduct"]["tmp_name"], $targetFilePath)) {
                    $addProduct = $link->query("INSERT INTO `products` (`p_id`, `category_id`,  `p_name`, `p_description`,  `p_quantity`, `p_price`, `p_image`,  `p_date_create`) VALUES (NULL,'$idCtg','$_POST[nameProduct]','$_POST[descriptionProduct]','$_POST[quantityProduct]','$_POST[priceProduct]','$fileName','" . $timeInVietNam . "')");
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        } else {
            $statusMsg = 'Please select a file to upload.';
        }



        // File upload configuration 
        $tm = md5(time());
        $uploadPathImgLib = "./image_library/";

        if (!is_dir($uploadPathImgLib)) {
            mkdir($uploadPathImgLib, 0777, true);
        }

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';

        $fileNames = array_filter($_FILES['imageProductLibrary']['name']);
        if (!empty($fileNames)) {
            foreach ($_FILES['imageProductLibrary']['name'] as $key => $val) {
                // File upload path 
                $fileName =  $tm . basename($_FILES['imageProductLibrary']['name'][$key]);
                $targetFilePath = $uploadPathImgLib . $fileName;

                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["imageProductLibrary"]["tmp_name"][$key], $targetFilePath)) {
                        // Image db insert sql 

                        $insertId = $link->insert_id;
                        $insertValuesSQL .= "(NULL,'$insertId', '" . $fileName . "')";
                        // $insertValuesSQL .= "('" . $fileName . "', NOW()),";
                        // var_dump($insertValuesSQL);

                        if ($key != count($_FILES["imageProductLibrary"]["tmp_name"]) - 1) {
                            $insertValuesSQL .=  ",";
                        }
                        // var_dump(count($_FILES) - 1);
                        // var_dump($key);
                    } else {
                        $errorUpload .= $_FILES['imageProductLibrary']['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['imageProductLibrary']['name'][$key] . ' | ';
                }
            }

            if (!empty($insertValuesSQL)) {
                // $insertValuesSQL = trim($insertValuesSQL, ',');
                // Insert image file name into database 
                $insertImg = $link->query("INSERT INTO `image_details` (`img_id`, `img_product_id`, `img_name`) VALUES $insertValuesSQL");
                if ($insertImg) {
                    $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                    $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                    $statusMsg = "Files are uploaded successfully." . $errorMsg;
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $statusMsg = 'Please select a file to upload.';
        }
    }
    if ($addProduct == true && $insertImg  == true) {
    ?>
        <script type="text/javascript">
            alert("add product success !");
            window.location.replace("./manage_products.php?idctg=<?= $idCtg ?>");
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("error !");
            window.location.replace("./manage_products.php?idctg=<?= $idCtg ?>");
        </script>
<?php
    }
}

?>