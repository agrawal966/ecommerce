<section class="login-section">
    <div class="login-section-wrap">
        <div class="row align-items-center">
          
            <div class="col-md-12 login-form-wrap">
                <div class="login-form-block mx-auto">
                    <?php if ($this->session->flashdata('msg_success')) { ?> 
                    <div class="alert alert-success">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $this->session->flashdata('msg_success') ?> </div>
                    <?php } ?>  
                    <?php if ($this->session->flashdata('msg_error')) { ?> 
                    <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $this->session->flashdata('msg_error') ?> </div>
                    <?php } ?>  
                    <h4 class="mb-3 form-heading"><span>Log In</span></h4>
                    <form action="<?=current_url()?>" method="POST" class="needs-validation" id="login_form" novalidate="">
                        <div class="mb-3">
                            <!--  <label for="email">Email </label> -->
                            <input type="email" value="<?php echo set_value('email'); ?>" name="email" data-bvalidator-msg="Please Enter Valid Email" data-bvalidator="email,required" class="form-control" id="email" placeholder="Email">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="mb-3">
                            <!--  <label for="email">Password</label> -->
                            <input type="password" value="<?php echo set_value('password'); ?>" name="password" data-bvalidator-msg="Please Enter Your password" data-bvalidator="required" class="form-control" id="password" placeholder="Password">
                            <?php echo form_error('password'); ?>
                        </div>
                       
                        <button class="btn btn-block mt-3 btn-lg blue-button" type="submit">Login</button>
                        <p class="sign-up-button  text-center">If you don't have an account <a href="<?php echo base_url("sign_up"); ?>" class="text-orange">Click here</a></p>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#login_form').bValidator();
    });
    
</script>