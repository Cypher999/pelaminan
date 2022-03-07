<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Edit Data Paket</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<?php foreach($data["paket"] as $dt){?>
						<form class="bordered" action="?a=A/Data_paket/update&&key=<?php echo $dt['id_pkt'];?>" method="post" enctype="multipart/form-data"> 
							<input class="form-control" value="<?php echo $dt['nm_pkt'];?>" placeholder="nama paket..." name="nm" required><br>
							<input class="form-control" value="<?php echo $dt['hrg'];?>" placeholder="Harga (Rp)..." name="hrg" required><br>
							<label>Foto</label>
							<br>
							<?php
							$cek_file="files/foto_paket/".$dt["id_pkt"].".jpg";
							if(!file_exists($cek_file)){
								$cek_file="";
							 }?>
							
							<img src="<?php echo BASE_URL.$cek_file;?>" width='200' height='200' id='prev_e'>
							<input type="file" name="foto" required onchange="prev_img('prev_e')"><br>

							<input class="btn btn-primary" value="Simpan" type="submit">
						</form>
						<?php }?>
					</div>
				</div>
			</div>