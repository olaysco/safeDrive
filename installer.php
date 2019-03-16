<?php
$mysql = mysqli_connect("localhost", "root", "");
$check = false;
if(mysqli_select_db($mysql , 'safedrive')){
    $check = true;
}else{
    $check = false;
	
}


if(isset($_POST['Install'])){
	//echo 'button clicked';
	if(mysqli_query($mysql,'CREATE DATABASE safedrive')=== TRUE){
		
	   $file ='safedrive.sql';
	   mysqli_select_db($mysql,'safedrive');
	   if ($sql = file($file)) {
	   $query = '';
	   foreach($sql as $line) {
		$tsl = trim($line);
	   if (($sql != '') && (substr($tsl, 0, 2) != "--") && (substr($tsl, 0, 1) != '#')) {
	   $query .= $line;
	   	if(preg_match('/;\s*$/',$line)){
		   if(!mysqli_query($mysql,$query)){
		   	//echo mysqli_error($mysql);
		   }$query='';
	  	 }
	   }
	   }
	   }
	 
	
	//echo 'db_created';
	$check = true;
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application Installer</title>
<style>
body div:first-child{
	width:300px;
	height:300px;
	/*background-color:rgba(68,68,68,1);*/
	margin:auto;
	margin-top:20%;
}
div input[type="submit"]{
	margin-left:50px;
	border:none;
	width:180px;
	height:40px;
	color:#ffffff;
	font-weight:bolder;
	cursor:pointer;
	box-shadow:rgba(187,187,187,1) 8px 8px 2px ;
	border-radius:4px;
}
.in:hover{
	background-color:rgba(76,217,100,0.7);
}
.out{
	background-color:rgba(34,34,34,1);
}
.in{
	background-color:#4bd864;
}
</style>
</head>

<body>
<div>
<form action="installer.php" name="install_form" method="post">
<?php
if($check)
echo '<input type="submit" value="Installation completed" class="out" disabled="disabled"/>';
else
echo '<input type="submit" value="Install" name="Install" class="in" />';
?>
</form>
</div>
</body>
</html>
