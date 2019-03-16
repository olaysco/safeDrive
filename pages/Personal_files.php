<?php
$src = '';
if(!isset($_SESSION)){
session_start();
include '../inc/init.php';
$uid = $_SESSION['ign'];
}

$db = new Database();

$val = $db->multipleColumn("SELECT * FROM `files` WHERE `file_uploader_id` LIKE ? AND `folder_id` LIKE ? AND `presence` LIKE ?", array($uid,0,1));
//var_dump($val);

function get_thumb($file_type){
    $expected_types = ["aep","ai","fla","font","html","indd","psd","xlsx","audio","image","pdf","text","video","zip"];
    
    switch($file_type){
        case 'aep':
          $src =  "img/file-icons/aep.png";
            break;
        case 'ai':
            $src =  "img/file-icons/AI.png";
            break;
        case 'fla':
          $src =  "img/file-icons/FLA.png";
            break;
        case 'font':
            $src =  "img/file-icons/FONT.png";break;
        case 'html':
          $src =  "img/file-icons/HTML.png";break;
        case 'INDD':
            $src =  "img/file-icons/indd.png";break;
        case 'psd':
          $src =  "img/file-icons/PSD.png";break;
        case 'xlsx':
            $src =  "img/file-icons/xlsx.png";break;
        case 'pdf':
          $src =  "img/file-icons/pdf.png";break;
        case 'zip':
            $src =  "img/file-icons/zip.png";break;
        case 'mp3':
          $src =  "img/file-icons/audio.png";break;
        case 'aac':
            $src =  "img/file-icons/audio.png";break;
        case 'm4a':
            $src =  "img/file-icons/audio.png";break;
        case 'mp4':
          $src =  "img/file-icons/video.png";break;
        case '3gp':
            $src =  "img/file-icons/video.png";break;
        case 'mkv':
          $src =  "img/file-icons/video.png";break;
        case 'txt':
            $src =  "img/file-icons/text.png";break;
        case 'jpeg':
            $src =  "img/file-icons/image.png";break;
        case 'jpg':
          $src =  "img/file-icons/image.png";break;
        case 'gif':
            $src =  "img/file-icons/image.png";break;
        case 'png':
            $src =  "img/file-icons/image.png";break;
        default:
            $src =  "img/file-icons/UNKNOWN.png";break;
    }
    
    return $src;
}
?>


 <form method="post" target="blank"action="inc/download.php" id="fileDownload">
    <input type="hidden" name="file_loc" id="file_loc" value=""/>
    <input type="hidden" name="poll" id="poll" value=""/>
</form>
<form method="post" action="inc/decrypt.php" id="fileDownloadEncrypt" onsubmit="">
    <input type="hidden" name="file_loc" id="file_loc" value=""/>
    <input type="hidden" name="poll" id="poll" value=""/>
</form>
<form method="post" action="inc/delete.php" id="fileDelete">
    <input type="hidden" name="file_name" id="file_name" value=""/>
    <input type="hidden" name="folder_id" id="folder_id" value=""/>
    <input type="hidden" name="poll" id="poll" value=""/>
</form>


<div class="row">
    <input type="hidden" name="page" value="Personal_files" id="pageName">
<div class="col-lg-12">
        <h3><i class="fa fa-folder-open"> </i> Personal</h3>
        <hr class="divider">
    <div class="panel-body">
        <div class="row">
                
                
            
        
        <?php foreach($val as $key=>$value){?>
        <div class="fileItem col-sm-2 context-menu-one">
           
            <img src="<?php echo get_thumb($value['file_type'])?>"  alt=""  class="thumb"/>
            <form method="post" target="blank"action="inc/download.php" id="gfileDownload">
                <input type="hidden" name="file_loc" id="gfile_loc" value="<?php echo $value['folder_id'].'/'.$value['file_name']?>"/>
                <input type="hidden" name="poll" id="gpoll" value="<?php echo $value['file_pri_key'] ?>"/>
            </form>
            <form method="post" action="inc/decrypt.php" id="gfileDownloadEncrypt" onsubmit="">
                <input type="hidden" name="file_loc" id="gfile_loc" value="<?php echo $value['folder_id'].'/'.$value['file_name']?>"/>
                <input type="hidden" name="poll" id="gpoll" value="<?php echo $value['file_pri_key'] ?>"/>
            </form>
            <form method="post" action="inc/delete.php" id="gfileDelete">
                <input type="hidden" name="file_name" id="gfile_name" value="<?php echo $value['file_name']?>"/>
                <input type="hidden" name="folder_id" id="gfolder_id" value="<?php echo $value['folder_id']?>"/>
                <input type="hidden" name="poll" id="gpoll" value="<?php echo $value['file_pri_key'] ?>"/>
            </form>
                    <figcaption class="figure-caption"><?php echo $value['file_name'] ?></figcaption>
                </div>
        <?php } ?>
      </div> 
        
        <div id="outLayer">
            
        </div>
    </div>
    

        
        

</div>
</div>


 <script>
            $(document).ready(function() { 
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
    $('#uploadBut').show();
</script>