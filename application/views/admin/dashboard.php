<?php include 'admin_header.php'; ?>
<br>
<div class="container">
	<div class="row">
		<div class="col col-md-6"></div>
			<div class="col col-md-6 col-md-offset-6 ">
				<a href="<?= base_url('admin/add_article'); ?>" class="btn btn-lg btn-primary float-right">Add Articles</a>		
			</div>
	</div><br>
	<?php if($delete=$this->session->flashdata('successdel')): ?>
		<div class="row">
			<div class="col-md-6 ">
				<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
  					<?= $delete; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	 <?php if($error = $this->session->flashdata('feedback')): ?>
	 	<?php $feedback_class=$this->session->flashdata('feedback_class'); ?>
	<div class="row">
		<div class="col-lg-6">
    <div class="alert alert-dismissible <?= $feedback_class; ?>">
  		<?= $error; ?>	
	</div>	
		</div>
	</div>
	<?php endif; ?>
<table class="table table-hover">
	<thead>
		<th>Sr. No.</th>
		<th>Title</th>
		<th>Action</th>
	</thead>

	<tbody>

	<?php if(count($articles)): ?>
		<?php $sr_no= $this->uri->segment(3,0); ?>
		<?php foreach ($articles as $article):?>
	<tr>
		<td>
				<?= ++$sr_no; ?>
		</td>
		<td>
			<?= anchor("users/article/{$article->id}",$article->title); ?>
		</td>
		<td>
			<?= anchor("admin/edit_articles/{$article->id}",'Edit',['class'=>'btn btn-primary']); ?>
			<!-- <a href="admin/edit_articles{$articles->id}" class="btn btn-primary">Edit</a>&nbsp; -->
			<?= anchor("admin/delete_article/{$article->id}",'Delete',['class'=>'btn btn-danger','onclick'=>"confirm('Are You Sure You want To Delte Article')"]); ?>
			<!-- <a href="#" class="btn btn-danger">Delete</a> -->
		</td>
	</tr>
	
<?php endforeach; ?>
<?php else: ?>
	<tr>
		<td colspan="3">No Record Found</td>
	</tr>
<?php endif; ?>
	</tbody>
</table>
<?= $this->pagination->create_links(); ?>
 
</div>
<?php include 'admin_footer.php'; ?>