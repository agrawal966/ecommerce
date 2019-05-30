<section class="login-section">
    <div class="login-section-wrap">
        <div class="row align-items-center">
         
            <div class="col-md-12 login-form-wrap">
                <div class="login-form-block mx-auto">
                    <?php if ($this->session->flashdata('sign_up_msg_error')) { ?>
                    <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $this->session->flashdata('sign_up_msg_error') ?> </div>
                    <?php } ?>    
                    <h4 class="mb-3 form-heading"><span>Sign Up</span></h4>
                    <form method="POST" action="<?=current_url()?>" class="needs-validation" id="sign_up_form" data-bvalidator-validate>
                        <div class="mb-3">
                            <!-- <label for="">Full Name</label> -->
                            <input type="text" maxlength="50" class="form-control" data-bvalidator-msg="Please Enter Full Name" value="<?php echo set_value('full_name'); ?>"  data-bvalidator="required" name="full_name" id="full_Name" placeholder="Full Name">
                            <?php echo form_error('full_name'); ?>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="email">Email</label> -->
                            <input type="email" value="<?php echo set_value('email'); ?>" class="form-control" name="email" data-bvalidator-msg="Please Enter Valid Email" data-bvalidator="email,required" id="email" placeholder="Email">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="mb-3">
                            <input type="password" value="<?php echo set_value('password'); ?>"" id="new_password" name="password" class="form-control" data-bvalidator="required" data-bvalidator-msg="Please Enter Password."  placeholder="Password">
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="mb-3">
                            <input type="password" value="<?php echo set_value('confirm_password'); ?>"  class="form-control" name="confirm_password" data-bvalidator="required" data-bvalidator-msg="Please Enter Confirm Password  same as password" id="ConfirmPassword" placeholder="Confirm Password">
                            <?php echo form_error('confirm_password'); ?>
                        </div>
                        <button class="btn btn-block mt-3 btn-lg blue-button" type="submit">Sign Up</button>
                        <p class="sign-up-button  text-center">If you already have an account <a href="<?php echo base_url("login"); ?>" class="text-orange">Click here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sign_up_form').bValidator();
    });
    
    $("#sign_up_form").submit(function () {
        if($('#sign_up_form').data('bValidator').isValid()){
            $(".loader-wrap").show();
        }
    });
    
</script>