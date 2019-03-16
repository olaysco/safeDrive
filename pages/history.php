<?php
if(!isset($_SESSION)){
session_start();
include '../inc/init.php';
$uid = $_SESSION['ign'];
$dept_id = $_SESSION['dept_id'];
}
$db = new Database();

$val = $db->multipleColumn("SELECT * FROM `activity` WHERE `user_id` NOT LIKE ?", array($uid));

?>

<div class="row">
    <input type="hidden" name="page" value="history" id="pageName">
<div class="col-lg-12">
        <h3><i class="fa fa-history"> </i> Users Login History</h3>
        <hr class="divider">
    <div class="panel-body">
        <div class="row">
            
            
            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>IGN</th>
                                            <th>Activity </th>
                                            <th>Day</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            foreach($val as $key=>$value){
                                                echo '<tr> <td>'.$value['user_id'].'</td><td>'.$value['activity_title'].'</td><td>'
                                                        .date("F j, Y", strtotime($value["activity_time"])).'</td><td>'.date("g:i a", strtotime($value["activity_time"])).'</td>'; 
                                                
                                                
                                                
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