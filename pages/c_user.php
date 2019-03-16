<div class="row">
    <input type="hidden" name="page" value="c_user" id="pageName">
<div class="col-lg-12">
        <h3><i class="fa fa-plus-square"> </i> Create New IGN</h3>
        <hr class="divider">
    <div class="panel-body">
        <div class="row">
            
            
            <div class="brand signup-box">
                <form class="form-horizontal" role="form" action="inc/create_ign.php" method="POST" id="create_ign">
                    <div class="form-group">                                      
                           <div class="col-sm-10 ">
                               <div class="input-group">
                                   <span class="input-group-addon">MTK-</span>
                                   <input type="text" class="form-control" id="firstname" name="n_ign" id="n_ign"  value="" placeholder="Enter IGN Number" />
                               </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button class="btn btn-primary btn-round btn-block">
                            create unassigned IGN
                            <em class="fa fa-fw fa-plus-circle"></em>
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
            
            <div class="well" id="output">
                
            </div>
                  </div> 
        
        <div id="outLayer">
            
        </div>
    </div>
    

        
        

</div>
</div>

<script>
    
    $(document).ready(function(){
        $('#create_ign').submit(function(e){
            
            e.preventDefault();
           
              
           if($('#n_ign').val() !== "" || !(isNaN($('#n_ign').val()))){
   
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