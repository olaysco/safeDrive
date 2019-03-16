<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'init.php';
$db = new Database();
var_dump($_REQUEST);
if(isset($_POST['file_name'])){
    $name = $_POST['file_name'];
    $folder_id = $_POST['folder_id'];
if(isset($_GET['perm'])){
    if($_GET['perm'] == 'res' ){
        $res = $db->fastQuery("UPDATE `files` SET `presence` = '1' WHERE `file_name` LIKE "."'".strip_tags($name)."' AND `folder_id` LIKE "."'".strip_tags($folder_id)."'");
    }
    if($_GET['perm'] == 'perm' ){
        $loc = $_POST['file_loc'];
        $res = $db->fastQuery("DELETE FROM `files` WHERE  `file_name` LIKE "."'".strip_tags($name)."'  AND `folder_id` LIKE "."'".strip_tags($folder_id)."'");
        unlink($loc);
    }
}else{
    $res = $db->fastQuery("UPDATE `files` SET `presence` = '0' WHERE `file_name` LIKE "."'".strip_tags($name)."'  AND `folder_id` LIKE "."'".strip_tags($folder_id)."'");
    
}
}else{
    
}
//header('location:../home.php');
?>
