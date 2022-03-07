<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Edit Data Perlengkapan</h2>
						<input class="btn btn-secondary" data-dismiss="modal" value="Close" type="button">
					</div>
					<div class="modal-body">
						<?php foreach($data["prl"] as $prl){?>
						<form class="bordered" action="?a=A/Data_perlengkapan/update&&key=<?php echo $prl["id_prl"];?>" method="post" enctype="multipart/form-data">
							<label>Nama Paket</label>
							<select class="form-control" name="pkt">
								<?php foreach($data["pkt"] as $dt){?>
									<option <?php if($dt["id_pkt"]==$prl["id_pkt"]){echo "selected";}?> value="<?php echo $dt["id_pkt"];?>"><?php echo $dt["nm_pkt"];?></option>
								<?php }?>
							</select><br>
							<label>tipe Perlengkapan</label>
							<select class="form-control" name="pkt">
								<?php $i=0; foreach($data["tp"] as $dt){?>
									<option <?php if($i==$prl["tipe"]){echo "selected";}?> value="<?php echo $i;?>"><?php echo $dt;?></option>
								<?php $i++;}?>
							</select><br>							
							<input class="form-control" placeholder="Nama Perlengkapan" value="<?php echo $prl["nm_prl"];?>" name="nm_prl" required><br>
							<input class="form-control" placeholder="Jumlah" type='number' name="jml" value="<?php echo $prl["jml"];?>"><br>
							<input class="form-control" placeholder="Satuan" name="sat" required value="<?php echo $prl["sat"];?>"><br>

							<input class="btn btn-primary" value="Simpan" type="submit">
						</form>
					</div>
				</div>
			</div>