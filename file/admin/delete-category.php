<?php
session_start();
if(isset ($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] == TRUE){
    include 'connect.php';
    $id = isset($_GET['id'])?mysql_real_escape_string($_GET['id']):"";
    $Query = mysql_query("DELETE FROM `tbl_category` WHERE `cat_id`='$id';") or die(mysql_error());
    $_SESSION['message'] = 'deleted';
    header('location:manage-category.php');
}else{
     header('location:index.php');
}