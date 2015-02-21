<?php
include_once 'connect.php';
$name = isset($_POST['name'])?mysql_real_escape_string($_POST['name']):'';
$email = isset($_POST['email'])?mysql_real_escape_string($_POST['email']):'';
$mobile = isset($_POST['mobile'])?mysql_real_escape_string($_POST['mobile']):'';
$dob = isset($_POST['dob'])?mysql_real_escape_string($_POST['dob']):'';
$password = isset($_POST['password'])?mysql_real_escape_string($_POST['password']):'';

$dob = date('Y-m-d', strtotime($dob) );
$dat_join = date('Y-m-d H:i:s');
$Query = mysql_query("INSERT INTO `tbl_user`(`full_name`,`email_id`,`mobile_num`,`dob`,`password`, `date_join`) VALUES('$name', '$email', '$mobile', '$dob', '$password', '$dat_join'); ");
if($Query){
    echo 'Registered';
}else{
    echo mysql_error();
}