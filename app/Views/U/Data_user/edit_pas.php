
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
						<h2 class="modal-title">Edit Password</h2>
					</div>
					<div class="card-body">
						<?php if(isset($_SESSION["flash"])){
								echo "<br>".$_SESSION["flash"];
								unset($_SESSION["flash"]);
						 	}?>
						<form class="bordered update" action="?a=U/Data_user/ubah_ps" method="post" enctype="multipart/form-data"> 
							<input class="form-control" name="lm" type="password" placeholder="password lama..." ><br>
							<input class="form-control" name="br" type="password" placeholder="password baru..." ><br>
							<input class="form-control" name="kf" type="password" placeholder="konfirmasi password baru..." ><br>
							<input class="btn btn-primary" value="Simpan Perubahan" type="submit">
						</form>
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



