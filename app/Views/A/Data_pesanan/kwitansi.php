<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("A/Data_pesanan/__partials/css");?>
</head>
<body>
	
	

	<div class="row m-2 lozad">

		<!-- Dibawah adalah komponen menu sidebar !-->
		<!-- Dibawah adalah komponen utama !-->
		<div class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
			<?php foreach($data["pesan"] as $dt){?>
			<div class="row">
				<div class="col-lg-5">
					<h2>MAHKOTA</h2>
					<h5>PELAMINAN</h5>
					<p>Nama Jalan</p>
				</div>
				<div class="col-lg-5">
					Kepada Yth.<br>
					Penyewa :<?php echo $dt["nm_lengkap"];?><br>
					alamat :<?php echo $dt["alt_pes"];?><br>
					No. HP :<?php echo $dt["notel"];?><br>
					Tgl. Pasang :<?php echo $dt["tgl_pasang"];?><br>
					Tgl. Bongkar :<?php echo $dt["tgl_bongkar"];?><br>
					Tgl. Resepsi :<?php echo $dt["tgl_resepsi"];?><br>
					Tgl. akad Nikah :<?php echo $dt["tgl_akad_nikah"];?><br>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nama Paket Pelaminan</th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $dt["nm_pkt"];?></td>
								<td><?php echo $dt["hrg"];?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-6">
							<label>Tanda Terima</label><br>
						</div>
						<div class="col-lg-6">
							<label>Hormat Kami</label><br>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
<?php $this->view("__partials/js");?>
</body>
</html>

