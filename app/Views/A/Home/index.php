
<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("A/Home/__partials/css");?>
</head>
<body>
	<?php $this->view("A/menu");?>
	<div class="container col-lg-12">
		<?php $this->view("A/Header",$data["user_header"]); ?>	
			<div class="row">
				<?php $this->view("A/menu_2");?>		
				<div class="col-lg-8 mt-2 mb-2">
					<p>Selamat Datang, silahkan Kelola Website Anda</p>
					<div class="row">
						<div class="card m-2 col-sm-4">
							<div class="card-header"><h3>Data Paket</h3></div>
							<div class="card-body"><?php echo count($data["paket"]);?></div>
							<div class="card-footer"><a href="<?php echo BASE_URL."?a=A/Data_paket/";?>"><input type='button' class='btn btn-outline-primary' value="Lihat selengkapnya"></a></div>
						</div>
						<div class="card m-2 col-sm-4">
							<div class="card-header"><h3>Data Perlengkapan</h3></div>
							<div class="card-body"><?php echo count($data["perlengkapan"]);?></div>
							<div class="card-footer"><a href="<?php echo BASE_URL."?a=A/Data_perlengkapan/";?>"><input type='button' class='btn btn-outline-primary' value="Lihat selengkapnya"></a></div>
						</div>
						<div class="card m-2 col-sm-4">
							<div class="card-header"><h3>Data Pesanan</h3></div>
							<div class="card-body"><?php echo count($data["pesanan"]);?></div>
							<div class="card-footer"><a href="<?php echo BASE_URL."?a=A/Data_pesanan/";?>"><input type='button' class='btn btn-outline-primary' value="Lihat selengkapnya"></a></div>
						</div>
						<div class="card m-2 col-sm-4">
							<div class="card-header"><h3>Data User</h3></div>
							<div class="card-body"><?php echo count($data["user"]);?></div>
							<div class="card-footer"><a href="<?php echo BASE_URL."?a=A/Data_user/";?>"><input type='button' class='btn btn-outline-primary' value="Lihat selengkapnya"></a></div>
						</div>
					</div>
				</div>
			</div>
		<?php $this->view("footer");?>
	</div>
<?php $this->view("__partials/js");?>
<?php $this->view("A/Home/__partials/js");?>
</body>
</html>