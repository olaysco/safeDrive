<?php
$name  = pathinfo($_POST['file_loc'],PATHINFO_BASENAME);
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$name);
readfile($_POST['file_loc']);
exit;

?>
