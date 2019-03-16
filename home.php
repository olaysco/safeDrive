<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['ign']) ){
    header('location:index.php');
    
}
else{
    include 'inc/init.php';
    $uid = $_SESSION['ign'];
    $dept_id = $_SESSION['dept_id'];
    $dept_name = $_SESSION['dept_name'];
    $uname = (isset($_SESSION['name']))?$_SESSION['name']:'';
    include 'inc/title.php';
}

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <title>MTK Consult Drive 1.0.0</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
    <link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css"/>
    
    
    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="css/style.css" rel="stylesheet" type="text/css">
   
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php
            include 'inc/header.php';
            ?>
            <!-- /header -->

            <?php
            include 'inc/sidebar.php';
            ?>
            <!-- /side bar -->
        </nav>

        
        <div id="page-wrapper">
            <div class="row top">
                <div id="alert-container"></div>
               <!-- <div class="col-lg-12">
                    
                    <h1 class="page-header text-center"><?php //echo $page_title ?></h1>
                </div>-->
                <!-- /.col-lg-12 -->
                
            </div>
            <div id="content-div">
            <?php
            
            include ($page_include);
                        
            
            
            ?>
                <div id="outLayer"></div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
            <div id="uploadModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" id="closeUploadForm">&times;</button>
                            <h4 class="modal-title">Upload file</h4>
                        </div>
                        
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" id="uploadForm" action="inc/upload.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">                                      
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control" id="key" name="prikey" placeholder="Enter Private Key">
                                        </div>
                                    </div>
                                    <div class="form-group">                                      
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="file" name="fileUp" placeholder="select file to upload">
                                        </div>
                                    </div>
                                <input type="hidden" name="folder" value="0" id="folderName">
                                <input type="hidden" name="user_id" value="<?php echo $uid ?>" >
                                <div class="form-group">                                      
                                        <div class="col-sm-12">
                                            <input type="submit" id="btnSubmit" value="Submit" name="submit" class="btn btn-primary" style="width: 80%; margin-left: 10%"/>
                                        </div>
                                    </div>
                            </form>
                            
                            <div class="progress progress-striped">
                                <div class="progress-bar bar" id="progress">
                                    
                                </div>
                        </div>
                            <span id="targetLayer"></span>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
            </div>
                </div>
            </div>
            </div>
    
           <!--  Decrypt Modal -->     
           <a class="dropdown-toggle decrypt-modal-trigger" data-toggle="modal" data-target="#decrypt-modal" href="#"></a>
           <div id="decrypt-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Decrypt File and Download</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" id="decryptForm" action="" method="POST">
                                    <div class="form-group">                                      
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control" id="decryptKey" name="prikey" placeholder="Enter Private Key">
                                        </div>
                                    </div>
                                    <div class="form-group">                                      
                                        <div class="col-sm-12">
                                            <input type="submit" id="btnSubmit" value="Decrypt and Download" name="submit" class="btn btn-primary" style="width: 80%; margin-left: 10%"/>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">                                      
                                        <div class="col-sm-12">
                                           <i>download will start automatically if Private Key is correct</i> 
                                        </div>
                                        
                                    </div>
                            </form>    
                        </div>
                    </div>
                </div>
           </div>
           
           <!--  Delete Modal -->     
           <a class="dropdown-toggle delete-modal-trigger" data-toggle="modal" data-target="#delete-modal" href="#"></a>
           <div id="delete-modal" class="modal fade" role="dialog">
               <div class="modal-dialog" style="width:250px;">
                    <!-- Modal content -->
                    <div class="modal-content" style="width:">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete this file?</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" id="" action="" method="POST">
                                    <div class="form-group">
                                                                       
                                        <div class="col-md-6">
                                            <button class="button btn btn-success" data-dismiss="modal" id="modalClose">Cancel</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="button btn btn-danger" id="deleteFileAccept" >Delete</button>
                                        </div>
                                         
                                    </div>
                            </form>    
                        </div>
                    </div>
                </div>
           </div>
           
           <!--  Delete Permanently Modal -->     
           <a class="dropdown-toggle delete-perm-modal-trigger" data-toggle="modal" data-target="#delete-perm-modal" href="#"></a>
           <div id="delete-perm-modal" class="modal fade" role="dialog">
               <div class="modal-dialog" style="width:250px;">
                    <!-- Modal content -->
                    <div class="modal-content" style="width:">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" id="deletePermClose">&times;</button>
                            <h4 class="modal-title">Delete Permanently?</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" id="" action="" method="POST">
                                <div class="col-md-12">
                                    <p style="font-size: 1em">remove permanently</p>
                                </div>    
                                <div class="form-group">
                                        <div class="col-md-6">
                                            <button class="button btn btn-success" data-dismiss="modal" id="modalClose">Cancel</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="button btn btn-danger" id="deletePermFileAccept" >Delete</button>
                                        </div>
                                         
                                    </div>
                            </form>    
                        </div>
                    </div>
                </div>
           </div>
           
           <a id="fileResTrigger" class="hidden" href="#"></a>
    
<!--    <script src="js/flot-data.js"></script>-->

      <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    
    
    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
     <script src="js/customJS.js"></script>
     <script src="js/jspdf.min.js" type="text/javascript"></script>
     <script src="js/jquery.form.min.js" type="text/javascript"></script>
     <script src="js/jquery.contextMenu.js" type="text/javascript"></script>
     <script src="js/jquery.ui.position.min.js" type="text/javascript"></script>
<!--    <script src="js/flot-data.js"></script>-->
         
 
<script>
    $(document).ready(function(){
        
        var trigger = $('.sidebar-nav ul li a'),
        container = $('#content-div');
        
        trigger.on('click', function(){
            var $this = $(this),
            target = $this.data('target');
            container.load('pages/'+target+'.php');
            if(target === 'Department_files'){
               $('#folderName').val(<?php echo $dept_id ?>); 
            }else{
                $('#folderName').val(0);
            }
            
            return false;
        });
    });
</script>


<script>
$(document).ready(function() { 
    $('#uploadForm').submit(function(e) {
        e.preventDefault();
        if($('#key').val() && $('#file').val()) {
            e.preventDefault();
             
            $(this).ajaxSubmit({  
                target:   '#targetLayer',
                type: 'POST',
                data: { type: 'ajax' },
                beforeSubmit: function() {
                    $("#progress").width('0%');
                },
                uploadProgress: function (event, position, total, percentComplete){	
                    $("#progress").width(percentComplete + '%');
                    $("#progress").html('<div id="progress-status">' + percentComplete +' %</div>');
                },
                success:function (){
                    container = $('#content-div');
                    page = $('#pageName').val();
                    container.load('pages/'+page+'.php');
                    $('#alert-container').append('<div class="alert alert-success"> '+
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'+
                               ' <strong>Success!</strong> File upload was successful </div>');
                       $("#progress").width(0);
                       $("#progress").html('<div id="progress-status">' + 0 +' %</div>');
                       
                },
                resetForm: true 
            }); 
            return false; 
        }else{
            $('#targetLayer').append('<div class="alert alert-danger col-sm-10"> '+
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'+
                               '  All fields are required </div>');
        }
    });
});    
</script>

<script>
       $(function() {
        $.contextMenu({
            selector: '.context-menu-one', 
            callback: function(key, options) {
                var m = "clicked: " + key;
                window.console && console.log(m); 
                if(key === "download"){
                    download_this(this);
                }else if(key === "d_d"){
                    download_encrypt_this(this);
                }else if(key === "delete"){
                     delete_this(this);
                }
            },
            items: {
                "download": {name: "download", icon: "fa-download"},
                "d_d": {name: "decrypt and download", icon: "fa-key"},
                "delete": {name: "Delete", icon: "delete"},
                "quit": {name: "Quit", icon: function(){
                    return 'context-menu-icon context-menu-icon-quit';
                }}
            }
        });

        $('.context-menu-one').on('click', function(e){
            console.log('clicked', this);
        });    
    });
    
    $(function() {
        $.contextMenu({
            selector: '.trash-menu', 
            callback: function(key, options) {
                var m = "clicked: " + key;
                window.console && console.log(m); 
                if(key === "r"){
                    restore_this(this);   
                }else if(key === "d_p"){
                    delete_perm_this(this);
                }//else if(key === "delete"){
//                    $('.delete-modal-trigger').click();
//                }
            },
            items: {
                "r": {name: "restore", icon: "fa-undo"},
                "d_p": {name: "delete permanently", icon: "delete"},
                "quit": {name: "Quit", icon: function(){
                    return 'context-menu-icon context-menu-icon-quit';
                }}
            }
        });

        $('.trash-menu').on('click', function(e){
            console.log('clicked', this);
        });    
    });
</script>
<script>
function download_this(obj){
    val = $(obj).children('form#gfileDownload').children('input#gfile_loc').val();
                    $('input#file_loc').val(val);
                    $('#fileDownload').submit();
}
function download_encrypt_this(obj){
    val = $(obj).children('form#gfileDownloadEncrypt').children('input#gfile_loc').val();
    lock = $(obj).children('form#gfileDownloadEncrypt').children('input#gpoll').val();
        $('input#file_loc').val(val);
        $('input#poll').val(lock);
        console.log(lock);
        $('.decrypt-modal-trigger').click();
}
function delete_this(obj){
    val = $(obj).children('form#gfileDelete').children('input#gfile_name').val();
    folder = $(obj).children('form#gfileDelete').children('input#gfolder_id').val();
        $('input#file_name').val(val);
        $('input#folder_id').val(folder);
        $('.delete-modal-trigger').click();
}
function restore_this(obj){
    val = $(obj).children('form#gfileRestore').children('input#gfile_name').val();
    folder = $(obj).children('form#gfileRestore').children('input#gfolder_id').val();
        $('input#folder_id').val(folder);
        $('input#file_name').val(val);
        $('#fileResTrigger').click(); 
        
}
function delete_perm_this(obj){
    val = $(obj).children('form#gfileDeletePerm').children('input#gfile_name').val();
    loc = $(obj).children('form#gfileDeletePerm').children('input#gfile_loc').val();
    folder = $(obj).children('form#gfileDeletePerm').children('input#gfolder_id').val();
        $('input#folder_id').val(folder);
        $('input#file_name').val(val);
        $('input#file_loc').val(loc);
        $('.delete-perm-modal-trigger').click();
}
</script>

<script>
    $('#fileResTrigger').click(function(e){
        e.preventDefault();
        $('#fileRestore').submit();
    });
    $('#fileRestore').submit(function(e) {
        
            e.preventDefault();
            $(this).ajaxSubmit({  
                target:   '#outLayer',
                type: 'POST',
                data: { type: 'ajax' },
                beforeSubmit: function() {
                    $("#progress").width('0%');
                },success:function (){
                    container = $('#content-div');
                    page = $('#pageName').val();
                    container.load('pages/'+page+'.php');
                    $('#alert-container').append('<div class="alert alert-success"> '+
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'+
                               ' <strong>Success!</strong> File was succcessfully Restored </div>');
                },
                resetForm: true 
            }); 
            return false;
    });
    
</script>
<script>
            $('#fileDeletePerm').submit(function(e){
                e.preventDefault();
            });
</script>
<script>
 
$(document).ready(function() { 
    $('#deleteFileAccept').click(function(e){
        e.preventDefault();
        $('#fileDelete').submit();
        $('#modalClose').click();
    });
    $('#fileDelete').submit(function(e) {
        
            e.preventDefault();
            $(this).ajaxSubmit({  
                //target:   '#outLayer',
                type: 'POST',
                data: { type: 'ajax' },
                beforeSubmit: function() {
                    $("#progress").width('0%');
                },success:function (){
                    container = $('#content-div');
                    page = $('#pageName').val();
                    container.load('pages/'+page+'.php');
                    $('#alert-container').append('<div class="alert alert-success"> '+
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'+
                               ' <strong>Success!</strong> File was succcessfully deleted </div>');
                },
                resetForm: true 
            }); 
            return false;
    });
    
}); 
</script>

<script>
 
$(document).ready(function() { 
    $('#deletePermFileAccept').click(function(e){
        e.preventDefault();
        $('#fileDeletePerm').submit();
        $('#modalClose').click();
    });
    $('#fileDeletePerm').submit(function(e) {
            e.preventDefault();
            $(this).ajaxSubmit({  
                //target:   '#outLayer',
                type: 'POST',
                data: { type: 'ajax' },
                beforeSubmit: function() {
                    $("#progress").width('0%');
                },success:function (){
                    container = $('#content-div');
                    page = $('#pageName').val();
                    container.load('pages/'+page+'.php');
                    $('#alert-container').append('<div class="alert alert-success"> '+
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'+
                               ' <strong>Success!</strong> File was succcessfully deleted permanently</div>');
                },
                resetForm: true 
            }); 
            return false;
    });
    
}); 
</script>

<script>
    $(document).ready(function(){
        $('#decryptForm').submit(function(e){
            e.preventDefault();
           if($('#decryptKey'). val()){
               if($('#decryptKey').val() === $('#poll'). val()){
                   $('#fileDownloadEncrypt').submit();
               }else{
                   $(function () { $('#decrypt-modal').modal('hide');});
                   $('#alert-container').append('<div class="alert alert-warning"> '+
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'+
                               ' <strong>Warning!</strong> Invalid encyption key. </div>');
               }
           }
        });
    });
</script>

<script>
    
    $(document).ready(function(){
        $('#create_ign').submit(function(e){
            
            e.preventDefault();
           
              
               if($('#n_ign').val() !== " " || !(isNaN($('#n_ign').val()))){
                  
            $(this).ajaxSubmit({  
                target:   '#output',
                type: 'POST',
                data: { type: 'ajax' },
                beforeSubmit: function() {
                    $("#progress").width('0%');
                },success:function (){
                   
                    
                },
                resetForm: true 
            }); 
            return false;
               }else{
                   
                   $('#alert-container').append('<div class="alert alert-warning"> '+
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'+
                               ' <strong>Warning!</strong> Invalid input </div>');
               }
           
        });
    });
    
</script>

<script>
    
</script>
</body>

</html>
