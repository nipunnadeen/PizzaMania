<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<img src="../assets/images/pizzas/<?php echo $pizzaDetails['imageUrl']; ?>"
					 class="card-img-top" alt="..." style="height: 100%;width: 100%">
				<div class="card-body">
					<h5 class="card-title"><?php echo $pizzaDetails['name']; ?></h5>
					<p class="card-text"><?php echo $pizzaDetails['description']; ?></p>
					<p id="totalPrice"></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<?php echo form_open('addCustomizePizza'); ?>
			<div class="accordion" id="accordionExample">
				<input type="hidden" name="productId" value='<?php echo $pizzaDetails['id']; ?>'>
				<input type="hidden" name="productName" value='<?php echo $pizzaDetails['name']; ?>'>
				<div class="card">
					<div class="card-header" id="headingOne">
						<h2 class="mb-0">
							<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
									data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								Select the Pizza Size
							</button>
						</h2>
					</div>
					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
						 data-parent="#accordionExample">
						<div class="card-body">
							<div class="btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-outline-dark">
									<input id="pizzaPrice" type="radio" name="productPrice" checked="checked"
										   value='Small,<?php echo $pizzaDetails['smallPrice']; ?>'>
									Small&nbsp;
									(Rs.<?php echo $pizzaDetails['smallPrice']; ?>)
								</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="btn btn-outline-dark">
									<input id="pizzaPrice" type="radio" name="productPrice"
										   value='Medium,<?php echo $pizzaDetails['mediumPrice']; ?>'>
									Medium&nbsp;
									(Rs.<?php echo $pizzaDetails['mediumPrice']; ?>)
								</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="btn btn-outline-dark">
									<input id="pizzaPrice" type="radio" name="productPrice"
										   value='Large,<?php echo $pizzaDetails['largePrice']; ?>'>
									Large&nbsp;
									(Rs.<?php echo $pizzaDetails['largePrice']; ?>)
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingTwo">
						<h2 class="mb-0">
							<button class="btn btn-link btn-block text-left collapsed" type="button"
									data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
									aria-controls="collapseTwo">
								Select the Pizza Topping
							</button>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<?php foreach ($toppings as $topping) : ?>
							<div class="card-body">
								<div class="btn-group-toggle" data-toggle="buttons">
									<img src="../assets/images/toppings/<?php echo $topping['imageUrl']; ?>"
										 class="card-img-top" alt="..." style="height: 50px;width: 50px">
									<label class="btn btn-outline-dark" style="width: 50%">
										<input type="checkbox" name=productTopping[] id="topping"
											   value='<?php echo $topping['name']; ?>,<?php echo $topping['price']; ?>'
											   data-price=<?php echo $topping['price']; ?>>
										<?php echo $topping['name']; ?>&nbsp;
										(Rs.<?php echo $topping['price']; ?>)
									</label>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<input type="number" name="productQuantity" class="form-control quantity" min="1" value="1" required/><br/>
			<button type="submit" name="add_cart" class="btn btn-success add_cart">Add to cart</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script>
	$("#totalPrice").html('Total: Rs. ' + 500);
	$("input[id=topping],input[name = productPrice],input[name = productQuantity]").change(function () {

		let toppingPrices = $("input[id=topping]:checked").map(function () {
			return $(this).data("price");
		}).toArray();

		let toppingPricesTotal = 0;
		let customizedMeal = 0

		customizedMeal = $("input[name = productPrice]:checked").val();
		let split = customizedMeal.split(",");
		let price = split[1];
		for (let i = 0; i < toppingPrices.length; i++) {
			toppingPricesTotal += toppingPrices[i] << 0;
		}

		let quantity = 1;
		quantity = $("input[name = productQuantity]").val();

		let totalPriceOfCustomizePizza = (parseFloat(price) + toppingPricesTotal) * quantity;
		$("#totalPrice").html('Total: Rs. ' + totalPriceOfCustomizePizza);
	});
</script>
