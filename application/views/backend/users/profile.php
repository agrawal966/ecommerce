<div class="bread_parent">
    <div class="col-md-9">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('backend/superadmin/dashboard'); ?>"><i class="icon-home"></i> Dashboard  </a></li>
            <li><a href="<?php echo base_url('backend/users/'); ?>">Manage Users </a></li>
            <li>Profile</li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>

<section class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <div class="panel-heading colum">
                <i class="icon-user"></i> Profile Information
            </div>
            <br>
            <div class="col-md-6 ">
                <div class="info-view">
                    <h5 class="heading"><span><i class="fa fa-info-circle" aria-hidden="true"></i> </span><b>Basic Information </b></h5>
                    <table class="table">
                        <tbody>

                            <tr>
                                <th>Full Name</th>
                                <td> <font class="colon">: &nbsp;</font><?php echo $user['full_name'] ? $user['full_name'] : "NA"; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td> <font class="colon">: &nbsp;</font><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email'] ? $user['email'] : "NA"; ?></a></td>
                            </tr>
                            <tr>
                                <th>Phone No.</th>
                                <td> <font class="colon">: &nbsp;</font><?php echo $user['contact_no'] ? $user['contact_no'] : "NA"; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td class="btn00 btn-xs00 cursor-text"> <font class="colon">: &nbsp;</font>
                                    <a href="javascript:;" class="change_status  btn-xs btn <?php echo $user['status'] == '1' ? "btn-success Active" : "btn-danger Inactive"; ?>" data-id="<?php echo $user['id']; ?>" data-status="<?php echo $user['status'] == '1' ? "0" : "1"; ?>"><?php echo $user['status'] == '1' ? "Active" : "Inactive"; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
            <div class="col-md-6 ">
                <div class="info-view">
                    <h5 class="heading"><span><i class="fa fa-unlock" aria-hidden="true"></i> </span><b>Account Access </b></h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>
                                    Account Created
                                </th>
                                <td> <font class="colon">: &nbsp;</font><i class="fa fa-calendar"></i>
                                    <?php echo change_date_format($user['created'], 'd M Y, H:i') ? change_date_format($user['created'], 'd M Y, H:i') : "NA"; ?><br>
                                </td>
                            </tr>
                            <tr>
                                <th> 
                                    Account Updated
                                </th>
                                <td> <font class="colon">: &nbsp;</font><i class="fa fa-calendar"></i>
                                    <?php echo change_date_format($user['updated'], 'd M Y, H:i') ? change_date_format($user['updated'], 'd M Y, H:i') : "NA"; ?><br>
                                </td>
                            </tr>
                            <tr>
                                <th> 
                                    Last Login
                                </th>
                                <td> <font class="colon">: &nbsp;</font><i class="fa fa-calendar"></i>
                                    <?php echo change_date_format($user['last_login'], 'd M Y, H:i') ? change_date_format($user['last_login'], 'd M Y, H:i') : "NA"; ?><br>
                                </td>
                            </tr>
                            <tr>
                                <th> 
                                    Last Login IP :
                                </th>
                                <td> <font class="colon">: &nbsp;</font>
                                    <?php echo $user['ip_address'] ? $user['ip_address'] : "NA"; ?><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="table-responsive">
            <div class="panel-heading colum">
                <i class="fa fa-list"></i> Plan History
            </div>
            <br>
            <div class="col-md-12">
           
                <div class="adv-table" id="tab1">
                <table id="datatable_example" class="table-bordered responsive table table-striped table-hover">
            <thead class="thead_color">
                <tr>
                    <th># </th>
                    <th>Name</th>
                    <th>Eamil</th>
                    <th>Transaction Id</th>
                    <th>Total AMT.</th>
                    <th>Status</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0;
            if(!empty($orders)):
                 foreach($orders as $h) { 
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i.".";?> </td>
                        <td><a href="<?php echo site_url("backend/users/profile/").$h->user_id; ?>"><?php echo ucfirst($h->full_name) ?></a></td>
                        <td><?php echo $h->email; ?></td>
                        <td><?php echo $h->order_id; ?></td>
                        <td><i class="fa fa-dollar"><?php echo number_format($h->subtotal,2); ?></td>
                        <td><?= ($h->status==1)?  'New' : 'Completed'; ?></td>
                        <td><?php echo $h->order_date; ?></td>
                    </tr>
                    <?php
            }
                else: ?>
                    <tr>
                        <th colspan="9">
                            <!-- <center>No plan history available</center> -->
                            <center>
                            <p class="table-error-msg">No Orders available</p>
                            </center>
                        </th>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
                </div>
            </div>
        </div>

   
    </div>
    <div class="clearfix"></div>
</section>