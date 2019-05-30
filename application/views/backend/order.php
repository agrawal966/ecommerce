<div class="bread_parent">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('backend/superadmin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
            <li>Oreders</li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-body no-padding-top">
    <header class="tabel-head-section">
        <form role="form" class="form-horizontal">
            <div class="no-padding-top">
                <table class="responsive table_head" cellpadding="5">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Transaction ID</th>
                          
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="">                
                                    <input type="text" name="full_name" placeholder="Name" value="<?php if(isset($_GET['full_name'])) echo trim($_GET['full_name']); ?>" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="">                
                                    <input type="text" name="txn_id" placeholder="Transaction ID" value="<?php if(isset($_GET['txn_id']))echo trim($_GET['txn_id']);?>" class="form-control">
                                </div>
                            </td>
                        
                            <td width="110"> 
                                <button class="btn btn-primary tooltips" rel="tooltip" data-placement="top" data-original-title="Search" type="submit"><i class="icon icon-search"></i></button>
                                <a class="btn btn-danger tooltips" rel="tooltip" data-placement="top" data-original-title="Reset your search" type="submit" href="<?php echo base_url('backend/order'); ?>"> <i class="icon icon-refresh"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </header>
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
                        <td><?php echo $offset+$i.".";?> </td>
                        <td><a href="<?php echo site_url("backend/users/profile/").$h->user_id; ?>"><?php echo ucfirst($h->full_name) ?></a></td>
                        <td><?php echo $h->email; ?></td>
                        <td><?php echo $h->order_id; ?></td>
                        <td><i class="fa fa-dollar"><?php echo number_format($h->subtotal,2); ?></td>
                        <td><?= ($h->status==1)?  'New' : 'Completed'; ?></td>
                        <td><?php echo change_date_format($h->order_date); ?></td>
                    </tr>
                    <?php
            }
                else: ?>
                    <tr>
                        <th colspan="9">
                            <!-- <center>No plan history available</center> -->
                            <center>
                            <p class="table-error-msg">Your search did not match any records.<br>
                                Suggestions:<br>
                                Make sure that username is present or you have seen before.<br>
                                Make sure that all words are spelled correctly.</p>
                            </center>
                        </th>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="row-fluid  control-group mt15">
            <div class="span12 pull-right">
                <?php if(!empty($pagination))  echo $pagination;?>
            </div>
        </div>
    </div>
    <!-- End .content -->
</div>
