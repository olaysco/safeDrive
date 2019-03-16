<?php
function decrypt_file($file,$passphrase) {
 
	$iv = substr(md5("\x1B\x3C\x58".$passphrase, true), 0, 8);
	$key = substr(md5("\x2D\xFC\xD8".$passphrase, true) .
	md5("\x2D\xFC\xD9".$passphrase, true), 0, 24);
	$opts = array('iv'=>$iv, 'key'=>$key);
	$fp = fopen($file, 'rb');
	stream_filter_append($fp, 'mdecrypt.tripledes', STREAM_FILTER_READ, $opts);
 
	return $fp;
}
$decrypted = decrypt_file($_POST['file_loc'],$_POST['poll']);
$name  = pathinfo($_POST['file_loc'],PATHINFO_BASENAME);
file_put_contents('ced/'.$name, $decrypted);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$name);
readfile('ced/'.$name);



echo 'loooo';
?>