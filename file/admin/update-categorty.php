<?php
session_start();
if(isset ($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] == TRUE){
    include 'connect.php';
    $id = isset($_POST['cat_id'])?mysql_real_escape_string($_GET['cat_id']):"";
    $title = isset($_POST['cat_name'])?mysql_real_escape_string($_GET['cat_name']):"";
    $Query = mysql_query("UPDATE `tbl_category` SET `cat_title`='$title'  WHERE `cat_id`='$id';") or die(mysql_error());
    $_SESSION['message'] = 'updated';
    header('location:manage-category.php');
}else{
     header('location:index.php');
}