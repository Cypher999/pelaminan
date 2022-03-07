<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("A/Data_paket/__partials/css");?>
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
					<a href="#" data-toggle="modal" data-target="#modal-add" class="add"><i class="fas fa-plus" ></i> Add new</a><br>
						<table class="table table-bordered col-md-8" id="dataTable" width="100%" cellspacing="0">
							<thead>
			                  <tr>
			                    <th>Nama Paket</th>
			                    <th>Harga</th>
			                    <th>Kontrol</th>
			                  </tr>
	                		</thead>
			                <tfoot>
			                  <tr>
			                    <th>Nama Paket</th>
			                    <th>Harga</th>
			                    <th>Kontrol</th>
			                  </tr>
			                </tfoot>
	                		<tbody>
								<?php foreach ($data["paket"] as $dt) {?>
								  <tr>
				                    <td><?php echo $dt["nm_pkt"];?></td>
				                    <td><?php echo $dt["hrg"];?></td>
				                    <td><a href="#" class="text-primary btn btn-small cmd-edit" data-id="<?php echo $dt["id_pkt"];?>" data-target="#modal-edit" data-toggle="modal" title="Edit data"><i class="fas fa-edit"></i></a>   <a class="text-danger btn btn-small cmd-del" url-to="?a=A/Data_paket/delete&&key=<?php echo $dt["id_pkt"];?>" title="Hapus Data"><i class="fas fa-trash"></i></a></td>
				                  </tr>
								<?php } ?>
							</tbody>
						</table>
		</div>
	</div>
	<div class="modal" id="modal-add">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Tambah Data Paket</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=A/Data_paket/insert" method="post" enctype="multipart/form-data"> 
							<input class="form-control" placeholder="nama paket..." name="nm" required><br>
							<input class="form-control" placeholder="Harga (Rp)..." name="hrg" required><br>
							<label>Foto</label>
							<br>
							<img src="" width='200' height='200' id='prev'>
							<input type="file" name="foto" required onchange="prev_img('prev')"><br>

							<input class="btn btn-primary" value="Simpan" type="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	<div class="modal" id="modal-edit">
		
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("A/Data_paket/__partials/js");?>
</body>
</html>