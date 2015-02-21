<?php
include_once 'connect.php';
$email = isset($_POST['email'])?mysql_real_escape_string($_POST['email']):"";
$query = mysql_query("SELECT * FROM tbl_user WHERE `email_id`='$email'");
if(mysql_num_rows($query)==0){
    echo '1';
}else{
    echo '0';
}