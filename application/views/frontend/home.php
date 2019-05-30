<section class="seo-service">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="heading "><b class="text-orange">Products</b></h2>
			</div>
			<?php if(!empty($products)){
			foreach($products as $key=>$value){		
			?>
			<div class="col-sm-4 ">
				<div class="product-item">
					<div class="image">
					<a href="<?= base_url('page/product/'.$value->product_id) ?>"><img src="<?php echo base_url($value->product_image); ?>" class="img responsive" /></a>
					</div>
					<hr>
					<a href="<?= base_url('page/product/'.$value->product_id) ?>"><p class="service-text"><?= $value->product_name ?></p></a>
					<h4>$<?= number_format($value->price,2) ?></h4> <a class="btn btn-primary" 	href="<?= base_url('page/product/'.$value->product_id) ?>" >Add to Cart</a>
				</div>	
			</div>
			<?php } }else{
				echo '<h3>No Product Available.</h3>';
			} ?>	
		</div>
	</div>
</section>

	