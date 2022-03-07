
<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("U/Home/__partials/css");?>
</head>
<body>
	<?php $this->view("U/menu");?>
	<div class="container col-lg-12">
		<?php $this->view("U/Header",$data["user_header"]); ?>	
			<div class="row">
				<?php $this->view("U/menu_2");?>		
				<div class="col-lg-8 mt-2 mb-2">
				<h2>Selamat Datang Di Mahkota Pelaminan</h2>
				<br>
				<div class="card mb-2">
					<div class="card-header">
						<h2>Pelaminan Terlengkap Dengan Harga Terjangkau</h2>
					</div>
					<div class="card-body">
						<img src="<?php echo BASE_URL."files/web_photo/1.jpg";?>" width='200' height='200'>
						<p>Kami menyediakan Berbagai jenis paket pelaminan dengan harga yang tidak mengecewakan, silahkan buka menu bagian 'daftar pelaminan' disamping kiri untuk melihat paket pelaminan yang kami sediakan</p>
					</div>
				</div>
				<div class="card mb-2">
					<div class="card-header">
						<h2>Pesan Sekarang</h2>
					</div>
					<div class="card-body">
						<img src="<?php echo BASE_URL."files/web_photo/2.jpg";?>" width='200' height='200'>
						<p>Pesanan dapat dilakukan secara online melalui website ini, silahkan login atau signup jika belum mempunyai akun</p>
					</div>
				</div>
			</div>
			</div>
		<?php $this->view("footer");?>
	</div>
<?php $this->view("__partials/js");?>
<?php $this->view("U/Home/__partials/js");?>
</body>
</html>