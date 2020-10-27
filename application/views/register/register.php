<br/>
<h3 align="center">Register</h3>
<br/>
<div class="card">
	<div class="card-header">User Register</div>
	<div class="card-body">
		<?php
		if ($this->session->flashdata('message')) {
			echo '
						<div class="alert alert-success">
						' . $this->session->flashdata("message") . '
						</div>
						';

		}
		?>
		<form method="post" action="<?php echo base_url(); ?>register/validation">
			<div class="form-group">
				<label>Enter Your Name</label>
				<input type="text" name="user_name" class="form-control"
					   value="<?php echo set_value('user_name'); ?>"/>
				<span class="text-danger"><?php echo form_error('user_name'); ?></span>
			</div>
			<div class="form-group">
				<label>Enter Your Email</label>
				<input type="email" name="user_email" class="form-control"
					   value="<?php echo set_value('user_email'); ?>"/>
				<span class="text-danger"><?php echo form_error('user_email'); ?></span>
			</div>
			<div class="form-group">
				<label>Enter Your Password</label>
				<input type="password" name="user_password" class="form-control"
					   value="<?php echo set_value('user_password'); ?>"/>
				<span class="text-danger"><?php echo form_error('user_password'); ?></span>
			</div>
			<div class="form-group">
				<input type="submit" name="register" value="Register" class="btn btn-info"/>
			</div>
		</form>
	</div>
</div>
