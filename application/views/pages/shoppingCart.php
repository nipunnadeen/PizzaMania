<table class="table">
	<thead>
	<tr>
		<th>Product</th>
		<th>Product Description</th>
		<th>Quantity</th>
		<th>Item Price</th>
		<th>Sub Total</th>
		<th></th>
	</tr>
	</thead>
	<?php foreach ($cartDetails as $item): ?>
		<?php if ($cartDetails['cartTotal'] !== 0) { ?>
			<?php if (!empty($item['name'])) { ?>
				<tr>
					<td><?php echo $item['name']; ?></td>
					<td style="width: 80px;">
						<?php if (!empty($item['size'])) { ?>
							Size : <?php echo $item['size']; ?><br>
							Toppings :
							<?php foreach ($item['topping'] as $option): ?>
								<?php echo $option; ?>,
							<?php endforeach; ?>
						<?php } ?>
					</td>
					<?php echo form_open('increaseQty'); ?>
					<td>
						<input type="number" name="qty" class="form-control quantity"
							   style="width: 20%;"
							   min="1" value='<?php echo $item['qty']; ?>'/>
						<input type="hidden" name="uuid" class="form-control quantity"
							   value='<?php echo $item['uuid']; ?>'/>
						<button type="submit" name="increaseQty" class="btn btn-outline-primary"
								style="width: 20%;margin-left: 25%;margin-top: -38px">Edit
						</button>
					</td>
					<?php echo form_close(); ?>
					<td>Rs. <?php echo $item['price']; ?></td>
					<td>Rs. <?php echo $item['subtotal']; ?></td>
					<?php echo form_open('removeItem'); ?>
					<td>
						<button type="submit" name="remove" class="btn btn-outline-danger"
								value='<?php echo $item['uuid']; ?>'>Remove
						</button>
					</td>
					<?php echo form_close(); ?>
				</tr>
			<?php } ?>
		<?php } else { ?>
			<tr>
				<td colspan="2"></td>
				<td class="right">
					<h3 style="margin-top: 50px;width: 50%"><strong>The Cart is empty</strong></h3>
				</td>
			</tr>
		<?php } ?>
	<?php endforeach; ?>

	<tr>
		<?php if ($cartDetails['cartTotal'] !== 0) { ?>
			<td colspan="2"></td>
			<td class="right"><strong>Grand
					Total: </strong>Rs. <?php echo $cartDetails['cartTotal']; ?></td>
			<?php echo form_open('clearCart'); ?>
			<td>
				<button type="submit" name="remove" class="btn btn-danger btn-xs remove_inventory" style="width:100px ">
					Clear Cart
				</button>
			</td>
			<?php echo form_close(); ?>
			<td>
				<button type="submit" name="checkout" class="btn btn-success add_cart" data-toggle="modal"
						data-target="#checkoutModal" style="margin-right: 50%">Checkout
				</button>
			</td>
		<?php } ?>
	</tr>
</table>

<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">New message</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button>
			</div>
			<?php echo form_open('placeOrder'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Address</label>
					<input type="text" name="address" class="form-control" id="address" required>
				</div>
				<div class="form-group">
					<label for="message-text" class="col-form-label">Phone Number</label>
					<input type="number" name="number" class="form-control" id="phoneNumber" required>
				</div>

			</div>
			<div class="modal-footer">
				<input type="hidden" name="orderTime" id="orderTime">
				<input type="hidden" name="deliverTime" id="deliverTime">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="placeOrder">Place the Order</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script>
	$('#checkoutModal').on('show.bs.modal', function (event) {
	})

	let submitButton = $("#placeOrder");
	submitButton.click(function () {
		if ($("#phoneNumber").val() !== "" && $("#address").val() !== "") {
			let object = new Date();
			let hours = object.getHours();
			let timeType = hours >= 12 ? 'pm' : 'am';
			document.getElementById("orderTime").value = object.getHours() + ':' + object.getMinutes() + ':' +
					object.getSeconds() + " " + timeType;
			object.setMinutes(object.getMinutes() + 30);
			document.getElementById("deliverTime").value = object.getHours() + ':' + object.getMinutes() + ':' +
					object.getSeconds() + " " + timeType;
		}
	});
</script>
