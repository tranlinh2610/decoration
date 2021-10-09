<?php
if (isset($_GET['view'])) {
    $t = $_GET['view'];
} else {
    $t = '';
}
if ($t == 'detail') {
?>
    <div class="fixed-top">
        <?php
        // include "./header.php";
        include "./search.php";
        ?>
    </div>
<?php
    include('decoration_detail.php');
} elseif ($t == 'profile') {
    include('profile.php');
} elseif ($t == 'search') {
?>
    <div class="fixed-top">
        <?php
        include "./header.php";
        include "./search.php";
        ?>
    </div>
    <div style="margin-top:200px">
        <?php
        include "./categories.php";
        ?>
    </div>
    <div>
        <?php
        include "./ctg_product.php";
        ?>
    </div>
<?php
} elseif ($t == 'ctg') {

?>
    <div class="fixed-top">
        <?php
        include "./header.php";
        include "./search.php";
        ?>
    </div>
    <div style="margin-top:200px">
        <?php
        include "./categories.php";
        ?>
    </div>
    <div>
        <?php
        include "./ctg_product.php";
        ?>
    </div>
<?php
} else {

?>
    <div class="fixed-top">
        <?php
        include "./header.php";
        include "./search.php";
        ?>
    </div>
    <div class="adv-shop">
        <?php
        include "./adv.php";
        ?>
    </div>
    <div>
        <?php
        include "./categories.php";
        ?>
    </div>
    <div>
        <?php
        include "./all_product.php";
        ?>
    </div>
<?php
}
