<div class="col-lg-3" style="background-color: gray">
				<div class="m-3">
					<div class='row'>
						<div class="col-lg-12 p-3 rounded-top" style="background-color:#00CED1;">
							<a href="<?php echo BASE_URL;?>"><h6 align="middle" style="color:white;font-weight: bold">HOME</h6></a>
						</div>
					</div>
					<div class='row rounded-bottom' style="background-color: white">
<ul class="p-2" style="list-style-type: none;">
				<li>
					<button class="btn" data-toggle="collapse" data-target="#collapse-1">Menu Data  <i class="fas fa-arrow-down ml-2"></i></button>
					<div class="collapse" id="collapse-1">
						<ul>
							<li><a href='<?php echo BASE_URL."?a=A/Data_paket/";?>'><button class="btn">Data Paket</button></a></li>
							<li><a href='<?php echo BASE_URL."?a=A/Data_perlengkapan/";?>'><button class="btn">Data Perlengkapan</button></a></li>
							<li><a href='<?php echo BASE_URL."?a=A/Data_pesanan/";?>'><button class="btn">Data Pesanan</button></a></li>
							<li><a href='<?php echo BASE_URL."?a=A/Data_user/";?>'><button class="btn">Data User</button></a></li>
						</ul>
					</div>
				</li>
				<li>
					<a href="<?php echo BASE_URL;?>?a=A/Cetak_laporan/"><button class="btn">Cetak Laporan</button></a>
				</li>
				<li>
					<a href="<?php echo BASE_URL."?a=Home/logout";?>"><button class="btn">Logout</button></a>
				</li>
			</ul>
		</div>
	</div>
</div>