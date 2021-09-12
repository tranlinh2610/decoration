<?php
$current = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh'));
$timeInVietNam = $current->format('Y-m-d H:i:s');
$username =  "root";
$password = "";
$database = "decoration_shop";
$server = "localhost";
$link = mysqli_connect($server, $username, $password, $database);
if (!$link)
    die("Connection Failed: " . mysqli_connect_errno());
?>
<?php
?>