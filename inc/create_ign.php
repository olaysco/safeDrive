<?php
include_once 'init.php';

if(isset($_POST['n_ign'])){
$db = new Database();
    $ign = 'MTK-'.trim($_POST['n_ign']);
    if($ign !== 'MTK-'){
    $val = $db->multipleColumn("SELECT * FROM `users` WHERE `IGN`  LIKE ?", array($ign));
    //var_dump($val);
    if(empty($val)){
    $rc = $db->insert('INSERT INTO users (IGN)   VALUES (?)',array($ign) );
    if($rc > 0){
        echo '<h3> '.$ign.' successfully created</h3>';
    }
    }else{
        echo '<h3> '.$ign.' exists in Database</h3>';
    }}else{
        echo '<h3> '.$ign.' Invalid input</h3>';
    }
}else{
    header('location: home.php');
}
?>