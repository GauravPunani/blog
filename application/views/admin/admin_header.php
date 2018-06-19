<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>

	<?= link_tag('assets/css/bootstrap.min.css'); ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url('admin/dashboard'); ?>">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    
    <div class="pull-right">      <ul class="navbar-nav pull-right ">
    <li class="nav-item ">
      <!-- <a class="nav-link " href="#">Logout</a> -->
      <?= anchor('login/logout','Logout',['class'=>'nav-link']); ?>
    </li>
    
  </ul></div>


    
  </div>
</nav>