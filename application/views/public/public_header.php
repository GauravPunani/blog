<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Articles</title>

	<?= link_tag('assets/css/bootstrap.min.css'); ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url(); ?>">Articles</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    
    <!-- <form class="form-inline my-2 my-lg-0"> -->
      <?= form_open('users/search',['class'=>'form-inline my-2 my-lg-0']); ?>
      <?= form_input(['name'=>'search','class'=>'form-control mr-sm-2','placeholder'=>'search']) ?>
      
      <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search"> -->
      <?= form_submit('submit','SEARCH',['class'=>'btn btn-secondary my-2 my-sm-0']); ?>
      <?= form_close(); ?>
      <?= form_error('search'); ?>
      <!-- <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
  
    <?= anchor('login/index','Login',['class'=>'float-right']); ?>
</nav>