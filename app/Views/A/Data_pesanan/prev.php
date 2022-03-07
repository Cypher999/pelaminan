<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("A/Data_pesanan/__partials/css");?>
</head>
<body>
	<?php $this->view("A/menu");?>
	<?php 
	$this->view("A/Header",$data["user_header"]);
	?>

	<div class="row m-2 lozad">

			<?php $this->view("A/menu_2");?>
		<!-- Dibawah adalah komponen menu sidebar !-->
		<!-- Dibawah adalah komponen utama !-->
		<div class="col-lg-8 col-md-8 col-xl-8 col-sm-8">
			<div class="card">
					<div class="card-header">
						<h2 >Preview Pesanan</h2>
					</div>
					<div class="card-body">
						<?php foreach($data["pesanan"] as $dt){?>
							<label>Nama Pemesan</label><br>
							<label class="form-control"><?php echo $dt["nm_lengkap"];?></label>
							<label>alamat Pemesan</label><br>
							<label class="form-control"><?php echo $dt["alt_pes"];?></label>
							<label>Email</label><br>
							<label class="form-control"><?php echo $dt["email"];?></label>
							<label>Nomor Telepon</label><br>
							<label class="form-control"><?php echo $dt["notel"];?></label>
							<label>Tanggal Pemesanan</label><br>
							<label class="form-control"><?php echo $dt["tgl_pes"];?></label>
							<label>Tanggal Resepsi</label><br>
							<label class="form-control"><?php echo $dt["tgl_resepsi"];?></label>
							<label>Tanggal Pasang</label><br>
							<label class="form-control"><?php echo $dt["tgl_pasang"];?></label>
							<label>Tanggal akad Nikah</label><br>
							<label class="form-control"><?php echo $dt["tgl_akad_nikah"];?></label>
							<label>Tanggal Bongkar</label><br>
							<label class="form-control"><?php echo $dt["tgl_bongkar"];?></label>
							<label>Nama Paket Yang Dipesan</label><br>
							<label class="form-control"><?php echo $dt["nm_pkt"];?></label>
							<label>Harga</label><br>
							<label class="form-control"><?php echo $dt["hrg"];?></label>
							<label>Bukti Pembayaran DP</label><br>
							<?php
							$cek_file="files/bukti_pembayaran/DP/".$dt["id_pesanan"].".jpg";
							if(file_exists($cek_file)){
								$cek_file=BASE_URL.$cek_file;
							 }
							 else{
							 	$cek_file="";
							 }?>
							
							<img src="<?php echo $cek_file;?>" width='200' height='200' id='prev_e'><br>
							<?php
							$cek_lunas="files/bukti_pembayaran/lunas/".$dt["id_pesanan"].".jpg";
							if(file_exists($cek_lunas)){?>
								<label>Bukti Pelunasan</label><br>
								<img src="<?php echo $cek_lunas;?>" width='200' height='200' id='prev_e'><br>
							 <?php }?>
							<?php if($dt["status_pes"]=="0"){?>
							<a href="<?php echo BASE_URL."?a=A/Data_pesanan/Sudah_proses&&key=".$dt["id_pesanan"];?>"><input type="button" value="Tandai sudah diproses" class="btn btn-outline-primary mt-4 mr-3"></a>
							<?php }?>
							<a href="<?php echo BASE_URL."?a=A/Data_pesanan/";?>"><input type="button" value="Kembali" class="btn btn-outline-secondary mt-4 mr-3"></a>
						<?php }?>
					</div>
			</div>
		</div>
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("A/Data_pesanan/__partials/js");?>
</body>
</html>

