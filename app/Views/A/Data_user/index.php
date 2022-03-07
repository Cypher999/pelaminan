<html>
<head>
	<?php $this->view("__partials/head");?>
	<?php $this->view("A/Data_user/__partials/css");?>
</head>
<body>
	<?php $this->view("A/menu");?>
	<?php 
	$this->view("A/Header",$data["user_header"]);
	?>

	<div class="row m-2 lozad">

			<?php $this->view("A/menu_2");?>
		<!-- Dibawah adalah komponen menu sidebar !-->
		<!-- Dibawah adalah komponen utama !-->
		<div class="col-lg-8 col-md-8 col-xl-8 col-sm-8">	
			<?php if(isset($_SESSION["flash"])){
                echo "<br>".$_SESSION["flash"];
                unset($_SESSION["flash"]);
              }?>
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
                  <tr>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Status Verifikasi</th>
                    <th>Kontrol</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Status Verifikasi</th>
                    <th>Kontrol</th>
                  </tr>
                </tfoot>
                <tbody>
                
                
<?php foreach ($data["user"] as $dt) {?>
                  <tr>
                    <td><?php echo $dt["nm_user"];?></td>
                    <td><?php echo $dt["nm_lengkap"];?></td>
                    <td><?php 
                    $status=["Belum Terverifikasi","Sudah terverifikasi"];
                    echo $status[$dt["verified"]];?></td>
                    <td><?php if($dt["id_user"]==$_SESSION["id_user_pelaminan"]){;?><input type="button" href="#" class="text-primary btn btn-small edit-nama" data-target="#modal-edit" data-toggle="modal" value="Edit nama" data-id="<?php echo $dt["id_user"];?>">
                    <input type='button' href="#" class="text-primary btn btn-small edit-pas" data-target="#modal-edit" data-toggle="modal" value="Edit password" data-id="<?php echo $dt["id_user"];?>"><?php } ?>   <input type="button" class="text-danger btn btn-small cmd-del" url-to="?a=User/Del&&key=<?php echo $dt["id_user"];?>" value="Hapus Data"></td>
                  </tr>
                <?php } ?>

                </tbody>
                </table>
		</div>
	</div>
  <div class="modal" id="modal-edit">
      
    </div>
<?php $this->view("footer");?>
<?php $this->view("__partials/js");?>
<?php $this->view("A/Data_user/__partials/js");?>
</body>
</html>


