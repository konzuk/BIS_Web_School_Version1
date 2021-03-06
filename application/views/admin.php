<!DOCTYPE html >
<html ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="<?php echo base_url();?>app/template/images/favicon_1.ico">

    <title>GRYP - Admin Dashboard</title>

    <!-- Base Css Files -->
    <link href="<?php echo base_url();?>app/template/css/bootstrap.min.css" rel="stylesheet" />


    <!-- DataTables -->
    <link href="<?php echo base_url();?>app/template/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


    <!-- Font Icons -->
    <link href="<?php echo base_url();?>app/template/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>app/template/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>app/template/css/material-design-iconic-font.min.css" rel="stylesheet">



    <!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app/template/assets/form-wizard/jquery.steps.css" />


    <!-- animate css -->
    <link href="<?php echo base_url();?>app/template/css/animate.css" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="<?php echo base_url();?>app/template/css/waves-effect.css" rel="stylesheet">

    <!-- sweet alerts -->
    <link href="<?php echo base_url();?>app/template/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">


    <link href="<?php echo base_url();?>app/template/assets/summernote/summernote.css" rel="stylesheet" />

    <!-- Custom Files -->
    <link href="<?php echo base_url();?>app/template/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>app/template/css/style.css" rel="stylesheet" type="text/css" />


    <link href="<?php echo base_url();?>content/loading-bar.css" rel="stylesheet" type="text/css" />

</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="#/home" class="logo"><i class="md md-terrain"></i> <span>User Admin </span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                    <form class="navbar-form pull-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                        </div>
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </form>

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown hidden-xs">
                            <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg">
                                <li class="text-center notifi-title">Notification</li>
                                <li class="list-group">
                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left">
                                                <em class="fa fa-user-plus fa-2x text-info"></em>
                                            </div>
                                            <div class="media-body clearfix">
                                                <div class="media-heading">New user registered</div>
                                                <p class="m-0">
                                                    <small>You have 10 unread messages</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left">
                                                <em class="fa fa-diamond fa-2x text-primary"></em>
                                            </div>
                                            <div class="media-body clearfix">
                                                <div class="media-heading">New settings</div>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left">
                                                <em class="fa fa-bell-o fa-2x text-danger"></em>
                                            </div>
                                            <div class="media-body clearfix">
                                                <div class="media-heading">Updates</div>
                                                <p class="m-0">
                                                    <small>There are
                                                        <span class="text-primary">2</span> new updates available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- last list item -->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <small>See all notifications</small>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url();?>app/template/images/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left">
                    <img src="<?php echo base_url();?>app/template/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Sean Vit <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                            <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                            <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                            <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </div>

                    <p class="text-muted m-0">Administrator</p>
                </div>
            </div>
            <!--- Divider -->
            <div id="sidebar-menu" >

                <ul >
                    <li ng-repeat="nav in navBarLists">
                        <a ng-class="{havechild: nav.child.length > 0, active: isActive(nav.activeTab)}" ng-href="{{nav.href}}"
                           class="waves-effect" sidebar-menu>
                            <i class="md" ng-class="nav.icon"></i>
                            <span>{{nav.text}}</span></a>
                        <ul class="list-unstyled" >
                            <li ng-repeat="ch in nav.child" ng-class="{active: isActiveChild(ch.child)}"><a ng-href="{{ch.href}}"><i class="fa fa-arrow-circle-right"></i><span>{{ch.text}}</span></a></li>
                        </ul>
                    </li>
                </ul>

<!--                    <li>-->
<!--                        <a class="waves-effect" sidebar-menu><i class="md md-home"></i><span> Admin Panel </span></a>-->
<!--                        <ul class="list-unstyled">-->
<!--                            <li><a href="manage_user.html"><i class="fa fa-arrow-circle-right"></i><span>Manage User</span></a></li>-->
<!--                            <li><a href="add_user.html"><i class="fa fa-arrow-circle-right"></i><span>Add New User</span></a></li>-->
<!--                        </ul>-->
<!--                    </li>-->

<!---->
<!--                <ul>-->
<!--                    <li>-->
<!--                        <a href="index.html" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <a href="#" class="waves-effect"><i class="md md-home"></i><span> Admin Panel </span></a>-->
<!--                        <ul class="list-unstyled">-->
<!--                            <li><a href="manage_user.html"><i class="fa fa-arrow-circle-right"></i><span>Manage User</span></a></li>-->
<!--                            <li><a href="add_user.html"><i class="fa fa-arrow-circle-right"></i><span>Add New User</span></a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                 </ul>-->
<!---->
<!--                    <li class="has_sub">-->
<!--                        <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Manage Depositor </span> <span class="pull-right"><i class="md md-add"></i></span></a>-->
<!--                        <ul class="list-unstyled">-->
<!--                            <li><a href="all_depositor.html">All Depositor</a></li>-->
<!--                            <li><a href="add_depositor.html">Add Depositor</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!---->
<!--                    <li class="has_sub">-->
<!--                        <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> Manage Lesson </span><span class="pull-right"><i class="md md-add"></i></span></a>-->
<!--                        <ul class="list-unstyled">-->
<!--                            <li><a href="grid.html">All Lesson</a></li>-->
<!--                            <li><a href="portlets.html">Add Lesson</a></li>-->
<!--                            <li><a href="widgets.html">Categories</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!---->
<!--                    <li class="has_sub">-->
<!--                        <a href="#" class="waves-effect"><i class="md md-redeem"></i> <span> Posts </span> <span class="pull-right"><i class="md md-add"></i></span></a>-->
<!--                        <ul class="list-unstyled">-->
<!--                            <li><a href="material-icon.html">All Posts</a></li>-->
<!--                            <li><a href="ion-icons.html">Categories</a></li>-->
<!--                            <li><a href="font-awesome.html">Tag Category</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!---->
<!--                    <li class="has_sub">-->
<!--                        <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> Pages </span><span class="pull-right"><i class="md md-add"></i></span></a>-->
<!--                        <ul class="list-unstyled">-->
<!--                            <li><a href="form-elements.html">All Pages</a></li>-->
<!--                            <li><a href="form-validation.html">Add Page</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">



            <div class="container" ng-view>




            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © MTO IT SOLUTION.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    <!-- Right Sidebar -->
    <div class="side-bar right-bar nicescroll">
        <h4 class="text-center">Chat</h4>
        <div class="contact-list nicescroll">
            <ul class="list-group contacts-list">
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/avatar-1.jpg" alt="">
                        </div>
                        <span class="name">Chadengle</span>
                        <i class="fa fa-circle online"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-2.jpg" alt="">
                        </div>
                        <span class="name">Tomaslau</span>
                        <i class="fa fa-circle online"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-3.jpg" alt="">
                        </div>
                        <span class="name">Stillnotdavid</span>
                        <i class="fa fa-circle online"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-4.jpg" alt="">
                        </div>
                        <span class="name">Kurafire</span>
                        <i class="fa fa-circle online"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-5.jpg" alt="">
                        </div>
                        <span class="name">Shahedk</span>
                        <i class="fa fa-circle away"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-6.jpg" alt="">
                        </div>
                        <span class="name">Adhamdannaway</span>
                        <i class="fa fa-circle away"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-7.jpg" alt="">
                        </div>
                        <span class="name">Ok</span>
                        <i class="fa fa-circle away"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-8.jpg" alt="">
                        </div>
                        <span class="name">Arashasghari</span>
                        <i class="fa fa-circle offline"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-9.jpg" alt="">
                        </div>
                        <span class="name">Joshaustin</span>
                        <i class="fa fa-circle offline"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="<?php echo base_url();?>app/template/images/users/avatar-10.jpg" alt="">
                        </div>
                        <span class="name">Sortino</span>
                        <i class="fa fa-circle offline"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
            </ul>
        </div>
    </div>
    <!-- /Right-bar -->

</div>
<!-- END wrapper -->


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script src="/app/template/js/modernizr.min.js"></script>




<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php echo base_url();?>app/template/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>app/template/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>app/template/js/waves.js"></script>
<script src="<?php echo base_url();?>app/template/js/wow.min.js"></script>
<script src="<?php echo base_url();?>app/template/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>app/template/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>app/template/assets/chat/moment-2.2.1.js"></script>
<script src="<?php echo base_url();?>app/template/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>app/template/assets/jquery-detectmobile/detect.js"></script>
<script src="<?php echo base_url();?>app/template/assets/fastclick/fastclick.js"></script>
<script src="<?php echo base_url();?>app/template/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url();?>app/template/assets/jquery-blockui/jquery.blockUI.js"></script>

<!-- sweet alerts -->
<script src="<?php echo base_url();?>app/template/assets/sweet-alert/sweet-alert.min.js"></script>
<script src="/app/template/assets/sweet-alert/sweet-alert.init.js"></script>

<!-- flot Chart -->
<script src="<?php echo base_url();?>app/template/assets/flot-chart/jquery.flot.js"></script>
<script src="<?php echo base_url();?>app/template/assets/flot-chart/jquery.flot.time.js"></script>
<script src="<?php echo base_url();?>app/template/assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url();?>app/template/assets/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo base_url();?>app/template/assets/flot-chart/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>app/template/assets/flot-chart/jquery.flot.selection.js"></script>
<script src="<?php echo base_url();?>app/template/assets/flot-chart/jquery.flot.stack.js"></script>
<script src="<?php echo base_url();?>app/template/assets/flot-chart/jquery.flot.crosshair.js"></script>

<!-- Counter-up -->
<script src="<?php echo base_url();?>app/template/assets/counterup/waypoints.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>app/template/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="<?php echo base_url();?>app/template/js/jquery.app.js"></script>

<script src="<?php echo base_url();?>app/template/assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>app/template/assets/datatables/dataTables.bootstrap.js"></script>

<!--form validation-->
<script type="text/javascript" src="<?php echo base_url();?>app/template/assets/jquery.validate/jquery.validate.min.js"></script>

<!--form validation init-->
<script type="text/javascript" src="<?php echo base_url();?>app/template/assets/jquery.validate/form-validation-init.js"></script>



<!-- Dashboard -->
<script src="<?php echo base_url();?>app/template/js/jquery.dashboard.js"></script>

<!-- Chat -->
<script src="<?php echo base_url();?>app/template/js/jquery.chat.js"></script>

<!-- Todo -->
<script src="<?php echo base_url();?>app/template/js/jquery.todo.js"></script>



<script src="<?php echo base_url();?>scripts/angular.min.js"></script>
<script src="<?php echo base_url();?>scripts/angular-aria.min.js"></script>
<script src="<?php echo base_url();?>scripts/angular-animate.min.js"></script>
<script src="<?php echo base_url();?>scripts/angular-messages.min.js"></script>
<script src="<?php echo base_url();?>scripts/angular-route.min.js"></script>
<script src="<?php echo base_url();?>scripts/angular-sanitize.min.js"></script>
<script src="<?php echo base_url();?>scripts/angular-cookies.min.js"></script>
<script src="<?php echo base_url();?>scripts/ng-file-upload-shim.min.js"></script>
<script src="<?php echo base_url();?>scripts/ng-file-upload.min.js"></script>
<script src="<?php echo base_url();?>scripts/loading-bar.js"></script>

<!--template-->
<script src="<?php echo base_url();?>scripts/TweenMax.min.js"></script>

<!-- Bootstrapping -->
<script src="<?php echo base_url();?>app/app.js"></script>
<script src="<?php echo base_url();?>app/config.js"></script>
<script src="<?php echo base_url();?>app/config.exceptionHandler.js"></script>
<!-- common Modules -->
<script src="<?php echo base_url();?>app/Common/common.js"></script>
<script src="<?php echo base_url();?>app/Common/logger.js"></script>

<!-- app Services -->
<script src="<?php echo base_url();?>app/data.js"></script>
<script src="<?php echo base_url();?>app/directive.js"></script>
<script src="<?php echo base_url();?>app/routemediator.js"></script>

<!-- Module -->

<script src="<?php echo base_url();?>app/module/home/home.js"></script>
<script src="<?php echo base_url();?>app/module/account/account.js"></script>
<script src="<?php echo base_url();?>app/module/deposit/deposit.js"></script>
<script src="<?php echo base_url();?>app/module/deposit/profit.js"></script>
<script src="<?php echo base_url();?>app/module/page/page.js"></script>
<script src="<?php echo base_url();?>app/module/post/category/category.js"></script>
<script src="<?php echo base_url();?>app/module/post/post/post.js"></script>


<script src="<?php echo base_url();?>app/module/account/addEditAccountDialog.js"></script>

<script src="<?php echo base_url();?>app/template/js/ui-bootstrap-tpls-0.14.3.min.js"></script>
<script src="<?php echo base_url();?>app/template/assets/datatables/angular-datatables.min.js"></script>
<script src="<?php echo base_url();?>app/template/assets/datatables/plugins/bootstrap/angular-datatables.bootstrap.min.js"></script>


<script src="<?php echo base_url();?>app/template/assets/summernote/summernote.js"></script>
<script src="<?php echo base_url();?>app/template/assets/summernote/angular-summernote.min.js"></script>

<!--Form Wizard-->
<script src="<?php echo base_url();?>app/template/assets/form-wizard/jquery.steps.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>app/template/assets/jquery.validate/jquery.validate.min.js"></script>



<script type="text/ng-template" id="error-messages">
    <label class="error" ng-message="required">This field is required.</label>
    <label class="error" ng-message="email">Invalid email address.</label>
    <label class="error" ng-message="minlength">This field is too short.</label>
    <label class="error" ng-message="maxlength">This field is too long.</label>
</script>



</body>
</html>