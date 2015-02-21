<?php
session_start();
if(isset ($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] == TRUE){
    include 'connect.php';
    $id = isset($_GET['id'])?mysql_real_escape_string($_GET['id']):"";
    $Query = mysql_query("DELETE FROM `tbl_note` WHERE `note_id`='$id';") or die(mysql_error());
    $_SESSION['message'] = 'deleted';
    header('location:manage-notes.php');
}else{
     header('location:index.php');
}