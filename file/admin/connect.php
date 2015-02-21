<?php
$con = mysql_connect('localhost','root','');
$db_link = mysql_select_db('file_share');

//
function highLight($name=""){
    if($name==basename($_SERVER['PHP_SELF'])){
        return 'current';
    }else{
        return 'select';
    }
}