<div class="bread_parent">
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url('backend/superadmin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
    <li>My Profile</li>    
  </ul>
</div>

<div class="panel-body">
   <div class="">
      <form role="form" method="post" class="form-horizontal" action="<?php echo current_url()?>">
      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
     
         <div class="form-body label-static">
            <div class="col-md-10 center-block">
               <div class="form-group">
                  <label class="control-label col-md-4">Full Name<span class="mandatory">*</span> </label>
                  <div class="col-md-5">
                     <input type="text" placeholder="Full Name" class="form-control" name="fullname" value="<?php if(!empty($user->full_name)) echo $user->full_name ; ?>" data-bvalidator="required,alpha" data-bvalidator-msg="Full name is required and must be alphabate only"><?php echo form_error('fullname'); ?>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-4">Email Address<span class="mandatory">*</span> </label>
                  <div class="col-md-5">
                     <input type="email" readonly placeholder="Email Address" readonly class="form-control" name="email" value="<?php if(!empty($user->email)) echo $user->email;?>" data-bvalidator="required,email" data-bvalidator-msg="Valid email-address is required"><?php echo form_error('email'); ?>
                  </div>
               </div>               
            </div>
            <div class="clearfix"></div>
            <div class="form-btn-block">
               <div class="col-md-10 center-block">
                  <div class="form-group text-center">
                     <button class="btn btn-primary" type="submit"><i class="icon-repeat"></i> Update Profile</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>