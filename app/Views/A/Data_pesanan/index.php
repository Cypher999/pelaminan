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
			<?php if(isset($_SESSION["flash"])){
								echo "<br>".$_SESSION["flash"];
								unset($_SESSION["flash"]);
						 	}?>
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
			                    <th>Status Sewa</th>
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
				                    <td><?php $status=["Belum Lunas","Sudah Lunas"]; echo $status[$dt["status_pes"]];?></td>
				                    <td><a  class="text-primary btn btn-small cmd-edit" href="?a=A/Data_pesanan/preview&&key=<?php echo $dt["id_pesanan"];?>" title="Preview data"><i class="fas fa-search"></i></a>
				                    	<?php if($dt["status_pes"]=="0"){?>
				                    	<a  class="text-primary btn btn-small cmd-edit" href="?a=A/Data_pesanan/Sudah_proses&&key=<?php echo $dt["id_pesanan"];?>" title="Tandai sudah lunas"><i class="fas fa-check"></i></a>
				                    	<?php }?>   
				                    	<?php if($dt["status_pes"]==1){?>
				                    		<a class="text-success btn btn-small" href="?a=A/Data_pesanan/print_kwitansi&&key=<?php echo $dt["id_pesanan"];?>" title="Cetak Kwitansi Penyewaan"><i class="fas fa-print"></i></a>
				                    	<?php }?>
				                    	<a class="text-danger btn btn-small cmd-del" url-to="?a=A/Data_pesanan/delete&&key=<?php echo $dt["id_pesanan"];?>" title="Hapus Data"><i class="fas fa-trash"></i></a></td>
				                  </tr>
								<?php } ?>
							</tbody>
						</table>
		</div>
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("A/Data_pesanan/__partials/js");?>
</body>
</html>