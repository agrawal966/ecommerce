<div class="bread_parent">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('backend/superadmin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
        <li><a href="<?php echo base_url('backend/product/index'); ?>">Product </a></li>
        <li><b>Update Product</b> </li>
    </ul>
</div>
<div class="panel-body">
    <form role="form" id="productAddForm" class="form-horizontal tasi-form" action="<?php echo current_url()?>" enctype="multipart/form-data" method="post">
        <div class="form-body">
            <header class="panel-heading colum"><i class="fa fa-angle-double-right"></i>Product  Information :</header>
            <br>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Name <span class="mandatory">*</span></label>
                <div class="col-md-10">
                    <input type="text" placeholder="Product Name"  class="form-control" name="product_name" data-bvalidator="required" data-bvalidator-msg="Please Enter Product Name" value="<?php if (set_value('product_name')) echo set_value('product_name'); elseif(!empty($product->product_name)) echo $product->product_name ;?>"><?php echo form_error('product_name'); ?>
                </div>
            </div>
        
            
            <div class="form-group">
                <label class="col-md-2 control-label">Price <span class="mandatory">*</span></label>
                <div class="col-md-10">
                    <input type="text" data-bvalidator="required,number" data-bvalidator-msg="Please Enter Product Price" placeholder="Price" class="form-control" name="price" value="<?php if(set_value('price')) echo set_value('price');  elseif(!empty($product->price)) echo $product->price;?>"> 
                    <?php echo form_error('price'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Image </label>
                <div class="col-lg-10">
                <?php if($product->product_image){?>              
                    <div class="col-lg-3"> 
                        <div style="width: 100px;" class="fileupload-new thumbnail">
                            <img alt="" src="<?php echo base_url().$product->product_image;?>"> 
                        </div>    
                        <a href="javascript:void(0);" onclick="return confirmBox('Do you want to delete it ?','<?php echo base_url().'backend/product/product_image_delete/'.$product->product_id ?>')" class="btn btn-sm btn-danger btn-round tooltips" rel="tooltip" data-placement="top" data-original-title="Delete  <?php //echo ucwords($row->name); ?>" onclick="if(confirm('Do you want to delete it ?')){return true;} else {return false;}">Remove Product 
                        </a>
                                    
                    </div>
                <?php } ?>
                <div class="col-lg-6"> 
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                            <img src="<?= base_url('assets/backend/image/default_image1.png') ?>" data-src="holder.js/100%x100%" alt="...">
                        </div>
                        <div>
                          <span class="btn btn-primary btn-xs btn-file"><span class="fileinput-new">Update image</span><span class="fileinput-exists">Change</span><input type="file" name="product_img"></span>
                          <a href="#" class="btn btn-danger fileinput-exists btn-xs" data-dismiss="fileinput">Remove</a>
                        </div>                     
                    </div>
                    <?php echo form_error('product_img'); ?>                  
                 </div>
              </div>
            </div> 
            <div class="form-group">
                <label class="col-md-2 control-label">Description <span class="mandatory">*</span></label>
                <div class="col-md-10">
                    <textarea data-bvalidator="required,max[500]" data-bvalidator-msg="Please Enter Description" placeholder="Description" class="form-control" name="description"><?php if(set_value('description')) echo set_value('description'); elseif(!empty($product->description)) echo $product->description?></textarea> 
                    <?php echo form_error('description'); ?>
                </div>
            </div>
        </div>
        <div class="form-actions fluid form-btn-block">
            <div class="col-md-offset-2 col-md-10">
                <button  class="btn btn-primary" type="submit">Update</button>&nbsp;&nbsp;
                <a class="btn btn-danger" href="<?php echo base_url()?>backend/product/index"><i class="icon-remove"></i> Back
                </a>                              
            </div>
        </div>
    </form>
    <!-- END FORM--> 
</div>