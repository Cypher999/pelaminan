<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Edit Nama</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<?php foreach($data as $dt){?>
						<form class="bordered update" action="?a=User/update_nm&&key=<?php echo $_POST["a"];?>" method="post" enctype="multipart/form-data"> 
							<input class="form-control" name="nm" placeholder="nama..." value="<?php echo $dt["nm_user"];?>"><br>
							
							<input class="btn btn-primary" value="Simpan Perubahan" type="submit">
						</form>
						<?php } ?>
					</div>
				</div>
			</div>