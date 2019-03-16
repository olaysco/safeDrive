<?php
include_once 'init.php';
var_dump($_POST['register']);
if(isset($_POST['register'])){
    if((trim($_POST['full_name']) != "") &&(trim($_POST['pass']) != "") &&(trim($_POST['dept']) != "") &&(trim($_POST['ign']) != "") &&(trim($_POST['mail']) != "")    ){
    $db = new Database();
    $ign = trim($_POST['ign']);
    
    $val = $db->multipleColumn("SELECT * FROM `users` WHERE `IGN`  LIKE ? AND `full_name` IS NULL", array($ign));
    //var_dump($val);
    if(!empty($val)){
        $rc = $db->insert('UPDATE `users` SET `full_name` = ?,`password` = ?, `email` = ?, `department` = ? WHERE `IGN` = ?',array( trim($_POST['full_name']), trim($_POST['pass']), trim($_POST['mail']) ,trim($_POST['dept']), trim($_POST['ign']) ));
        if($rc > 0){
            header('location:../index.php?msg=reg_success');
        }
    }else{
        header('location:../index.php?msg=reg_fail');
    }
    }else{
        header('location:../index.php?msg=reg_fail');
    }
}
else{
    header('location:../index.php?msg=reg_fail');
}
?>