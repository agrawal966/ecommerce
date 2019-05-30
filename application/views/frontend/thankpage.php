
	<div class="container">
    <br><br>
		<div class="row">
           <h2 class="text-center col-md-12"> Congratulations! Your order has been placed successfully.</h2>
            <div class="col-md-12 text-center">
            <p><b>Order Id:</b> <?=$order_info->order_id?></p><br>
            <p><b>Order Date:</b> <?=$order_info->order_date?></p><br>
            <p><b>Total Amt.:</b> $<?=$order_info->subtotal?></p><br>
            <a href="<?= base_url(); ?>">Back To home</a>
        </div>
        </div>
    </div>