<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("U/Pesanan_saya/__partials/css");?>
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
			<div class="card">
					<div class="card-header">
						<h2 >Form Pemesanan /paket Pelaminan</h2><br>
					</div>
					<div class="card-body">
						<?php foreach($data["pesanan"] as $psn){?>
						<div class="card">
							<div class="card-body">
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
								<?php 
								foreach($data["pkt"] as $dt){?>
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
												$a["id_pkt"]=htmlspecialchars($psn["id_pkt"]);
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
									<label>Tanggal Akad</label>
									<input class="form-control" name="tgl_akad" type="date" value="<?php $tgl=explode(" ",$psn["tgl_akad_nikah"])[0];echo $tgl;?>" disabled>
									<label>Tanggal Resepsi Pernikahan</label>
									<input class="form-control" name="tgl_resepsi" type="date" value="<?php $tgl=explode(" ",$psn["tgl_resepsi"])[0];echo $tgl;?>" disabled>
									<label>Tanggal Pasang</label>
									<input class="form-control" name="tgl_pasang" type="date" value="<?php $tgl=explode(" ",$psn["tgl_pasang"])[0];echo $tgl;?>" disabled> 
									<label>Tanggal Bongkar</label>
									<input class="form-control" name="tgl_bongkar" type="date" value="<?php $tgl=explode(" ",$psn["tgl_bongkar"])[0];echo $tgl;?>" disabled>
									<label>Alamat Tujuan</label>
									<input class="form-control" name="alt_pes" value="<?php echo $psn["alt_pes"];?>" disabled>
									<label>Nomor Telepon Yang Bisa Dihubungi</label>
									<input class="form-control" name="notel" type="number" value="<?php echo $psn["notel"];?>" disabled>
									<label>Foto Bukti Transfer</label>
									<br>
									<?php
									$cek_dp="files/bukti_pembayaran/DP/".$psn["id_pesanan"].".jpg";
									$cek_lunas="files/bukti_pembayaran/lunas/".$psn["id_pesanan"].".jpg";

									 if(file_exists($cek_dp)){
									 ?>
									<img src="<?php echo BASE_URL.$cek_dp;?>" width='200' height='200' id='prev_bkt'><br>
									<?php }
									 if(file_exists($cek_lunas)){
									?>
									<label>Foto Bukti Pelunasan</label>
									<img src="<?php echo BASE_URL.$cek_lunas;?>" width='200' height='200' id='prev_bkt'><br>
									<?php }?>
									<label>Status Pesanan</label><br>
									<label class="form-control"><?php $stat=["Belum diproses","Sudah diproses"];echo $stat[$psn["status_pes"]];?></label><br>
									<a href="<?php echo BASE_URL."?a=U/Pesanan_saya/";?>"><input type="button" value="Kembail" class="btn btn-outline-secondary"></a>
							</div>
						</div>
						<?php }?>
					</div>
			</div>
		</div>
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("U/Pesanan_saya/__partials/js");?>
</body>
</html>

