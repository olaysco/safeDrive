<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <meta charset="utf-8">
        <title>Safe Drive 1.0.0</title>
        <meta name="description" content="Love UI Kit." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="css/bootstrapValidator.min.css" rel="stylesheet" type="text/css"/>
        
        <!--self loaded-->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="css/colors.css" />
        <!--vendors-->
        <link rel="stylesheet" href="js/vendors/daterangepicker/daterangepicker.css" />
        <!--custom css-->
        <link rel="stylesheet" href="css/components.css" />
        
        <link rel="stylesheet" href="css/demo.css" />
        <link href="css/bootstrapValidator.min.css" rel="stylesheet" type="text/css"/>
        <style>
        	.hero-header{
        		background-image: url("img/bg1.jpg") !important;
        		height: 100vh !important;
        	}
                .help-block{
                    color: #fb9595;
                }
                
        </style>
    </head>
    <body>
        <section class="colored-section hero-header demo-section">
            <div class="main-overlay">
            </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 offset-md-1">
                            <div class="brand top-brand">
                                <h3 class="text-white">MTK Consult Drive <em class="fa fa-cloud fa-fw"></em></h3>
                                <h6 class="text-uppercase mb-5">
                                    Secured cloud file storage with full encryption
                                </h6>

                                <a href=#" target="_blank" class="btn btn-white btn-round mr-3 sm-hide">
                                    <em class="fa fa-key fa-fw"></em>
                                    Secured
                                </a>
                                <a href="#" target="_blank" class="btn btn-primary btn-round mr-3 sm-hide">
                                    <em class="fa fa-share fa-fw"></em>
                                    Enhanced file sharing
                                </a>
                                <a href="#" target="_blank" class="btn btn-danger btn-round sm-hide">
                                    <em class="fa fa-group fa-fw"></em>
                                    Collaboration
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <div class="brand login-box see ">
                                <?php if(isset($_GET['msg'])){
                                    if($_GET['msg'] == 'invalid_details'){
                                    echo '<div class="alert alert-danger col-sm-10"> '.
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'.
                               '  Invalid IGN or password. </div>';
                                    }else if($_GET['msg'] == 'reg_fail'){
                                      echo '<div class="alert alert-danger col-sm-10"> '.
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'.
                               '  Registration failed. </div>';  
                                    }else if($_GET['msg'] == 'reg_success'){
                                      echo '<div class="alert alert-success col-sm-10"> '.
                                '<a href="#" class="close" data-dismiss="alert"> &times; </a>'.
                               '  registration Successfull. login to continue</div>';  
                                    }
                                }  ?>
                                <form class="form-horizontal" role="form" method="POST" action="inc/login.php" id="logForm">
                                    <div class="form-group">                                      
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="enum" name="l_ign" placeholder="Enter Unique IGN">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="num" name="l_password" placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-round btn-block" value="sign in" />
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="signup-span">Are you a new user sign up <a href="#sign-up" id="signUP"> here</a></span>
                                    </div>
                                    <input type="hidden" name="login" value="true"/>
                                </form>
                            </div>
                            
                            
                            <div class="brand signup-box">
                                <form class="form-horizontal" role="form" method="POST" action="inc/register.php" id="register">
                                    <div class="form-group">                                      
                                        <div class="col-sm-10">
                                            <input type="text" id="name" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10 ">
                                            <input type="password" class="form-control" id="password" name="pass" placeholder="Enter Password">
                                        </div>
                                        <div class="col-sm-10 messages"> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10 ">
                                            <input type="password" class="form-control" id="c_password" name="c_pass" placeholder="Re-type Password">
                                        </div>
                                        <div class="col-sm-10 messages"> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="mail" placeholder="mail@domain.com">
                                        </div>
                                        <div class="col-sm-10 messages"> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="ign" name="ign" placeholder="Enter Unique IGN">
                                        </div>
                                        <div class="col-sm-10 messages"> </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <select class="form-control" style="height:40px;" name="dept" id="dept" required="required"> 
                                            <option value="">select department</option> 
                                            <option value="1">FRONT-END</option> 
                                            <option value="2">BACK-END</option> 
                                            <option value="3">ADMIN</option> 
                                            <option value="4">ANALYST</option>
                                            
                                        </select>
                                        </div>
                                        <div class="col-sm-10 messages"> </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-round btn-block" value="Create Account" id="regButton" name="register"/>
                                        </div>
                                        <div class="col-sm-10">
                                            <a href="#login" class="btn btn-secondary btn-round btn-block" id="logIN">
                                            <em class="fa fa-fw fa-backward"></em>
                                            sign in to your account
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
    
    
    
    
    
    
         
        
        
        
        
        <!--self loaded -->
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/tether.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.easing.min.js" type="text/javascript"></script>
        <script src="js/wow.js" type="text/javascript"></script>
<!--        <script src="js/validate.js" type="text/javascript"></script>
        <script src="js/underscore-min.js" type="text/javascript"></script>-->
        <!--vendors-->
        <script src="js/vendors/moment.min.js"></script>
        <script src="js/vendors/daterangepicker/daterangepicker.js"></script>
        <!--custom js-->
        <script src="js/bootstrapValidator.min.js" type="text/javascript"></script>
        <script src="js/app.js"></script>
        <script>
        $(function(){
                $('.signup-box').hide();
                $('#signUP').click(function(){
                    $('.login-box').hide('slow',function(){$('.signup-box').show('slow')});
                    if($(window).width()<768){
                        $('.sm-hide').hide(); 
                    }
                });
                $('#logIN').click(function(){
                    $('.signup-box').hide('slow',function(){$('.login-box').show('slow')});
                    $('.sm-hide').show();
                });
                if($(window).width()>768){
                        $('.sm-hide').show(); 
                }
                $(window).resize(function(){
                    if($(window).width()>768){
                        $('.sm-hide').show(); 
                    }  
                });
              
       
         });  
        </script>
        <script>
            $('#regButton').click(function(e){
                $('.signup-box').css({"margin-top":4vh !important"};);
            });
        </script>
        
         <script>
$(document).ready(function() {
    $('#register').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            full_name: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: '  Alphabets only'
                    }
                }
            },ign: {
                message: 'The IGN is not valid',
                validators: {
                    notEmpty: {
                        message: 'The IGN is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            mail: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                    
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'full_name',
                        message: 'The password cannot be the same as your name'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            },
            c_pass: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'pass',
                        message: 'not the same as the password field'
                    }
                }
            },
            birthday: {
                validators: {
                    notEmpty: {
                        message: 'The date of birth is required'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The date of birth is not valid'
                    }
                }
            },
            dept: {
                validators: {
                    notEmpty: {
                        message: 'Please select your department'
                    }
                }
            }
        }
    });
});
</script>

 <script>
$(document).ready(function() {
    $('#logForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            l_ign: {
                message: 'The IGN is not valid',
                validators: {
                    notEmpty: {
                        message: 'The IGN is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The IGN is not valid'
                    }
                }
            },
            l_password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            }
        }
    });
});
</script>
    </body>
</html>


