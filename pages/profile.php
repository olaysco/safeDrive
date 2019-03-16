<?php
$src = '';
if(!isset($_SESSION)){
session_start();
include '../inc/init.php';
$uid = $_SESSION['ign'];
}

$db = new Database();

$val = $db->singleColumn("SELECT * FROM `users` WHERE `IGN` LIKE ?", array($uid));
$ign = $db->singleField[0]['IGN'];
$name = $db->singleField[0]['full_name'];
$dept_id = $db->singleField[0]['department'];
$email = $db->singleField[0]['email'];

?>
<div class="row">
<div class="col-lg-12">
                      <h3><i class="fa fa-user fa-2x"> </i> Profile</h3>
                    <hr class="divider">
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="one-column-emphasis" summary="Profile">
                                    <colgroup>
                                        <col class="oce-first">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                             <th scope="col">Information</th>
                                            <th scope="col"></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>IGN</td><td> <?php echo $ign ?></td></tr>
                                        <tr><td>Name</td><td> <?php echo $name; ?></td></tr>
                                        <tr><td>E-mail</td><td> <?php echo $email ?></td></tr>
                                        <tr><td>Department</td><td> <?php echo get_dept_name($dept_id)?></td></tr>
                                        
                                    </tbody>
</table>
                            </div>
                            <!-- /.table-responsive -->
                        
                </div>
</div>
    
    <script>
    $('#uploadBut').hide();
</script>