<?php

include 'init.php';
session_start();
if (isset($_GET['result'])){
    
    
$db = new Database();

function updateMarkSheet($array,$col){
    global $db;
        $args = [
         'value' => FILTER_SANITIZE_NUMBER_INT,
         'sheet_id' => FILTER_SANITIZE_NUMBER_INT];
        $fArray = filter_var_array($array, $args);
        foreach($fArray as $key=>$val){
            $error = ($val == '' || $val == NULL)?false:true;
        }
        //var_dump($fArray,$error);
        if($error){
        
            $affected = $db->insert('UPDATE resultcal.mark_sheet SET '.$col.' = ? WHERE mark_sheet.sheet_id = ?',$fArray);
           
        }
        else{
            
        }
        return $affected;
    }
    
	$column = $_GET['column'];
	$id = $_GET['id'];
	$newValue = $_GET['newValue'];
	
        $af =  updateMarkSheet(['value'=>$newValue,'sheet_id'=>$id],$column);
	
	if($af >0){
	$response['success'] = true;	
	$response['value'] = $newValue;
	}
	else{
	$response['success'] = false;
	$response['error'] = "failed";
	}
	
	echo json_encode($response);

}


?>


<?php
if (isset($_GET['charts'])){
$uid = (isset($_SESSION['u_id']))?$_SESSION['u_id']:0;
    class PerformanceChart extends ChartClass{
    
    
}


$com = new PerformanceChart();

$com->getClass($uid);
$counted = $com->studentCounter();
$sub_names = array_column($com->subjectNames,0);
$data = [];
for($j=0; $j<count($counted); $j++){
//   array_push($data, ['data'=>['a'],'label'=>[$counted[$j]]]);
    $data[] = ['label'=>$sub_names[$j], 'data'=>$counted[$j]];
}
echo json_encode($data);





}
?>