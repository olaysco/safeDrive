<?php
if(!isset($_SESSION)){
session_start();
include '../inc/init.php';
$uid = $_SESSION['ign'];
$dept_id = $_SESSION['dept_id'];
}
$db = new Database();

$val = $db->multipleColumn("SELECT * FROM `users` WHERE `IGN` NOT LIKE ?", array($uid));

//var_dump($val);
function get_num_files($user_id){
    $db = new Database();
    $val = $db->singleColumn("SELECT count(`file_size`) as `file_count` FROM `files` WHERE `file_uploader_id` LIKE ? AND `presence` LIKE ?", array($user_id, 1));
    
    if($db->singleField[0]['file_count'] === NULL ||$db->singleField[0]['file_count'] == 0 ){
       return 0; 
    }else{
        return $db->singleField[0]['file_count']; 
    }
    
}
function get_used_space($user_id){
    $db = new Database();
    $val = $db->singleColumn("SELECT sum(`file_size`) as `total` FROM `files` WHERE `file_uploader_id` LIKE ? AND `presence` LIKE ?", array($user_id, 1));
   
    if($db->singleField[0]['total'] === NULL ||$db->singleField[0]['total'] == 0 ){
       return 0; 
    }else{
        return round($db->singleField[0]['total']/(1024 * 1024), 2); 
    }
    
}
?>
<div class="row">
    <input type="hidden" name="page" value="users" id="pageName">
<div class="col-lg-12">
        <h3><i class="fa fa-eye"> </i> View all Users</h3>
        <hr class="divider">
    <div class="panel-body">
        <div class="row">
            
           <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>IGN</th>
                                            <th>full name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Department</th>
                                            <th>No of Files Uploaded</th>
                                            <th>Total Used Space</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            foreach($val as $key=>$value){
                                                echo '<tr> <td>'.$value['IGN'].'</td><td>';
                                                    echo ($value['full_name'] === NULL)?"unassigned":$value['full_name'];
                                                    echo '</td><td>';
                                                        echo ($value['email'] === NULL)?"unassigned":$value['email'];
                                                        echo '</td><td>';
                                                        echo $value['password'];
                                                        echo '</td><td>';
                                                        echo ($value['department']=== NULL)?"unassigned":  get_dept_name($value['department']);
                                                        echo '</td>'. '<td>'.  get_num_files($value['IGN']).'</td><td>'.get_used_space($value['IGN']).'mb'.'</td>';
                                                
                                                
                                                
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive --> 
            
            
        </div> 
        
        <div id="outLayer">
            
        </div>
    </div>
    

        
        

</div>
</div>