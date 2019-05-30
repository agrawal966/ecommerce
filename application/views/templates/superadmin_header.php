<?php  
   $main_segment  = $this->uri->segment(2); 
   $segment       = $this->uri->segment(3);
   $segment4      = $this->uri->segment(4); 

   if($segment=='dashboard') $dashboard='active'; else $dashboard='';

   if($main_segment=='category' || $main_segment=='attribute' || ($main_segment=='products' && ($segment=='variation_themes' || $segment=='add_variation_theme' || $segment=='edit_variation_theme'))) $catalog='active'; else $catalog='';
   if($main_segment=='category' && ($segment=='add_category' || $segment=='edit' || $segment=='index' || $segment=='add_subcategory' && $segment=='')) $Categories='active'; else $Categories='';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="<?php echo FRONTEND_THEME_URL; ?>img/cazshoppe_favicon.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="">
    <title>
        <?php if(isset($title)){ echo ucfirst($title)." | "; } ?>
            <?php echo SITE_NAME;?>
    </title>

    <link rel="icon" href="<?php echo base_url("assest/frontend/img/audit-fevicon.png"); ?>" type="image/x-icon"/>


    <!-- Bootstrap core CSS -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="<?php echo BACKEND_THEME_URL ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BACKEND_THEME_URL ?>css/bootstrap-reset.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BACKEND_THEME_URL ?>css/bootstrap-datetimepicker.min.css" />
    <!--external css-->
    <link href="<?php echo BACKEND_THEME_URL ?>plugin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo BACKEND_THEME_URL ?>plugin/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo BACKEND_THEME_URL ?>css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo BACKEND_THEME_URL ?>css/style.css" rel="stylesheet">
    <link href="<?php echo BACKEND_THEME_URL ?>css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo BACKEND_THEME_URL; ?>css/sweetalert.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo BACKEND_THEME_URL ?>css/easyzoom.css">
    <script src="<?php echo BACKEND_THEME_URL ?>js/jquery.js"></script>
    <!--fancy box -->
    <link href="<?php echo BACKEND_THEME_URL ?>css/rating.css" rel="stylesheet">
    <link href="<?php echo BACKEND_THEME_URL ?>css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SELLER_THEME_URL; ?>css/cryptofont.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BACKEND_THEME_URL ?>font-awesome/css/font-awesome.min.css">
    <script src="<?php echo BACKEND_THEME_URL; ?>js/sweetalert.js" type="text/javascript"></script>
    <script src="<?php echo BACKEND_THEME_URL ?>js/rating.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/admin/js/notify.min.js"></script>
    <script src="<?php echo BACKEND_THEME_URL; ?>js/moment.min.js"></script>
    <script src="<?php echo BACKEND_THEME_URL; ?>js/bootstrap-datetimepicker.min.js"></script>

    <script>
        SITE_URL = "<?php echo base_url(); ?>";
    </script>
    <style>
        .form-group .col-md-9 {
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header">
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 no-padding">
                <div class="sidebar-toggle-box">
                    <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
                </div>
                <!--logo start-->
                <a href="<?php echo base_url('backend/superadmin')?>" class="logo">Admin<span>Panel</span></a>
                <!--logo end-->
            </div>
            <!-- <div class="col-md-8 col-lg-8"> -->
            <div class="top-nav col-md-9 col-lg-9 col-sm-9 col-xs-9">
                <div class="col-md-10 col-lg-10 col-sm-8 col-xs-8 padding-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="nav notify-row yamm" id="top_menu">
                            <!--  notification start -->
                            <!--  notification end -->
                        </div>
                    </div>
                </div>
                <!--search & user info start-->
                <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 no-padding">
                    <ul class="nav pull-right ">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle admin-logout" href="#">
			                 	<!-- <img alt="" src="<?php echo BACKEND_THEME_URL ?>images/favicon.ico" style="width: 18px;"> -->
                                <i class="fa fa-user" style="width: 12px;vertical-align: middle;"></i>
			                 	<span class="username" style="vertical-align: middle;"><?php echo ucwords(superadmin_name()); ?></span>
			                 	<b class="caret"></b>
			                </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li><a href="<?php echo base_url()?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i>Go to the Website</a></li>
                                <li><a href="<?php echo base_url()?>backend/superadmin/profile"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="<?php echo base_url()?>backend/superadmin/change_password"><i class="fa fa-key"></i>Change Password</a></li>
                                <li><a href="<?php echo base_url()?>backend/superadmin/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="<?php echo $dashboard ?>" href="<?php echo base_url('backend/superadmin/dashboard') ?>">
                            <i class="icon-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu dcjq-parent-li">
                        <a href="<?=base_url('backend/product/')?>" class="<?php if($main_segment == 'product') echo 'active';?>">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>Product</span>
                        </a>
                    </li>
                    <li class="sub-menu dcjq-parent-li">
                        <a href="<?php echo base_url('backend/users') ?>" class="<?php if($main_segment == 'users') echo 'active';?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Manage Users</span>
                        </a>
                    </li>
                    <li class="sub-menu dcjq-parent-li">
                        <a href="<?php echo base_url('backend/order') ?>" class="<?php if($segment == 'plan_history') echo 'active';?>">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>Order Management</span>
                        </a>
                    </li>
                                
                    <!--multi level menu end-->
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <?php msg_alert(); ?>
                            <section class="panel">