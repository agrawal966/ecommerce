
	<div class="container">
    <br><br>
		<div class="row">
            <?php if($this->session->flashdata('msg_error')):	
                echo '<p style="color:red;">'.$this->session->flashdata('msg_error').'</p>';
            endif; ?>
            <h2>Your Cart</h2>
            <?php if ($this->cart->total_items()) { ?>
            <table class="table table-bordered">
                            <tr>
                                <th width="5%">Sr.</th>
                                <th width="30%">Product Name</th>
                                <th width="10%">Image</th>
                                <th width="15%">Price</th>
                                <th width="20%">Quantity</th>
                                <th width="15%">Total Price</th>
                                <th width="5%">Remove</th>
                            </tr>     
                        <?php
                        $i = 0;
                        
                        foreach ($cart_contents as $cart_items) {
                            $i++;
                            ?>
                           
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cart_items['name'] ?></td>
                                <td><img src="<?php echo base_url('uploads/' . $cart_items['options']['product_image']) ?>" alt=""/></td>
                                <td>$ <?php echo $this->cart->format_number($cart_items['price']) ?></td>
                                <td>
                                    <form action="<?php echo base_url('cart/update_cart'); ?>" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $cart_items['id'] ?>"/>
                                        <input type="number" name="qty" value="<?php echo $cart_items['qty'] ?>"/>
                                        <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                        <input type="submit" name="submit" value="Update"/>
                                    </form>
                                </td>
                                <td>$ <?php echo $this->cart->format_number($cart_items['subtotal']) ?></td>
                                <td><a href="<?php echo base_url('cart/remove_cart/'.$cart_items['rowid'] ); ?>" >Remove</a>
                                  
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="4"></th>
                                <th>Sub Total : </th>
                                <td>$ <?php echo $this->cart->format_number($this->cart->total()) ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th colspan="4"></th>
                                <th>Grand Total :</th>
                                <td>$ <?php echo $this->cart->format_number($this->cart->total()); ?> </td>
                                <td></td>
                            </tr>
                            </table>
                          
                        <?php
                            } else {
                                echo "<div class='col-md-12'><h3>Your Cart Empty</h3></div>";
                            }
                            ?>

            </table>
                <div class="cart-page-warp col-md-12">
                <div class="pull-left text-left btn-containt-block col-md-6" style="width:50%;float:left;">
                        <div class="form-group">
                            <a href="<?= base_url(); ?>" class="btn btn-warning">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="pull-right text-right btn-containt-block col-md-6" style="width: 50%;float:right;
">
                        <a class="btn btn-primary" href="<?= base_url('cart/order'); ?>"> Checkout</a>
                    </div>
                    
                <div class="clearfix"></div>
      
            </div>
			
			
        </div>
	</div>
