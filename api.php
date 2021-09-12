<?php
header('Content-Type: application/json');
include "./config.php";
$response = array();
$data = [];
$msg = "";
$error = 0;
$action = @$_POST['action'];


// check login and password

if ($isLoggedIn) {
    switch ($action) {
        case "delete_categories_info":
            $id = $_POST['id'];
            $query = $link->query("DELETE FROM `categories` WHERE `ctg_id` = '$id'");
            if ($query) {
                $msg = "Record deleted successfully";
            } else {
                $error = 400;
                $msg = "Error delete record: " . $link->error;
            }
            break;

        case "get_categories_info":
            $id = $_POST['id'];
            $query = $link->query("SELECT * FROM `categories` WHERE `ctg_id` = $id");
            if ($query->num_rows == 0) {
                $error = 1;
                $msg = "This file is not available.";
            } else {
                $data = $query->fetch_assoc();
            }
            break;

        case "update_categories_info":
            $id = $_POST['id'];
            $category = $_POST['editCategory'];
            $ctgDescription = $_POST['editCtgDescription'];
            $ctgStatus = $_POST['editCtgStatus'];
            if (isset($_POST['editCtgImage'])) {
                $ctgImage = $_POST['editCtgImage'];
            } else {
                $ctgImage =  $_POST['editCtgImageNotchange'];
            }


            $ctgTimeUpdate = $timeInVietNam;
            $stmt = $link->prepare("UPDATE `categories` SET `ctg_name`=?,`ctg_image`=?,`ctg_description`=?,`ctg_status`=?,`ctg_update_time`=? WHERE `ctg_id`=?");
            $stmt->bind_param("sssssi", $category, $ctgImage, $ctgDescription, $ctgStatus, $ctgTimeUpdate, $id);
            if ($stmt->execute()) {
                $msg = "Record updated successfully";
            } else {
                $error = 400;
                $msg = "Error delete record: " . $link->error;
            }

            break;
        case "get_product_info_detail":
            $id = $_POST['id'];
            $query = $link->query("SELECT products.* from products WHERE `p_id` = '$id'");
            if ($query->num_rows == 0) {
                $error = 1;
                $msg = "This file is not available.";
            } else {
                $data[] = $query->fetch_array();
            }
            break;

        case "get_product_detail":
            $id = $_POST['id'];
            // $query = $link->query("SELECT products.p_name, products.p_description, image_library.* from products INNER JOIN image_library ON image_library.img_p_id = products.p_id WHERE `p_id` = '$id'");
            $query = $link->query("SELECT products.* from products WHERE `p_id` = '$id'");
            if ($query->num_rows == 0) {
                $error = 1;
                $msg = "This file is not available.";
            } else {

                $data = $query->fetch_array();
            }
            break;

        case "get_product_edit":
            $id = $_POST['id'];
            // $query = $link->query("SELECT products.p_name, products.p_description, image_library.* from products INNER JOIN image_library ON image_library.img_p_id = products.p_id WHERE `p_id` = '$id'");
            $query = $link->query("SELECT products.* from products WHERE `p_id` = '$id'");
            if ($query->num_rows == 0) {
                $error = 1;
                $msg = "This file is not available.";
            } else {

                $data = $query->fetch_assoc();
            }
            break;
    }
}



$response["msg"] = $msg;
$response["error"] = $error;
$response["data"] = $data;

echo json_encode($response);
