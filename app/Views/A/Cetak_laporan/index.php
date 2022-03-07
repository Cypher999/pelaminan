<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("A/Cetak_laporan/__partials/css");?>
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
					<h2>Cetak Laporan Penyewaan Pelaminan</h2>
				</div>
				<div class="card-body">
					<form action="<?php echo BASE_URL."?a=A/Cetak_laporan/cetak";?>" method="post" enctype="multipart/form-data">
						<label>Bulan</label>
						<select class="form-control" name="bln">
							<option value="all">Semua</option>
							<?php $i=1; foreach($data["bulan"] as $bln){?>
								<option value="<?php echo $i;?>"><?php echo $bln;?></option>
							<?php $i++;}?>
						</select>
						<label>Tahun</label>
						<select class="form-control" name="thn">
							<option value="all">Semua</option>
							<?php for($i=1999;$i<=2100;$i++){?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php }?>
						</select>
						<input type="submit" value="Cetak Laporan" class="btn btn-outline-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("A/Cetak_laporan/__partials/js");?>
</body>
</html>