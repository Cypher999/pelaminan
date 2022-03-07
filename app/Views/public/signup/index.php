<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("public/home/__partials/css");?>
</head>
<body>
	<div class="container col-lg-12">
		<?php $this->view("public/signup/Header"); ?>	
		<div class="row justify-content-center">
			<div class="card  col-lg-8 mt-2 mb-2"> 
				<div class="card-header">
					<h2>Daftar</h2>
				</div>
				<div class="card-body">
					<?php if (isset($_SESSION["flash"])){
						echo $_SESSION["flash"];
						unset($_SESSION["flash"]);
					 }?>
					<form action="?a=Home/do_signup" method="post">
						<input type="text" name="nm" placeholder="nama user (untuk login)" class="form-control"><br>
						<input type="text" name="nm_lengkap" placeholder="nama lengkap" class="form-control"><br>
						<label>Jenis Kelamin</label><br>
						<input type="radio" name="jk" value="L">Laki-laki
						<input type="radio" name="jk" value="P">Perempuan<br>
						<input type="text" name="email" placeholder="Alamat Email (untuk verifikasi)" class="form-control"><br>
						<input type="password" name="ps" placeholder="password" class="form-control"><br>
						<input type="password" name="kf" placeholder="konfirmasi password" class="form-control"><br>
						<div class="row">
							<div class="col">
								<input type="submit" value="Sign-up" class="btn btn-primary">
							</div>
							<div class="col">
								<a href="<?php echo BASE_URL;?>"><input type="button" value="Kembali" class="btn btn-secondary"></a>
							</div>
							<div class="col">
								<a href="<?php echo BASE_URL."?a=Home/login";?>"><input type="button" value="Login" class="btn btn-secondary"></a>
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