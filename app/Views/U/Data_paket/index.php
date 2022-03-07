<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("U/Data_paket/__partials/css");?>
</head>
<body>
	<?php $this->view("U/menu");?>
	<?php 
	$this->view("U/Header",$data["user_header"]);
	?>

	<div class="row m-2 lozad">

			<?php $this->view("U/menu_2");?>
		<!-- Dibawah adalah komponen menu sidebar !-->
		<!-- Dibawah adalah komponen utama !-->
		<div class="col-lg-8 col-md-8 col-xl-8 col-sm-8">	
			<?php if(isset($_SESSION["flash"])){
                echo "<br>".$_SESSION["flash"];
                unset($_SESSION["flash"]);
              }?>
		<h2>Daftar Paket Pelaminan Yang Disediakan</h2>
        <br>
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
                <a href="<?php echo BASE_URL."?a=U/Data_paket/Pesan&&key=".$dt["id_pkt"];?>"><input type="button" class="btn btn-outline-primary" value="Pesan Sekarang"></a>
              </div>
            </div>
          <?php }?>
        </div>	
		</div>
	</div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("U/Data_paket/__partials/js");?>
</body>
</html>