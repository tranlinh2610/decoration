<?php
session_start();
include "../connect_db.php";
$resultCtg = $link->query("SELECT * from categories");
$resultPro = $link->query("SELECT * from products");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="web.css"> -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/Footer.css">

    <style>
        .bg-index {
            background-color: #F3DBCF !important;
            /* background-image: url('../image/bg_header.jpg'); */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .btn-user {
            border-color: #F3DBCF !important;
            color: #100f0f;
        }

        .btn-user:hover {
            background-color: #f38282;
        }

        .btn-search {
            color: #100f0f;
            background: #F3DBCF;
            border-color: #F38282;
            height: 35px;
            line-height: 10px;
        }

        .text-brand {
            font-family: 'Sacramento', cursive;
            color: #000000;
            font-size: 40px;
            line-height: 30px;
            text-decoration: none !important;
            display: inline-block;
        }

        .bg-button {
            background-image: linear-gradient(62deg, #99afc3 0%, #f38282 100%);
        }

        @media screen and (min-width: 780px) {
            #search-bar {
                width: 680px;
            }
        }

        .adv-shop {
            margin-top: 172px;
        }

        .list-ctg {
            margin-left: 40px !important;
            width: 100%;
            list-style-type: none;
            display: table;
            margin: 0;
            padding: 0;
        }

        .list-ctg>li {
            text-align: center;
            padding: 10px;
            display: table-cell;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php
    include "./content.php";
    include "./footer.php";

    ?>


</body>


</html>
<?php
?>