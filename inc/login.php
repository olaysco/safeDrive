<?php

require_once("init.php");
session_start();
session_name('ign');
session_name('name');
session_name('dept_name');
session_name('dept_id');
session_name('type');

if(isset($_POST['login'])){
$db = new Database();

$user_filter = filter_input(INPUT_POST, 'l_ign', FILTER_SANITIZE_STRING);
$pass_filter = filter_input(INPUT_POST, 'l_password', FILTER_SANITIZE_STRING);

$user = ($user_filter != FALSE && $user_filter!= NULL)?$user_filter:'';

$pass = ($pass_filter != FALSE && $pass_filter!= NULL)?$pass_filter:'';



$val = $db->singleColumn("SELECT * FROM `users` WHERE `IGN` LIKE ? AND `password` LIKE ?", array($user,$pass));
$ign = $db->singleField[0]['IGN'];
$name = $db->singleField[0]['full_name'];
$dept_id = $db->singleField[0]['department'];

var_dump($db->singleField);

if($ign != NULL){
    $db = new Database();
    
    $rc = $db->insert('INSERT INTO activity (user_id, activity_title)   VALUES (?, ?)',array($ign, 'Logged Into System') );
    if($ign == "MTK-001"){
        $_SESSION['ign'] = $ign;
    $_SESSION['name'] = $name;
    $val = $db->singleColumn("SELECT * FROM `department` WHERE `id` LIKE ?" , array($dept_id));
    $dept_name = $db->singleField[0]['department_name'];
    $dept_id = $db->singleField[0]['id'];
    $_SESSION['dept_name'] = $dept_name;
    $_SESSION['dept_id'] = $dept_id;
    
    header('location:../admin.php');
    }
    else{
    $_SESSION['ign'] = $ign;
    $_SESSION['name'] = $name;
    $val = $db->singleColumn("SELECT * FROM `department` WHERE `id` LIKE ?" , array($dept_id));
    $dept_name = $db->singleField[0]['department_name'];
    $dept_id = $db->singleField[0]['id'];
    $_SESSION['dept_name'] = $dept_name;
    $_SESSION['dept_id'] = $dept_id;
    
    header('location:../home.php');
    }
}
else{
    header('location:../index.php?msg=invalid_details');
    echo 'failed';
}

}
else {
    session_destroy();
    header('location:../index.php');
   echo 'invalid';
}
?>