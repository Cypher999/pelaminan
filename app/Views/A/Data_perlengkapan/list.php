<table class="table table-bordered col-md-8" id="dataTable" width="100%" cellspacing="0">
							<thead>
			                  <tr>
			                    <th>Nama Perlengkapan</th>
			                    <th>Jenis Perlengkapan</th>
			                    <th>Jumlah</th>
			                    <th>Satuan</th>
			                    <th>Kontrol</th>
			                  </tr>
	                		</thead>
			                <tfoot>
			                  <tr>
			                    <th>Nama Perlengkapan</th>
			                    <th>Jenis Perlengkapan</th>
			                    <th>Jumlah</th>
			                    <th>Satuan</th>
			                    <th>Kontrol</th>
			                  </tr>
			                </tfoot>
	                		<tbody>
								<?php foreach ($data["prl"] as $dt) {?>
								  <tr>
				                    <td><?php echo $dt["nm_prl"];?></td>
				                    <td><?php echo $data["tp"][$dt["tipe"]];?></td>
				                    <td><?php echo $dt["jml"];?></td>
				                    <td><?php echo $dt["sat"];?></td>
				                    <td><a href="#" class="text-primary btn btn-small cmd-edit" data-id="<?php echo $dt["id_prl"];?>" data-target="#modal-edit" data-toggle="modal" title="Edit data"><i class="fas fa-edit"></i></a>   <a class="text-danger btn btn-small cmd-del" url-to="?a=A/Data_perlengkapan/delete&&key=<?php echo $dt["id_prl"];?>" title="Hapus Data"><i class="fas fa-trash"></i></a></td>
				                  </tr>
								<?php } ?>
							</tbody>
						</table>