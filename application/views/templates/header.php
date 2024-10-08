<html>
<head>
	<title>CodeIgniter</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/assets/css/style.css'); ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">ciBlog</a>
		<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse" id="navbarColor01" style="">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url(); ?>">Home
						<span class="visually-hidden">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
				</li>
			</ul>
            <?php if (!$this->session->userdata('logged_in')) : ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a></li>
            </ul>
            <?php endif; ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Posts</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
            </ul>
			<form  class="d-flex">
				<input class="form-control me-sm-2" type="search" placeholder="Search">
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</div>
</nav>
<div class="container">
    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>
</div>
<div class="container p-lg-5">
	<div class="row">
		 <div class="col-12">
