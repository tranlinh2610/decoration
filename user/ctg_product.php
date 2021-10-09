<?php
if ($_GET["view"] == "ctg") {

    $idc = $_GET["idc"];
    $resultProCtg = $link->query("SELECT * from products where category_id = '$idc'");
    $resultCtg = $link->query("SELECT ctg_name from categories where ctg_id = '$idc'");
    $rowCtg = mysqli_fetch_assoc($resultCtg);
}

if ($_GET["view"] == "search") {
    $txtSearch = $_POST["searchText"];
    //  var_dump($txtSearch);
    $resultProCtg = $link->query("SELECT * from products where p_name like '%{$txtSearch}%'");
    //  var_dump($resultProCtg);
}
?>

<style>
    .list-all-product {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        border-radius: 10px;
        background-color: #f8f9f9 !important;
    }

    @media screen and (max-width: 800px) {
        .list-all-product {
            flex-direction: column;
            width: 100%;
            border-radius: 10px;
            border: 1px solid #c3c3c3;
        }
    }

    #card-product {
        padding: 10px;
        margin: 10px;
        margin-left: 15px;
        width: 230px;
        text-align: center;
        box-shadow: 5px 4px 8px #888888;

    }

    @media(max-width: 800px) {
        #card-product {
            flex-direction: column;
            width: 93%;
        }
    }

    #btn-buy {

        background-color: #FBAB7E;
        background-image: linear-gradient(62deg, #99afc3 0%, #f38282 100%);
        border-radius: 10px;
        color: whitesmoke;
    }
</style>
<div class="container-fluid result-search">
    <div id="title-categories">
        <p style="background: #F3DBCF !important;
    padding: 10px;
    font-weight: bold;
    font-size: 18px;
    border-radius: 15px 30px 30px 5px;
    color: #100f0f">


            <?php
            if ($_GET["view"] == "search") {
            ?>
                Product by search
            <?php
            }
            if ($_GET["view"] == "ctg") {
            ?>
                Product in <?= $rowCtg["ctg_name"] ?>
            <?php
            }
            ?>
        </p>
    </div>
    <div class="list-all-product flex-container">
        <?php
        while ($productInfor = mysqli_fetch_array($resultProCtg, MYSQLI_ASSOC)) {
        ?>
            <div class="card align-items-center" id="card-product">
                <a href="index.php?view=detail&id=<?= $productInfor['p_id'] ?>&idc=<?= $productInfor['p_category_id'] ?>" style="text-decoration:none">
                    <div class="card-header-product">
                        <img src="../admin/image_products/<?= $productInfor['p_image'] ?>" class="rounded card-img-top " height="175" width="175" alt="product...">
                    </div>
                    <div class="card-body">
                        <p><?= $productInfor['p_name'] ?></p>
                        <p style="color: red; font-size: 14px;">
                            <?= number_format($productInfor['p_price'], 0, ",", ".")  ?> VNĐ
                        </p>

                    </div>
                </a>
                <div class="card-footer-product">
                    <form action="./my_cart.php?view=add_case" class="buy-now-form" method="post" enctype="multipart/form-data">
                        <input type="text" value="1" name="quantity[<?= $productInfor['p_id'] ?>]" hidden="true">
                        <input type="submit" class="btn" id="btn-buy" value="Buy Now">
                    </form>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>