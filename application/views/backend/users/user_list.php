<div class="bread_parent">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('backend/superadmin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
            <li>Manage Users</li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<div class="panel-body no-padding-top">
    <header class="tabel-head-section">
        <form action="<?php echo base_url('backend/users/index') ?>" method="get" role="form" class="form-horizontal">
            <div class="no-padding-top">
                <table class="responsive table_head" cellpadding="5">
                    <thead>
                        <tr>
                            <th width="20%">Username</th>
                            <th width="20%">Email</th>
                            <th width="20%">Sort By</th>
                            <th width="20%">Status</th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="">
                                    <input type="text" name="full_name" placeholder="Username" value="<?php if(isset($_GET['full_name']))echo trim($_GET['full_name']);?>" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <input type="text" name="email" placeholder="Email" value="<?php if(isset($_GET['email']))echo trim($_GET['email']);?>" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <select name="order" class="form-control">
                                        <option value="DESC" <?php if(!empty($_GET['order']) && $_GET['order']=='DESC') echo 'selected'; ?>>Sort by New</option>
                                        <option value="ASC" <?php if(!empty($_GET['order']) && $_GET['order']=='ASC') echo 'selected'; ?>>Sort by Old</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <select name="status" class="form-control">
                                        <option value="" <?php if($this->input->get('status')=='') echo 'selected'; ?>>--Select--</option>
                                        <option value="1" <?php if($this->input->get('status')=='1') echo 'selected'; ?>>Active</option>
                                        <option value="0" <?php if($this->input->get('status')=='0') echo 'selected'; ?>>Inactive</option>
                                    </select>
                                </div>
                            </td>
                            <td width="300"> 
                                <button type="submit" class="btn btn-primary tooltips" rel="tooltip" data-placement="top" data-original-title="Search" type="submit"><i class="icon icon-search"></i></button>
                                <a class="btn btn-danger tooltips" rel="tooltip" data-placement="top" data-original-title="Reset your search" href="<?php echo base_url('backend/users'); ?>"> <i class="icon icon-refresh"></i></a>
                                
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
                    <th class="jv no_sort" width="10%">
                        <div class="col-md-12 no-padding-left">
                            <span class="checkboxli term-check">
                            <input type="checkbox" id="checkAll" class="" >
                            <label class="" for="checkAll"></label>
                            </span>
                            <select class="form-control commonstatus order-select-status" >
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th width="7%">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
           	if(!empty($users)):
       		$i=0; foreach($users as $row){ $i++;
    			?>
                <tr>
                    <td>
                        <span class="checkboxli term-check">
                        <input type="checkbox" id="checkall<?php echo $i ?>" name="checkstatus[]" value="<?php echo $row->id; ?>">  &nbsp;&nbsp; <?php echo $offset+$i.".";?>
                        <label class="" for="checkall<?php echo $i ?>">
                        </label>
                        </span>
                    </td>
                    <td><a href="<?php echo site_url("backend/users/profile/").$row->id; ?>"><?php echo $row->full_name ?></a></td>
                    <td><?php echo $row->email ?></td>
                    <td><?php echo $row->contact_no ? $row->contact_no : "NA"; ?></td>
                    <td class="text-center"><a href="javascript:;" class="change_status btn <?php echo $row->status == '1' ? "btn-success Active" : "btn-danger Inactive"; ?>" data-id="<?php echo $row->id; ?>" data-status="<?php echo $row->status == '1' ? "0" : "1"; ?>"><?php echo $row->status == '1' ? "Active" : "Inactive"; ?></a></td>
                    <td class="text-center">
                   
                        <a href="<?php echo site_url("backend/users/profile/").$row->id; ?>" class="btn btn-primary btn-xs tooltips" rel="tooltip" data-placement="top" data-original-title="View User Details"><i class="fa fa-eye"></i> </a>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            <?php else: ?>
                <tr>
                    <th colspan="9">
                        <center><!-- No User Found. -->
                            <p class="table-error-msg">Your search did not match any records.<br>
Suggestions:<br>
Make sure that username is present or you have seen before.<br>
Make sure that all words are spelled correctly.<br>
Try to search by status.<br>
Try to search by newer,older</p>
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
<script>
    $("#tab1 #checkAll").click(function () {
        if ($("#tab1 #checkAll").is(':checked')) {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    jQuery(document).ready(function($) {
       	$('body').find('#tab1').on('change','.commonstatus', function(event) {      
          	var row_id = [];
          	var new_status = $(this).val();
           	if(new_status == 1){
            	var action_name = 'Active';
           	}else if(new_status == 0){
            	var action_name = 'Inactive';
           	}else{
             	return false;
           	}
           	if(new_status != '') {

	          	if($("input:checkbox[name='checkstatus[]']").is(':checked')){
	             	swal({
	                 	title: "Do you want to "+action_name+" it!",
	                 	type: "warning",
	                 	padding: 0,
	                 	showCloseButton: true,
	                 	showCancelButton: true,
	                 	focusConfirm: false,
	                 	background: '#f1f1f1',
	                 	buttonsStyling: false,
	                 	confirmButtonClass: 'btn btn-confirm',
	                 	cancelButtonClass: 'btn btn-cancle',
	                 	confirmButtonText: 'Ok',
	                 	cancelButtonText: 'Cancel',
	                 	animation: false
	             	}, function() {
	                   	$("input[type='checkbox']:checked").each(function() {
	                      	if($(this).val() != 'on'){
	                         	row_id.push($(this).val());
	                      	}
	                   	});   
	    
	    				$.ajax({
	    					type: "POST",
	    					url: "<?php echo base_url() ?>backend/pages/change_all_status",
	    					data : "table=user&statusData="+new_status+"&data="+row_id.join(),
	    					success: function(result){
					        	if(result.status==true){  
		                         	window.location.reload(true);
		                      	}else{       
		                         	window.location.reload(true);
		                         	return false;
		                      	}
					    	}
					    });
	             	});
	          	}else{
	             	errorMsg('Please check the checkbox');
	             	return false;
	          	}
	        }
       	});
    });

    $("body").on('click', '.change_status', function () {
        var this_context = $(this);
        var new_status = $(this).data('status');
        if(new_status == 1){
            var action_name = 'Active';
        }else if(new_status == 0){
            var action_name = 'Inactive';
        }else{
            return false;
        }
        var id = $(this).data('id');

            swal({
                title: "Do you want to "+action_name+" it!",
                type: "warning",
                padding: 0,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                background: '#f1f1f1',
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-confirm',
                cancelButtonClass: 'btn btn-cancle',
                confirmButtonText: 'Ok',
                cancelButtonText: 'Cancel',
                animation: false
            }, function() {

                $.ajax({
                    context: this_context,
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo base_url() ?>backend/users/change_status",
                    data : "id="+id+"&status="+new_status,
                    success: function(result){
                        $(this).html(result.status_name);
                        $(this).data('status', result.status);
                        $(this).removeClass(result.removeClass).addClass(result.addClass);
                    }
                });
            });
        //}
    });
</script>
<!-- <style type="text/css">
    .Active, .Active:focus{
        color: green !important;
    }
    .Inactive, .Active:focus{
        color: red !important;
    }
</style> -->
<!-- <style type="text/css">
    .tabel-head-section .btn{
        padding: 6px 7px;
    }
</style> -->
<style type="text/css">
    .table-error-msg{
        color: red;
        line-height: 24px;
    }
</style>