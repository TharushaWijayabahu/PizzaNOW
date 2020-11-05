<div class="card card-outline-secondary">
	<div class="card-header">
		<h3 class="mb-0">User Information</h3>
	</div>
	<div class="card-body">
		<form method="post" action="<?php echo base_url(); ?>index.php/order/validation" >
			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label">First name</label>
				<div class="col-lg-9">
					<input class="form-control"
						   type="text" name="first_name"
						   value="<?php echo set_value('first_name'); ?>"/>
					<span class="text-danger">
					<?php echo form_error('first_name'); ?>
					</span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label">Last name</label>
				<div class="col-lg-9">
					<input class="form-control"
						   type="text" type="text" name="last_name"
						   value="<?php echo set_value('last_name'); ?>"/>
					<span class="text-danger">
					<?php echo form_error('last_name'); ?>
					</span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label">Email</label>
				<div class="col-lg-9">
					<input class="form-control"
						   type="email" name="email"
						   value="<?php echo set_value('email'); ?>"/>
					<span class="text-danger">
					<?php echo form_error('email'); ?>
					</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label"> Deliver address</label>
				<div class="col-lg-9">
					<input class="form-control"
						   type="text" name="address"
						   value="<?php echo set_value('address'); ?>"/>
					<span class="text-danger">
					<?php echo form_error('address'); ?>
					</span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label">Mobile number</label>
				<div class="col-lg-9">
					<input class="form-control"
						   type="tel" name="number"
						   value="<?php echo set_value('number'); ?>"/>
					<span class="text-danger">
					<?php echo form_error('number'); ?>
					</span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label">Payment Method</label>
				<div class="col-lg-9">
					<div class="row">
						<div class="col-1">
							<i class="fab fa-amazon-pay"></i>
						</div>
						<div class="col-11">
							<p>Cash on Delivery</p>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label"></label>
				<div class="col-lg-9">
					<input type="submit" class="btn btn-primary" value="Continue">
				</div>
			</div>
		</form>
	</div>
</div>
