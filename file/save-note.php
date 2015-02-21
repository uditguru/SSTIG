<?php
session_start();
if(!isset ($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] !== TRUE){
    $_SESSION['message'] = 'Please login first.';
    header('location:index.php');
}else{
    include_once 'connect.php';
    $user_id = $_SESSION['user_id'];
    $note_title = isset ($_POST['title'])? mysql_real_escape_string($_POST['title']):"";
    $note_desc = isset ($_POST['text_desc'])? mysql_real_escape_string($_POST['text_desc']):"";
    $note_cat = isset ($_POST['category'])? mysql_real_escape_string($_POST['category']):"";
    $date = date("Y-m-d H:i:s");
    
    //File Upload
    if(isset ($_FILES['attach']['name']) && $_FILES['attach']['name']!="") {
        $tem_name = explode('.', $_FILES['attach']['name']);
        $ext = end($tem_name);
        $new_name = str_replace(array(' ', '<', '>', '&', '{', '}', '*'), array('_'), $note_title).'-'.rand().'.'.$ext;
        $fle_name = $new_name;
        move_uploaded_file($_FILES['attach']['tmp_name'], 'uploads/'.$fle_name);
    }else{
        $fle_name="";
    }
   $Query = mysql_query("INSERT INTO `tbl_note`(`user_id`,`note_title`,`note_desc`,`file_attach`,`note_dateAdded` ,`note_cat_id`) VALUES('$user_id','$note_title','$note_desc','$fle_name','$date','$note_cat')");
   if($Query){
       $_SESSION['message'] = 'added';
       header('location:manage-notes.php');
   }else{
       $_SESSION['message'] = 'error';
       header('location:manage-notes.php');
   }
}
?>