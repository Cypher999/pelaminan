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
			<?php if(isset($_SESSION["flash"])){
								echo "<br>".$_SESSION["flash"];
								unset($_SESSION["flash"]);
						 	}?>
						 	<div class="card">
						 		<div class="card-header"><h2>Data Pesanan Saya</h2></div>
						 		<div class="card-body">
						<table class="table table-bordered col-md-8 table-responsive" id="dataTable" width="100%" cellspacing="0">
							<thead>
			                  <tr>
			                    <th>Nama Paket</th>
			                    <th>Alamat Pemesan</th>
			                    <th>Nomor Telepon</th>
			                    <th>Email Pemesan</th>
			                    <th>Tanggal Pemesanan</th>
			                    <th>Tanggal pemasangan</th>
			                    <th>Tanggal Resepsi</th>
			                    <th>Tanggal Akad Nikah</th>
			                    <th>Tanggal Bongkar</th>
			                    <th>Status Penyewaan</th>
			                    <th>Kontrol</th>
			                  </tr>
	                		</thead>
			                <tfoot>
			                  <tr>
			                    <th>Nama Paket</th>
			                    <th>Alamat Pemesan</th>
			                    <th>Nomor Telepon</th>
			                    <th>Email Pemesan</th>
			                    <th>Tanggal Pemesanan</th>
			                    <th>Tanggal pemasangan</th>
			                    <th>Tanggal Resepsi</th>
			                    <th>Tanggal Akad Nikah</th>
			                    <th>Tanggal Bongkar</th>
			                    <th>Status Penyewaan</th>
			                    <th>Kontrol</th>
			                  </tr>
			                </tfoot>
	                		<tbody>
								<?php foreach ($data["pesanan"] as $dt) {?>
								  <tr>
				                    <td><?php echo $dt["nm_pkt"];?></td>
				                    <td><?php echo $dt["alt_pes"];?></td>
				                    <td><?php echo $dt["notel"];?></td>
				                    <td><?php echo $dt["email"];?></td>
				                    <td><?php echo $dt["tgl_pes"];?></td>
				                    <td><?php echo $dt["tgl_pasang"];?></td>
				                    <td><?php echo $dt["tgl_resepsi"];?></td>
				                    <td><?php echo $dt["tgl_akad_nikah"];?></td>
				                    <td><?php echo $dt["tgl_bongkar"];?></td>
				                    <td>
				                    	<?php $cek_lunas="files/bukti_pembayaran/lunas/".$dt["id_pesanan"].".jpg";
				                    	if(($dt["status_pes"]==0)&&(!file_exists($cek_lunas))){
				                    		echo "Belum dilunasi";
				                    	}
				                    	else if(($dt["status_pes"]==0)&&(file_exists($cek_lunas))){
				                    		echo "Dalam Proses Pelunasan";
				                    	}
				                    	else if(($dt["status_pes"]==1)&&(file_exists($cek_lunas))){
				                    		echo "Sudah lunas";
				                    	}
				                    	?>
				                    </td>
				                    <td><a  class="text-primary btn btn-small cmd-edit" href="?a=U/Pesanan_saya/preview&&key=<?php echo $dt["id_pesanan"];?>" title="Preview data"><i class="fas fa-search"></i></a>   
				                    	<?php if($dt["status_pes"]==0){?>
				                    	<a class="text-danger btn btn-small" href="?a=U/Pesanan_saya/delete&&key=<?php echo $dt["id_pesanan"];?>" title="Batalkan Pemesanan"><i class="fas fa-trash"></i></a>
				                    	<a class="text-secondary bt  btn-small cmd-lunas" data-id="<?php echo BASE_URL."?a=U/Pesanan_saya/upload_lunas&&key=".$dt["id_pesanan"];?>" title="Upload bukti pelunasan" data-toggle="modal" data-target="#modal-lunas">
				                    		<i class="fas fa-edit"></i>
				                    	</a>
				                    	<?php }?>
				                    	<?php if($dt["status_pes"]==1){?>
				                    		<a class="text-success btn btn-small" href="?a=U/Pesanan_saya/print_kwitansi&&key=<?php echo $dt["id_pesanan"];?>" title="Cetak Kwitansi Penyewaan"><i class="fas fa-print"></i></a>
				                    	<?php }?></td>
				                  </tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
	<div class="modal" id="modal-lunas">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Upload Bukti Pelunasan</h2>
				</div>
				<div class="modal-body">
					<form action="" method="POST" enctype="multipart/form-data" id="form-lunas">
						<label>Foto Bukti Transfer (maks 2 mb)</label>
						<br>
						<img src="" width='200' height='200' id='prev_bkt'><br>
						<input type="file" name="bukti" required onchange="prev_img('prev_bkt')"><br>
						<input class="btn btn-primary mt-4" value="Simpan" type="submit">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("U/Pesanan_saya/__partials/js");?>
</body>
</html>