
<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("U/Home/__partials/css");?>
</head>
<body>
	<?php $this->view("U/menu");?>
	<div class="container col-lg-12">
		<?php $this->view("U/Header",$data["user_header"]); ?>	
			<div class="row">
				<?php $this->view("U/menu_2");?>		
				<div class="col-lg-8 mt-2 mb-2">
					<div class="card">
					<div class="card-header">
						<h2>Edit Data User</h2>
					</div>
					<div class="card-body">
						<?php if(isset($_SESSION["flash"])){
								echo "<br>".$_SESSION["flash"];
								unset($_SESSION["flash"]);
						 	}?>
						<?php foreach($data["user"] as $dt){?>
						<form class="bordered update" action="?a=U/Data_user/ubah_nm" method="post" enctype="multipart/form-data"> 
							<label>Nama User</label>
							<input class="form-control" name="nm" placeholder="nama..." value="<?php echo $dt["nm_user"];?>"><br>
							<label>Jenis Kelamin</label><br>
							<input type="radio" name="jk" value="L" <?php if($dt["jekel"]=="L"){echo "checked";}?>>Laki-laki
							<input type="radio" name="jk" value="P" <?php if($dt["jekel"]=="P"){echo "checked";}?>>Perempuan<br>
							<label>Nama Lengkap</label>
							
							<input class="form-control" name="nm_lengkap" placeholder="nama lengkap" value="<?php echo $dt["nm_lengkap"];?>">
							<input class="btn btn-primary" value="Simpan Perubahan" type="submit">
						</form>
						<?php } ?>
					</div>
				</div>
				</div>
			</div>
		<?php $this->view("footer");?>
	</div>
<?php $this->view("__partials/js");?>
<?php $this->view("U/Home/__partials/js");?>
</body>
</html>

