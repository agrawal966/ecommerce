<div class="bread_parent">
    <div class="col-md-9">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('backend/superadmin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
            <li>Product</li>
        </ul>
    </div>
     <div class="col-md-3">
        <div class="btn-group pull-right">
           <a class="btn btn-primary tooltips" href="<?php echo base_url()?>backend/product/add_product" rel="tooltip" data-placement="top" data-original-title=" Click to add new "><i class="icon-plus"></i> Add New Product
            </a>
        </div>
    </div> 
    <div class="clearfix"></div>
</div>
<div class="panel-body no-padding-top">
     <div class="adv-table" id="tab1">
        <table id="datatable_example" class="table-bordered responsive table table-striped table-hover">
            <thead class="thead_color">
                <tr>
                    <th class="jv no_sort" width="5%">#</th>
                    <th>Product Name</th>
                   
                    <th>Sale Price</th>
                    <th>Description</th>
                    <th width="7%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   if(!empty($product)):
                   $i=0; foreach($product as $row){ $i++;
                ?>
                <tr>
                    <td><?php echo $i.".";?></td>
                    <td><?php echo ucfirst($row->product_name); ?></td>
                 
                    <td><i class="fa fa-dollar"><?php echo $row->price ?></td>
                    <td><?php echo $row->description ?></td>
                    <td>
                        <a href="<?php echo base_url().'backend/product/edit_product/'.$row->product_id?>" class="btn btn-primary btn-xs tooltips" rel="tooltip" data-placement="top" data-original-title=" Edit <?php //echo ucwords($row->name); ?>"><i class="icon-pencil"></i>
                        </a>
                        <a href="javascript:void(0);" onclick="return confirmBox('Do you want to delete it ?','<?php echo base_url().'backend/common/delete/product/product_id/'.$row->product_id?>')" class="btn btn-danger btn-xs tooltips" rel="tooltip" data-placement="top" data-original-title="Delete  <?php //echo ucwords($row->name); ?>" onclick="if(confirm('Do you want to delete it ?')){return true;} else {return false;}"><i class="icon-trash "></i> 
                        </a>
                    </td>
                </tr>
                <?php } ?>
                <?php else: ?>
                <tr>
                    <th colspan="9">
                        <center>No matching records found</center>
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