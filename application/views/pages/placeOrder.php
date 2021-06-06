<?php if (!empty($placeOrderData)) { ?>
	<div class="alert alert-success" role="alert" style="width: 80%;margin-left: 10%;margin-top: 5%">
		<h4 class="alert-heading">Thank you!</h4>
		<h5 class="alert-heading">Your order has been placed</h5>
		<p>Customer Address:- <?php echo $placeOrderData['address']; ?><br>
			Customer Contact Number:- <?php echo $placeOrderData['number']; ?>
		</p>
		<hr>
		<p class="mb-0">
			Ordered Time: <?php echo $placeOrderData['orderTime']; ?><br>
		<hr>
		Deliver Time: <?php echo $placeOrderData['deliverTime']; ?>
		</p>
	</div>
<?php } else { ?>
	<div class="alert alert-warning" role="alert" style="width: 50%;height: 100px;margin-left: 10%;margin-top: 5%">
		<h4 class="alert-heading" style="margin-top: 3%">Sorry! You haven't place an order yet.</h4>
	</div>
<?php } ?>
