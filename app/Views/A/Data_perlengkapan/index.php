<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("A/Data_perlengkapan/__partials/css");?>
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
					<label>Pilih Paket Yang Akan Dilihat</label>
					<select class='form-control cmb-ubah'>
						<option value='-'>--Semua Paket--</option>
						<?php foreach($data["pkt"] as $dt){?>
							<option value='<?php echo $dt["id_pkt"];?>'><?php echo $dt["nm_pkt"];?></option>
						<?php }?>
					</select>
					<div class="table-place mt-4">

					</div>
						
		</div>
	</div>
	<div class="modal" id="modal-add">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Tambah Data Perlengkapan</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<form class="bordered" action="?a=A/Data_perlengkapan/insert" method="post" enctype="multipart/form-data">
							<label>Nama Paket</label>
							<select class="form-control" name="pkt">
								<?php foreach($data["pkt"] as $dt){?>
									<option value="<?php echo $dt["id_pkt"];?>"><?php echo $dt["nm_pkt"];?></option>
								<?php }?>
							</select><br>
							<label>tipe Perlengkapan</label>
							<select class="form-control" name="tipe">
								<?php $i=0; foreach($data["tp"] as $dt){?>
									<option value="<?php echo $i;?>"><?php echo $dt;?></option>
								<?php $i++;}?>
							</select><br>							
							<input class="form-control" placeholder="Nama Perlengkapan" name="nm_prl" required><br>
							<input class="form-control" placeholder="Jumlah" type='number' name="jml" required><br>
							<input class="form-control" placeholder="Satuan" name="sat" required><br>

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
<?php $this->view("A/Data_perlengkapan/__partials/js");?>
</body>
</html>