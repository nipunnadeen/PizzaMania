<div class="container">
	<div class="row">
		<?php foreach ($sides as $side) : ?>
			<div class="col-sm-4">
				<div class="card" style="width: 18rem;padding: 10px;height: 95%;">
					<img src="../assets/images/sides/<?php echo $side['imageUrl']; ?>"
						 class="card-img-top" alt="..." style="height: 170px;width: 265px">
					<div class="card-body">
						<h5 class="card-title"><strong><?php echo $side['name']; ?></strong></h5>
						<p class="card-text"><?php echo $side['description']; ?></p>
						<h6 class="starting-price" style="color: #000000">Rs.<?php echo $side['price']; ?></h6>
						<?php echo form_open('addSide'); ?>
						<input type="hidden" name="productId" value='<?php echo $side['id']; ?>'>
						<input type="hidden" name="productName" value='<?php echo $side['name']; ?>'>
						<input type="hidden" name="productPrice" value='<?php echo $side['price']; ?>'>
						<input  type="number" name="productQuantity" class="form-control quantity" required/><br/>
						<button type="submit" id="side-action-button" class="btn btn-primary">Add</button>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
