<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name='viewport' />
    <title>
        <?php echo ucfirst($title).' | '.SITE_NAME; ?>
    </title>

    <link rel="icon" href="<?php echo base_url("assest/frontend/img/audit-fevicon.png"); ?>" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assest/frontend'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('assest/frontend'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assest/frontend'); ?>/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assest/frontend'); ?>/css/landing-page.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assest/frontend'); ?>/css/landing-page.css" rel="stylesheet">
    <link href="<?php echo base_url('assest/frontend/css/thankyou-style.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('/assets/frontend/validator/bvalidator.css')?>" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>

<body>
 
    <!-- Navigation -->
    <header class="main-header">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4  bg-white border-bottom box-shadow justify-content-between">
            <a href="<?php echo base_url() ?>"><h5 class="my-0  font-weight-normal header-logo">Test</h5></a>
            
            
            <nav class="my-2 my-md-0 mr-md-3">
                     <a href="<?php echo base_url('cart');?>" title="View my shopping cart" rel="nofollow">
                            <span class="cart_title">Cart</span>
                            <span class="no_product">(<?php echo $this->cart->total_items();?> Items)</span>
                        </a>
                     <?php if(empty(user_id())){ ?>
                    <a class="btn blue-button" href="<?php echo base_url('login') ?>">Log In</a>
                    <a class="btn blue-button" href="<?php echo base_url('sign_up') ?>">Sign up</a>
                <?php  } else { ?>

                    <a class="btn blue-button" href="<?php echo base_url('account/dashboard') ?>">Dashboard</a>
                    <a class="btn blue-button" href="<?=base_url('account/logout')?>"><span>Log Out</span> </a>
                    <?php } ?>
            </nav>

        </div>
    </header>
  