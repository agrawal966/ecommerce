<div class="bread_parent">
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url('backend/superadmin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
      <li><a href="<?php echo base_url('backend/product/index'); ?>">Product </a></li>
      <li><b>Add Product</b> </li>
   </ul>
</div>
<div class="panel-body">
   <form role="form" id="productAddForm" class="form-horizontal tasi-form form-section-admin" action="<?php echo current_url()?>" enctype="multipart/form-data" method="post">
      <div class="form-body">
         <header class="panel-heading colum"><i class="fa fa-angle-double-right"></i>Product  Information :</header>
         <br>
         <div class="form-group">
            <label class="col-md-2 control-label">Product Name <span class="mandatory">*</span></label>
            <div class="col-md-10">
               <input type="text" placeholder="Product Title"  class="form-control" name="product_name" data-bvalidator="required" data-bvalidator-msg="Please Enter Product Name" value="<?php echo set_value('product_name');?>"><?php echo form_error('product_name'); ?>
            </div>
         </div>

         <div class="form-group">
            <label class="col-md-2 control-label">Price <span class="mandatory">*</span></label>
            <div class="col-md-10">
               <input type="text" data-bvalidator="min[0],number,required" data-bvalidator-msg="Numeric Product .Price required and cannot be negative" placeholder="Price" class="form-control" name="price" value="<?php echo set_value('price');?>"> 
               <?php echo form_error('price'); ?>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Product Image <span class="mandatory">*</span></label>
            <div class="col-lg-10">
               <div class="fileinput  fileinput-new" data-provides="fileinput">
                  <div class="fileinput-preview thumbnail" data-trigger="fileinput">                     
                     <img src="<?php echo base_url('assets/backend/image/default_image1.png') ?>" data-src="holder.js/100%x100%" alt="...">
                  </div>
                  <div>
                     <span class="btn btn-primary btn-file btn-xs"><span class="fileinput-new">Select image</span>
                     <span class="fileinput-exists">Change</span>
                     <input type="file" name="product_img"></span>
                     <a href="#" class="btn btn-danger fileinput-exists btn-xs" data-dismiss="fileinput">Remove</a>
                  </div>
               </div>
               <?php echo form_error('product_img'); ?>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Description <span class="mandatory">*</span></label>
            <div class="col-md-10">
               <textarea data-bvalidator="required" data-bvalidator-msg="Please Enter Product Description" placeholder="Product Description" class="form-control" name="description"> <?php echo set_value('description');?> </textarea> 
               <?php echo form_error('description'); ?>
            </div>
         </div>
      </div>
      <div class="form-actions fluid form-btn-block">
         <div class="col-md-offset-2 col-md-10">
            <button  class="btn btn-primary" type="submit"><i class="icon-plus"></i> Submit</button>&nbsp;&nbsp;
            <a class="btn btn-danger" href="<?php echo base_url()?>backend/product/index"><i class="icon-remove"></i> Back
            </a>                              
         </div>
      </div>
   </form>
   <!-- END FORM--> 
</div>

<script>
    $(document).ready(function () {
        $('#productAddForm').bValidator();
    });




</script>