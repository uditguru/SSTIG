<?php
session_start();
if (isset($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] == TRUE) {
    $cat = isset ($_POST['cat_name'])? mysql_real_escape_string($_POST['cat_name']):"";
    if($cat == ""){
        $_SESSION['message'] = 'Please enter category name';
        header('location:manage-category.php');
    }else{
        include_once 'connect.php';
        $Query = mysql_query("INSERT INTO `tbl_category`(`cat_title`) VALUES('$cat');") or die(mysql_error());
        if($Query){
            $_SESSION['message'] = 'added';
            header('location:manage-category.php');
        }else{
            $_SESSION['message'] = 'Error occured please try again.';
            header('location:manage-category.php');
        }
    }
} else {
    $_SESSION['message'] = 'Please login first.';
    header('location:index.php');
}