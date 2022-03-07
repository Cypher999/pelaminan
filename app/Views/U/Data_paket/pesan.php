<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("U/Data_paket/__partials/css");?>
</head>
<body>
	<?php $this->view("U/menu");?>
	<?php 
	$this->view("U/Header",$data["user_header"]);
	?>

	<div class="row m-2 lozad">

			<?php $this->view("U/menu_2");?>
		<!-- Dibawah adalah komponen menu sidebar !-->
		<!-- Dibawah adalah komponen utama !-->
		<div class="col-lg-8 col-md-8 col-xl-8 col-sm-8">
			<?php if(isset($_SESSION["flash"])){
								echo "<br>".$_SESSION["flash"];
								unset($_SESSION["flash"]);
						 	}?>
			<div class="card">
					<div class="card-header">
						<h2 >Form Pemesanan /paket Pelaminan</h2><br>
					</div>
					<div class="card-body">
						<div class="card">
							<div class="card-body">
								<p>Silahkan transfer uang pembayaran ke rekening berikut</p><br>
								<div class="row">
									<div class="col-sm-4">
										Bank
									</div>
									<div class="col-sm-1">
										:
									</div>
									<div class="col-sm-4">
										BNI
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										Nomor Rekening
									</div>
									<div class="col-sm-1">
										:
									</div>
									<div class="col-sm-4">
										1234567890xxxxx
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								Data Paket Pelaminan
							</div>
							<div class="card-body">
								<?php foreach($data["pkt"] as $dt){?>
									<label>Nama Paket</label><br>
									<label class="form-control"><?php echo $dt['nm_pkt'];?></label><br>
									<label>Harga</label><br>
									<label class="form-control"><?php echo $dt['hrg'];?></label><br>
									<label>Foto</label>
									<br>
									<?php
									$cek_file="files/foto_paket/".$dt["id_pkt"].".jpg";
									if(!file_exists($cek_file)){
										$cek_file="";
									 }?>
									
									<img src="<?php echo BASE_URL.$cek_file;?>" width='200' height='200' id='prev_e'>
									<br>
									Rincian Perlengkapan<br>
									<ul>
										<?php $i=0; foreach($data["tp"] as $tp){?>
											<li><?php echo $tp;?></li>
											<ul>
												<?php
												$a["tipe"]=$i;
												$a["id_pkt"]=htmlspecialchars($_GET["key"]);
												$data_tipe=$this->model_perlengkapan->read_perlengkapan($a);
												foreach($data_tipe as $dt){
												?>
													<li> 
														<?php if($dt["jml"]!=""){
															echo $dt["jml"];
														}?>
														<?php if($dt["sat"]!=""){
															echo " ".$dt["sat"]." ";
														}
														echo $dt["nm_prl"];
														?>

													</li>
												<?php }?>
											</ul>
										<?php $i++;}?>
									</ul>
								<?php }?>
									
							
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								Rincian Pemesanan
							</div>
							<div class="card-body">
								<form action="<?php echo BASE_URL."?a=U/Data_paket/kirim_pesan&&key=".$_GET["key"]?>" method="post" enctype="multipart/form-data">
									<label>Tanggal Akad</label>
									<input class="form-control" name="tgl_akad" type="date">
									<label>Tanggal Resepsi Pernikahan</label>
									<input class="form-control" name="tgl_resepsi" type="date">
									<label>Tanggal Pasang</label>
									<input class="form-control" name="tgl_pasang" type="date">
									<label>Tanggal Bongkar</label>
									<input class="form-control" name="tgl_bongkar" type="date">
									<label>Alamat Tujuan</label>
									<input class="form-control" name="alt_pes">
									<label>Nomor Telepon Yang Bisa Dihubungi</label>
									<input class="form-control" name="notel" type="number">
									<label>Foto Bukti Transfer (maks 2 mb)</label>
									<br>
									
									<img src="" width='200' height='200' id='prev_bkt'><br>
									<input type="file" name="bukti" required onchange="prev_img('prev_bkt')"><br>
									<label>Status Transfer</label><br>
									<input type="radio" value="0" name="lok">DP<input type="radio" value="1" name="lok">Lunas
									

									<input class="btn btn-primary mt-4" value="Simpan" type="submit">
								</form>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("U/Data_paket/__partials/js");?>
</body>
</html>

