<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("public/Daftar_paket/__partials/css");?>
</head>
<body>
	<?php $this->view("public/menu");?>
	<?php 
	$this->view("public/Header");
	?>

	<div class="row m-2 lozad">

			<?php $this->view("public/menu_2");?>
		<!-- Dibawah adalah komponen menu sidebar !-->
		<!-- Dibawah adalah komponen utama !-->
		<div class="col-lg-8 col-md-8 col-xl-8 col-sm-8">
			<div class="card">
					<div class="card-header">
						<h2 >Rincian Pelaminan</h2><br>
					</div>
					<div class="card-body">
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
												$a["id_pkt"]=htmlspecialchars($dt["id_pkt"]);
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
					</div>
			</div>
		</div>
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("public/Pesanan_saya/__partials/js");?>
</body>
</html>

