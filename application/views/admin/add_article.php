<?php include 'admin_header.php'; ?>

<div class="container">
	<?= form_open('admin/store_article'); ?>
  <fieldset>
    <legend>Add Article</legend>
	
    <label for="Article Title">Article Title</label>
    <?= form_hidden('user_id',$this->session->userdata('user_id'));?>
    <?= form_hidden('created_at',date('Y-m-d H:m:i')); ?>
    <div class="row">
    	<div class="col-sm-6">
   		<div class="form-group">
      
   <?= form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Title','value'=>set_value('title')]); ?>
    </div>
   	</div>
   	<div class="col-sm-6">
   		<?= form_error('title'); ?>
   	</div>
    </div>
   	<label for="exampleInputPassword1">Article Body</label>
   	<div class="row">
   		<div class="col-sm-6">
   		 <div class="form-group">
      
      <?= form_textarea(['name'=>'body','class'=>'form-control','id'=>'form_body','placeholder'=>'Write Article here','value'=>set_value('body')]); ?>
    </div>
   	</div>
   	<div class="col-sm-6">
   		<?= form_error('body'); ?>
   	</div>
    
   	</div>
   	
	<!-- <button type="Reset" class="btn btn-primary">Reset</button> -->
	<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'SUBMIT']); ?>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
  </fieldset>
	<?= form_close(); ?>
</div>

<?php include 'admin_footer.php'; ?>