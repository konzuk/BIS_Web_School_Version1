<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon_1.ico">

        <title>Login Form</title>

        <!-- Base Css Files -->
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="<?php echo base_url();?>css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="<?php echo base_url();?>css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="<?php echo base_url();?>css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url();?>js/modernizr.min.js"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
<!--                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Moltran</strong> </h3>-->
                    <h3 class="text-center m-t-10 text-white"> Login Form </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" action="<?php echo base_url();?>index.php/login/login" method="post">
                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg " type="text" required="required" placeholder="Username" name="UserName" id="UserName" value="<?php if(isset($UserName)) echo $UserName;?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required="required" placeholder="Password" name="Password" id="Password" value="<?php if(isset($Password)) echo $Password;?>">
                            <?php if(isset($Message)) echo "<span style='color:red'> $Message</span>"; ?>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-success">
                                <input id="checkbox-signup" type="checkbox" name="RememberMe" id="RememberMe" <?php if(isset($RememberMe) && $RememberMe==true) echo 'checked="checked"';?>  >
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

<!--                    <div class="form-group m-t-30">-->
<!--                        <div class="col-sm-7">-->
<!--                            <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>-->
<!--                        </div>-->
<!--                        <div class="col-sm-5 text-right">-->
<!--                            <a href="register.html">Create an account</a>-->
<!--                        </div>-->
<!--                    </div>-->
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>
    	<script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>js/waves.js"></script>
        <script src="<?php echo base_url();?>js/wow.min.js"></script>
        <script src="<?php echo base_url();?>js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url();?>assets/jquery-detectmobile/detect.js"></script>
        <script src="<?php echo base_url();?>assets/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url();?>assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="<?php echo base_url();?>js/jquery.app.js"></script>
	
	</body>
</html>