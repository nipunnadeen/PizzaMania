<div class="container">
	<div class="row">
		<?php foreach ($promotions as $promotion) : ?>
			<div class="col-sm-4">
				<div class="card" style="width: 18rem;padding: 10px;height: 95%;">
					<img src="../assets/images/promos/<?php echo $promotion['imageUrl']; ?>"
						 class="card-img-top" alt="..." style="height: 170px;width: 265px">
					<div class="card-body">
						<h5 class="card-title"><strong><?php echo $promotion['name']; ?></strong></h5>
						<p class="card-text"><?php echo $promotion['description']; ?></p>
						<h6 class="starting-price">Rs.<?php echo $promotion['price']; ?></h6>
						<?php echo form_open('addPromotion'); ?>
						<input type="hidden" name="productId" value='<?php echo $promotion['id']; ?>'>
						<input type="hidden" name="productName" value='<?php echo $promotion['name']; ?>'>
						<input type="hidden" name="productPrice" value='<?php echo $promotion['price']; ?>'>
						<input type="hidden" name="productQuantity" value='1'/>
						<button type="submit" id="action-button" class="btn btn-primary">Add</button>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
