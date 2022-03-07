<script>
	var main_param={};
$(document).ready(function(){
	$(".table").DataTable();
	$(document).on('click','.edit-nama',function(){
		var data_form=$(this).attr('data-id');
		main_param.a=data_form;
		$("#modal-edit").html("<h2>Loading</h2>");
		$.ajax({
			url:"?a=A/Data_user/form_edit_nm",
			method:"POST",
			data:main_param,
			success:function(hasil){
				$("#modal-edit").html(hasil);

			}
		});
	});
	$(document).on('click','.edit-pas',function(){
		var data_form=$(this).attr('data-id');
		main_param.a=data_form;
		$("#modal-edit").html("<h2>Loading</h2>");
		$.ajax({
			url:"?a=A/Data_user/form_edit_pas",
			method:"POST",
			data:main_param,
			success:function(hasil){
				$("#modal-edit").html(hasil);

			}
		});
	});
	$(document).on('click','.cmd-del',function(){
				var url=$(this).attr('url-to');
				var hps=confirm("Hapus user ini ?")
				if(hps){
					window.location.href=base_url()+url
				}
				
			});
});
$(document).scroll(function(){
				var y=$(this).scrollTop();
				if(y>=215){
					$(".mn1").fadeIn()
				}
				else{
					$(".mn1").fadeOut()
				}
			});
</script>