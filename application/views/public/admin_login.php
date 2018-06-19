<?php 
include 'public_header.php';

?>

<div class="container">
		<!-- login form opening  -->
		<?= form_open('login/admin_login'); ?>
  <fieldset>
    <legend>Admin Login</legend>
	    <?php if($error = $this->session->flashdata('login_failed')): ?>
		<div class="row">
			<div class="col-lg-6">
	    <div class="alert alert-dismissible alert-danger">
	  		<?= $error; ?>	
		</div>
			</div>
		</div>
		<?php endif; ?>

    <label for="exampleInputEmail1">Username</label>
    <div class="row">
    	<div class="col-sm-6">
   		<div class="form-group">
      
    <?= form_input(['name'=>'name','class'=>'form-control','placeholder'=>'Enter Name','value'=>set_value('name')]); ?>
      <!-- <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
   	</div>
   	<div class="col-sm-6">
   		<?= form_error('name'); ?>
   	</div>
    </div>
   	<label for="exampleInputPassword1">Password</label>
   	<div class="row">
   		<div class="col-sm-6">
   		 <div class="form-group">
      
      <?= form_password(['name'=>'pass','class'=>'form-control','placeholder'=>'Password']); ?>
      <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    </div>
   	</div>
   	<div class="col-sm-6">
   		<?= form_error('pass'); ?>
   	</div>
    
   	</div>
   	
   
	<?php echo  form_reset(['name'=>'reset','class'=>'btn btn-primary','value'=>'RESET']); ?>
	<!-- <button type="Reset" class="btn btn-primary">Reset</button> -->
	<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'SUBMIT']); ?>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
  </fieldset>
	<?= form_close(); ?>
</div>

<?php

include 'public_footer.php';

 ?>