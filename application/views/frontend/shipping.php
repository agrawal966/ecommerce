<section class="login-section">
    <div class="login-section-wrap">
        <div class="row align-items-center">
         
            <div class="col-md-12 login-form-wrap">
                <div class="login-form-block mx-auto">
                    <?php if ($this->session->flashdata('msg_error')) { ?>
                    <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $this->session->flashdata('msg_error') ?> </div>
                    <?php } ?>    
                    <h4 class="mb-3 form-heading"><span>Shipping Details</span></h4>
                    <form method="POST" action="<?=base_url('cart/order_place')?>" class="needs-validation" id="Shipping" data-bvalidator-validate>
                        <div class="mb-3">
                            <!-- <label for="">Full Name</label> -->
                            <input type="text" maxlength="50" class="form-control" data-bvalidator-msg="Please Enter Full Name" value="<?php if (set_value('full_name')) echo set_value('full_name'); elseif(!empty($user_info->full_name)) echo $user_info->full_name ;?>"  data-bvalidator="required" name="full_name" id="full_Name" placeholder="Full Name">
                            <?php echo form_error('full_name'); ?>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="email">Email</label> -->
                            <input type="email" value="<?php if (set_value('email')) echo set_value('email'); elseif(!empty($user_info->email)) echo $user_info->email ;?>" class="form-control" name="email" data-bvalidator-msg="Please Enter Valid Email" data-bvalidator="email,required" id="email" placeholder="Email">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="mb-3">
                            <input type="address" value="<?php echo set_value('address'); ?>"" id="address" name="address" class="form-control" data-bvalidator="required" data-bvalidator-msg="Please Enter address."  placeholder="Address">
                            <?php echo form_error('address'); ?>
                        </div>
                  
                        <button class="btn btn-block mt-3 btn-lg blue-button" type="submit">Place Order</button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#Shipping').bValidator();
    });
    
    $("#Shipping").submit(function () {
        if($('#Shipping').data('bValidator').isValid()){
            $(".loader-wrap").show();
        }
    });
    
</script>