
	<div class="container">
    <br><br>
		<div class="row">
			<div class="col-sm-4">
				<div class="image">
				<a href="<?= base_url('page/product/'.$result->product_id) ?>"><img src="<?php echo base_url($result->product_image); ?>" class="img responsive" /></a>
				</div>
				
            </div>
            <div class="col-md-8">
                  <h2><?= $result->product_name ?></h2><br>
                  <h4>$<?= number_format($result->price,2) ?></h4>
                  <form action="<?= base_url('cart/addtocart') ?>" id="add_to_cart" method="post" class="form-inline">
                    <div class="form-group">
                        <input type="hidden" name="product_id" id="product_id" value="<?= $result->product_id ?>" >
                        <input type="number" placeholder="Quanity" class="form-control col-md-5" name="quantity" value="1" data-bvalidator="min[0],number,required" data-bvalidator-msg="Quanity is  required"><?php echo form_error('quantity'); ?>
                        <div class="col-md-2"></div>
                        <button  class="btn btn-primary col-md-5" type="submit">Buy Now</button>
                    </div>
                    
                  </form>  
                  <?php if($this->session->flashdata('msg_error')):	
                   echo '<p style="color:red;">'.$this->session->flashdata('msg_error').'</p>';
                   endif; ?>
                  
            </div>
			
        </div>
        <div><?= $result->description ?></div>
	</div>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#add_to_cart').bValidator();
    });
    
</script>
	