<!DOCTYPE html>
<html>
<head>
	<title>Masuk - SAN Library</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>login.style.css">
	<script src="<?=base_url()?>from_npm/node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div class="left-image"></div>
<div class="form">
	<div class="form-title">
		<h3>Masuk Siswa</h3>
	</div>
	<form class="form-content" method="post">
		<div class="form-group <?=form_error('username') ? 'has-error' : null?>">
			<label>Username</label>
			<input type="text" name="username" class="input-signup4" placeholder="Username" value="<?=set_value('username')?>" autofocus="">
			<?=form_error('username')?>
		</div>
		<div class="form-group <?=form_error('password') ? 'has-error' : null?>">
			<label>Password</label>
			<input type="password" name="password" class="input-signup4" placeholder="Password">
			<?=form_error('password')?>
		</div>
		<div class="form-group text-center">
			<button type="submit" class="btn-signup4">Masuk</button>
		</div>
		<div class="form-group text-center has-error">
			<?php echo $this->session->flashdata('message'); ?>
		</div>
	</form>
</div>
</body>
</html>