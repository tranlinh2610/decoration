<?php
$idCtg = $_GET["idc"];
$id = $_GET["id"];
$queryDetail = $link->query("SELECT c.ctg_name, c.ctg_image, p.* from products as p INNER JOIN categories c ON c.ctg_id = p.category_id WHERE p.p_id = $id AND c.ctg_id = $idCtg");
$rowDetail = mysqli_fetch_array($queryDetail, MYSQLI_ASSOC);

$queryImage = $link->query("SELECT * FROM image_detail Where `img_product_id` = $id");

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<link rel="stylesheet" href="./css/detail.css">
<div class="detail-infor">
    <div class="infor">
        <div id="breadcrumb-product-details">Product in <i class="mdi mdi-chevron-right mdi-14px "></i><?php echo "<span>" . $rowDetail["ctg_name"] . "</span>" ?></a></i>
        </div>

        <form action="../cart/cart.php?view=add_to_cart" class="buy-form" method="post" enctype="multipart/form-data">
            <div class="row m-t-20">
                <div class="col-md-6 col-lg-6 " style="text-align: center;">
                    <div class="row-lg-5 row-md-5 row-5 list-imglist">
                        <div class="avatar-product">
                            <a href="../admin/image_products/<?php echo $rowDetail['p_image'] ?>" data-fancybox="avatar-product">
                                <img src="../admin/image_products/<?php echo $rowDetail['p_image'] ?>" id="img-infor" class="img-fluid img-thumbnail ">
                            </a>
                        </div>
                        <div class="img-library">
                            <div class="list-img-library">
                                <div class="show-image-library">
                                    <div id="arrowL-Img">
                                        <i class="mdi mdi-chevron-left mdi:24px" aria-hidden="true" id="arrow-button"></i>
                                    </div>
                                    <div id="arrowR-Img">
                                        <i class="mdi mdi-chevron-right mdi:24px" aria-hidden="true" id="arrow-button"></i>
                                    </div>
                                    <div class="list">
                                        <div class="list-group list-group-horizontal col-lg-9" id="view-list-libImg">
                                            <div class="galleryProduct d-flex">
                                                <?php
                                                if ($queryImage->num_rows > 0) {
                                                    while ($row = $queryImage->fetch_assoc()) {
                                                        $imageURL = '../admin/image_library/' . $row["img_name"];
                                                ?>

                                                        <div class="card" style="background: none;">
                                                            <a href="<?= $imageURL ?>" data-fancybox="galleryProduct">
                                                                <img src="<?php echo $imageURL; ?>" alt="" class="img-fluid " style="max-width: 100%;" height="100px" id="img-view-details" />
                                                            </a>
                                                        </div> <?php }
                                                        } else { ?>
                                                    <p>No image(s) found...</p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="name-product">
                        <h4>Seafood Information</h4>
                    </div>
                    <div class="card-body justify-content-around rounded d-flex">

                        <div>
                            <p class="text-muted text-overline m-0">Total Rating star</p>
                            <div>
                                <?php
                                if ($queryRating->num_rows > 0) {
                                    $star =  $viewTotalRate;
                                    for ($i = 0; $i < 5; $i++) {
                                        $output = '<img class="star m-b-20" />';
                                        if ($i >=  $star) {
                                            $output = '<img class="starNull m-b-20" />';
                                        }
                                        echo  $output;
                                    }
                                } else {
                                ?>
                                    <small>No rater rating this product</small>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted text-overline m-0">Total user feedback</p>
                            <small><?= $totalUser ?></small>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td class="td-name">Product Categories :</td>
                                <td width="70%"><?= (!empty($line_food['ctg_name']) ? $line_food['ctg_name'] : "Null")  ?></td>
                            </tr>
                            <tr>
                                <td class="td-name">Product Name :</td>
                                <td width="70%"><?= (!empty($line_food['p_name']) ? $line_food['p_name'] : "Null")  ?></td>
                            </tr>

                            <tr>
                                <td class="td-name">Product Price :</td>
                                <td class="td-name-infor"><?= (!empty($line_food['p_price']) ? number_format($line_food['p_price'], 0, ",", ".") . ' VNĐ' : "Null")  ?></td>
                            </tr>
                            <tr>
                                <td class="td-name">Product Fresh :</td>
                                <td class="td-name-infor"><?= (!empty($line_food['p_fresh']) ? $line_food['p_fresh'] : "Null") ?>/10</td>
                            </tr>

                            <tr>
                                <td class="td-name">Product Count :</td>
                                <td>
                                    <div class="input-group" id="quantity-product">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-outline-danger btn-number" data-type="minus" data-field="quantity[<?= $line_food['p_id'] ?>]">
                                                <span><i class="fas fa-minus"></i></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quantity[<?= $line_food['p_id'] ?>]" class="form-control input-number" value="1" min="1" max="<?= $line_food['p_quantity'] ?>">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-outline-warning btn-number" data-type="plus" data-field="quantity[<?= $line_food['p_id'] ?>]">
                                                <span><i class="fas fa-plus"></i></span>
                                            </button>
                                        </span>
                                        <span>Số lượng sẵn có <?php echo $line_food['p_quantity'] ?>Kg</span>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    if ($line_food['p_quantity'] > 0) {
                    ?>
                        <div class="Buying">

                            <input onclick="chatToShop(<?= $shopUserId ?>)" name="chat" value="Chat" class="btn btn-outline-info" style="margin-right: 25px;" role="button">

                            </input>
                            <!-- <a href="" class="btn btn-info  btn-show-shop-chat" role="button" data-id="<?= $shopUserId ?>"><i class="mdi mdi-chat"></i> </a> -->
                            <!-- <div class="verticalLine">
                            </div> -->
                            <!-- <input type="submit" name="buyProduct" class="btn btn-outline-danger " onclick="orderNow()" id="btn-danger-now" value="Order Now"> -->
                            <div class="verticalLine">
                            </div>
                            <input type="submit" name="buyProduct" class="btn btn-danger " id="btn-danger" value="Add To Cart">
                        </div>

                    <?php
                    } else {
                    ?>
                        <strong class="alert alert-danger">Sold Out</strong>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="modal fade" id="chatToShop" tabindex="-1" role="dialog" aria-labelledby="chatToShop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatToShop">Chat with shop <?= $shopChat['shop_name'] ?></h5>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <section class="chat-area">
                            <header>
                                <a href="./index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                                <img src="" alt="" id="chatToShopAvatar">
                                <div class="details">
                                    <span id="chatToShopName"></span>
                                    <p id="chatToShopStatus"></p>
                                </div>
                            </header>
                            <div class="chat-box">

                            </div>
                            <form action="#" class="typing-area">
                                <input type="hidden" class="incoming_id" name="incoming_id" id="chatToShopId" value="<?= $shopUserId ?>">
                                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                                <button><i class="fab fa-telegram-plane"></i></button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="infor">

        <div id="breadcrumb-product-details">Detail of seafood <i class="mdi mdi-chevron-right mdi-14px "></i> <?php echo "<span>" . $line_food["p_name"] . "</span>" ?></a></i>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card m-b-30 m-t-30">
                <div class="product-description">
                    <p>Seafood name:
                        <?= $line_food['p_description'] ?>
                    </p>
                    <p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>