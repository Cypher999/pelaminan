<nav class="navbar mn1 navbar-expand-md navbar-dark" style="width: 100%;background-color:#00CED1;z-index:1000;position: fixed;top:0%;display:none">
	
	<a class="navbar-brand" href="#">MAHKOTA PELAMINAN</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsiblenavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<div class='nav-link'>
					<a class="btn sing-it" href="index.php">Home</a>
				</div>
			</li>
			<li class="nav-item">
				<div class="dropdown nav-link">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Menu data</button>
					<div class="dropdown-menu">
						<a class="btn dropdown-item" href="<?php echo BASE_URL;?>?a=A/Data_paket/">Data Paket</a>
						<a class="btn dropdown-item" href="<?php echo BASE_URL;?>?a=A/Data_perlengkapan/">Data Perlengkapan</a>
						<a class="btn dropdown-item" href="<?php echo BASE_URL;?>?a=A/Data_pesanan/">Data Pesanan</a>
						<a class="btn dropdown-item" href="<?php echo BASE_URL;?>?a=A/Data_User/">Data user</a>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<div class='nav-link'>
					<a class="btn sing-it" href="<?php echo BASE_URL;?>?a=A/Cetak_laporan/">Print Laporan</a>
				</div>
			</li>
			<li class="nav-item">
				<div class='nav-link'>
					<a class="btn sing-it" href="<?php echo BASE_URL;?>?a=Home/logout">Logout</a>
				</div>
			</li>
		</ul>
	</div>
	</nav>