<?php
session_start();
if(!isset ($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] !== TRUE){
    $_SESSION['message'] = 'Please login first.';
    header('location:index.php');
}else{
    include_once 'connect.php';
    $user_id = $_SESSION['user_id'];
    $note_id = isset ($_POST['title'])? mysql_real_escape_string($_POST['title']):"";
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
   $Query = mysql_query("UPDATE `tbl_note` SET `note_title` = '$note_title', `note_desc` = '$note_desc', `file_attach` = '$fle_name', `note_cat_id` = '$note_cat' WHERE `note_id`='$note_id' ");
   if($Query){
       $_SESSION['message'] = 'updated';
       header('location:manage-notes.php');
   }else{
       $_SESSION['message'] = 'error';
       header('location:manage-notes.php');
   }
}
?>