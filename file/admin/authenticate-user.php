<?php
session_start();
include_once 'connect.php';
$email = isset ($_POST['u_name']) ? mysql_real_escape_string($_POST['u_name']):"";
$pass = isset ($_POST['u_pass']) ? mysql_real_escape_string($_POST['u_pass']):"";

$Query = mysql_query("SELECT * FROM `tbl_admin` WHERE `a_email`='$email' && `a_password`='$pass';");
if(mysql_num_rows($Query)>0){
    $user_detail = mysql_fetch_assoc($Query);
   $_SESSION['isLoggedin']= TRUE;
   $_SESSION['user_id']= $user_detail['a_id'];
   header('location:home.php');
}else{
    $_SESSION['message'] = 'Email id or password not matched.';
    header('location:index.php?msg=not-match');
}