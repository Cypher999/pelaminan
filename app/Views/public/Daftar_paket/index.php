<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("public/Daftar_paket/__partials/css");?>
</head>
<body>
	<?php $this->view("public/menu");?>
	<div class="container col-lg-12">
		<?php $this->view("public/Header"); ?>	
		<div class="row">
			<?php $this->view("public/menu_2");?>		
			<div class="col-lg-8 mt-2 mb-2">
        <h2>Daftar Paket Pelaminan Yang Disediakan</h2>
        <br>
        <p>Login untuk memesan</p><br>
        <div class="row">
          <?php foreach($data["paket"] as $dt){?>
            <div class="card col-lg-3 m-2 lozad">
              <div class="card-header">
                <h2><?php echo $dt["nm_pkt"];?></h2>
              </div>
              <div class="card-body">
                <?php
                $cek_file="files/foto_paket/".$dt["id_pkt"].".jpg";
                if(file_exists($cek_file)){
                  $cek_file=BASE_URL.$cek_file;
                 }
                 else{
                  $cek_file="";
                 }?>
                
                <img src="<?php echo $cek_file;?>" width='200' height='200'>
              </div>
              <div class="card-footer">
                Harga : IDR <?php
                echo $dt["hrg"];?>,00<br>
                <a href="<?php echo BASE_URL;?>?a=Daftar_paket/prev&&key=<?php echo $dt["id_pkt"];?>"><input type="button" class="btn btn-outline-primary" value="lihat rincian"></a>
              </div>
            </div>
          <?php }?>
        </div>
			</div>
<?php $this->view("__partials/js");?>
<?php $this->view("public/Daftar_paket/__partials/js");?>
</body>
</html>