<div align="middle">
	<h2>Data Penyewaan Pelaminan</h2>
	<h2>Mahkota Pelaminan</h2>
	<?php if(($_POST["bln"]!="all")&&($_POST["thn"]!="all")){?>
		<h2>Periode <?php echo $data["bulan"][$_POST["bln"]-1];?> <?php echo $_POST["thn"];?> 
	<?php }
		else if(($_POST["bln"]=="all")&&($_POST["thn"]!="all")){?>
			<h2>Periode <?php echo $_POST["thn"];?> 
	<?php } else if(($_POST["bln"]!="all")&&($_POST["thn"]=="all")){?>
			<h2>Periode <?php echo $data["bulan"][$_POST["bln"]-1];?>
			<?php }?> 
<table border='4'>
							<thead>
			                  <tr>
			                    <th>Nama Paket / harga</th>
			                    <th>Nama Pemesanan</th>
			                    <th>Alamat Pemesan</th>
			                    <th>Nomor Telepon</th>
			                    <th>Email Pemesan</th>
			                    <th>Rincian Tanggal</th>
			                    
			                  </tr>
	                		</thead>
	                		<tbody>
								<?php $total=0; foreach ($data["real"] as $dt) {?>
								  <tr>
				                    <td><?php echo $dt["nm_pkt"]." / ".$dt["hrg"];$total+=$dt["hrg"];?></td>
				                    <td><?php echo $dt["nm_lengkap"];?></td>
				                    <td><?php echo $dt["alt_pes"];?></td>
				                    <td><?php echo $dt["notel"];?></td>
				                    <td><?php echo $dt["email"];?></td>
				                    <td>
				                    	<?php
				                    	echo "Pemesanan :".explode(" ",$dt["tgl_pes"])[0]."<br>";
				                    	echo "pemasangan :".$dt["tgl_pasang"]."<br>";
				                    	echo "akad nikah :".$dt["tgl_akad_nikah"]."<br>";
				                    	echo "resepsi :".$dt["tgl_resepsi"]."<br>";
				                    	echo "bongkar :".$dt["tgl_bongkar"]."<br>";
				                    	?>
				                    </td>
				                  </tr>
								<?php } ?>
								<tr><td colspan="5">Total Pendapatan</td><td><?php echo "Rp. ".$total;?></td></tr>
							</tbody>
						</table>
					</div>
</div>

<div align="right">
	<table>
	<tr><td>Kemantan, <?php echo date('D')." ".date('d-M-Y');?><br></td></tr>
	<tr><td>Direktur</td></tr>
	</table>
</div>
<script>window.print();</script>