<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Edit Password</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<?php foreach($data as $dt){?>
						<form class="bordered update" action="?a=User/update_pas&&key=<?php echo $_POST["a"];?>" method="post" enctype="multipart/form-data"> 
							<input class="form-control" name="lm" type="password" placeholder="password lama..." ><br>
							<input class="form-control" name="br" type="password" placeholder="password baru..." ><br>
							<input class="form-control" name="kf" type="password" placeholder="konfirmasi password baru..." ><br>
							<input class="btn btn-primary" value="Simpan Perubahan" type="submit">
						</form>
						<?php } ?>
					</div>
				</div>
			</div>