<div class="container">
	<div class="row">
		<?php foreach ($pizzas as $pizza) : ?>
			<div class="col-sm-4">
				<div class="card" style="width: 18rem;padding: 10px;height: 95%;">
					<img src="../assets/images/pizzas/<?php echo $pizza['imageUrl']; ?>"
						 class="card-img-top" alt="..." style="height: 170px;width: 265px">
					<div class="card-body">
						<h5 class="card-title"><strong><?php echo $pizza['name']; ?></strong></h5>
						<p class="card-text"><?php echo $pizza['description']; ?></p>
						<h6 class="starting-price">Starting from Rs.<?php echo $pizza['smallPrice']; ?></h6>
						<?php echo form_open('customizePizza'); ?>
						<input type="hidden" name="id" value='<?php echo $pizza['id']; ?>'>
						<input type="hidden" name="name" value='<?php echo $pizza['name']; ?>'>
						<input type="hidden" name="imageUrl" value='<?php echo $pizza['imageUrl']; ?>'>
						<input type="hidden" name="description" value='<?php echo $pizza['description']; ?>'>
						<input type="hidden" name="smallPrice" value='<?php echo $pizza['smallPrice']; ?>'>
						<input type="hidden" name="mediumPrice" value='<?php echo $pizza['mediumPrice']; ?>'>
						<input type="hidden" name="largePrice" value='<?php echo $pizza['largePrice']; ?>'>
						<button type="submit" id="action-button" class="btn btn-primary">Customize</button>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
