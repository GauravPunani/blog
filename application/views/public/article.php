<?php include('public_header.php') ?>
<div class="container">
	<div class="row">
		<div class="col-md-8"><h1><?= $articles->title; ?></h1></div>
		<div class="col-md-4"><span class="float-right"><?= date('d M-y h:i',strtotime($articles->created_at)); ?></span></div>
	</div>


<hr>
<div class="row">
	<div class="col-md-8">
		
<p style="font-family: tahoma; font-size: 20px; text-align: justify;"><?= html_entity_decode($articles->body); ?></p>

	</div>
	<div class="col-md-4"></div>
</div>
</div>
<?php include ('public_footer.php'); ?>