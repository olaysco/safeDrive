<?php
session_start();
include_once 'init.php';

if(!isset($_SESSION['ign']) ){
    header('location:index.php');
}
else{
    $uid = $_SESSION['ign'];
}
$uploadOk = 1;
$str = '';
// Check if image file is a actual image or fake image
if(empty($_REQUEST)){
    echo 'an error occured, ensure file size is less than 3mb';
}else{
if(isset($_POST["submit"]) || isset($_POST["type"])) {
    $target_dir = $_POST['folder'].'/';
    
    $target_file = $target_dir . basename($_FILES["fileUp"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $str = strtolower(pathinfo($target_file,PATHINFO_FILENAME)).".".$fileType;
    //$check = getimagesize($_FILES["file"]["tmp_name"]);
}
// Check if file already exists
if (file_exists($target_file)) {
    $i =0;
    $main = strtolower(pathinfo($target_file,PATHINFO_FILENAME));
   while(file_exists($target_file)){
        $i++;
        $str = $main."-".$i.".".$fileType;
        $target_file = $target_dir . $str;
    }
    
}
/* Check file size*/
if ($_FILES["fileUp"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
} 

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileUp"]["tmp_name"], $target_file)) {
        
        echo "The file ". basename( $str). " has been uploaded.";
        encrypt_file($target_file, $target_file, $_POST['prikey']);
        register_in_database($str, $_FILES["fileUp"]["size"],$_POST['folder'],$fileType, $_POST['user_id'],$_POST['prikey']);
       } 
       else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
function register_in_database($file_name, $file_size, $folder_id, $file_type, $user_id, $pri_key){
    $rFields = [];
    $rFields[] = $file_name;
    $rFields[] = $file_size;
    $rFields[] = $user_id;
    $rFields[] = $folder_id;
    $rFields[] = $file_type;
    $rFields[] = $pri_key;
    $db = new Database();
    $rc = $db->insert('INSERT INTO files (file_name, file_size, file_uploader_id, folder_id, file_type, file_pri_key)   VALUES (?, ?,?, ?, ?,?)',$rFields );
    if($rc){
        echo "file successfully uploaded";
        if (isset($_POST["submit"])){
            header('location:home.php');
        }
        
    }
}


function encrypt_file($source,$destination,$passphrase,$stream=NULL) {
	// $source can be a local file...
	if($stream) {
		$contents = $source;
	// OR $source can be a stream if the third argument ($stream flag) exists.
	}else{
		$handle = fopen($source, "rb");
		$contents = fread($handle, filesize($source));
		fclose($handle);
	}
 
	$iv = substr(md5("\x1B\x3C\x58".$passphrase, true), 0, 8);
	$key = substr(md5("\x2D\xFC\xD8".$passphrase, true) . md5("\x2D\xFC\xD9".$passphrase, true), 0, 24);
	$opts = array('iv'=>$iv, 'key'=>$key);
	$fp = fopen($destination, 'wb') or die("Could not open file for writing.");
	stream_filter_append($fp, 'mcrypt.tripledes', STREAM_FILTER_WRITE, $opts);
	fwrite($fp, $contents) or die("Could not write to file.");
	fclose($fp);
}

function decrypt_file($file,$passphrase) {
 
	$iv = substr(md5("\x1B\x3C\x58".$passphrase, true), 0, 8);
	$key = substr(md5("\x2D\xFC\xD8".$passphrase, true) .
	md5("\x2D\xFC\xD9".$passphrase, true), 0, 24);
	$opts = array('iv'=>$iv, 'key'=>$key);
	$fp = fopen($file, 'rb');
	stream_filter_append($fp, 'mdecrypt.tripledes', STREAM_FILTER_READ, $opts);
 
	return $fp;
}


?>