<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("public/home/__partials/css");?>
</head>
<body>
	<div class="container col-lg-12">
		<?php $this->view("public/login/Header"); ?>	
		<div class="row justify-content-center">
			<div class="card  col-lg-8 mt-2 mb-2"> 
				<div class="card-header">
					<h2>Login</h2>
				</div>
				<div class="card-body">
					<?php if (isset($_SESSION["flash"])){
						echo $_SESSION["flash"];
						unset($_SESSION["flash"]);
					 }?>
					<form action="?a=Home/do_login" method="post">
						<input type="text" name="nm" placeholder="nama user..." class="form-control"><br>
						<input type="password" name="ps" placeholder="password" class="form-control"><br>
						<div class="row">
							<div class="col">
								<input type="submit" value="Login" class="btn btn-primary">
							</div>
							<div class="col">
								<a href="index.php"><input type="button" value="Kembali" class="btn btn-secondary"></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
	</div>
<?php $this->view("__partials/js");?>
<?php $this->view("public/home/__partials/js");?>
</body>
</html>