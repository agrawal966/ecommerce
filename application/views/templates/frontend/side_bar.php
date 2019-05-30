<?php $main_segment  = $this->uri->segment(2); 
    // echo $segment       = $this->uri->segment(3);
    // echo $segment4      = $this->uri->segment(4); 
    $dashboard    =($main_segment=='dashboard')?'active':'';
    $account    =($main_segment=='account')?'active':'';
    $changepassword=($main_segment=='change_password')?'active':'';
    $history = ($main_segment == 'plan_history') ? 'active' : '';
    $search = ($main_segment == 'search_history') ? 'active' : '';
?>
<div class="profile-setting-wrapper">
<div class="container">
<div class="row profile-setting-cover dashboard-main-wrap">
<div class="col-md-3  blog-sidebar ">
    <div class="sidebar-module sidebar-module-inset">
        <img src="<?php echo base_url("assest/frontend/img/user.svg"); ?>">
        <!-- <p class="my-account-heading"><b class="text-orange">MY</b> ACCOUNT</p> -->
        <div class="user-name">
            <h3 style="word-wrap: break-word;">
                <?php
                $username = $this->session->userdata('user_info')['full_name'];
                if($username) {
                    echo ucfirst(explode(" ", $username)[0]);
                }
                ?>
            </h3>
        </div>
    </div>
    <hr>
    <div class="sidebar-module">
        <ul class="list-unstyled dashboard-list-wrap">
            <li class="<?=$dashboard?>"><a href="<?=base_url('account/dashboard')?>" class="user-img"><img src="<?=base_url('/assest/frontend/img/user.svg')?>"><span>Dashboard</span></a></li>
            <li><a href="<?php echo base_url("price?q"); ?>"><img src="<?php echo base_url("assest/frontend/img/planning.svg"); ?>"><span>View Plans</span>
        </a></li>
            <li class="<?=$history?>"><a href="<?php echo base_url("account/plan_history"); ?>"><img src="<?php echo base_url("assest/frontend/img/planning.svg"); ?>"><span>Plan History</span>
        </a></li>
            <li class="<?=$search?>"><a href="<?php echo base_url("account/search_history"); ?>"><img src="<?php echo base_url("assest/frontend/img/diagram.svg"); ?>"><span>Reports</span>
        </a></li>
            <li class="<?=$account?>"><a href="<?=base_url('account/account')?>" class="user-img"><img src="<?=base_url('/assest/frontend/img/user.svg')?>"><span>Account Setting</span>
        </a></li>
            <li class="<?=$changepassword?>"><a href="<?=base_url('account/change_password')?>"><img src="<?=base_url()?>assest/frontend/img/password.svg"><span>Change Password</span>
        </a></li>
            <li><a href="<?=base_url('account/logout')?>"><img src="<?=base_url()?>assest/frontend/img/logout.svg"><span>Log Out</span>
        </a></li>
        </ul>
    </div>
</div>