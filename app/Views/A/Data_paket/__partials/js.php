<script>
	function prev_img(a){
		var gbr=document.getElementById(a);
		gbr.src=URL.createObjectURL(event.target.files[0]);
	}
		$(document).ready(function(){
			$(".table").dataTable();
			$(document).on('click','.cmd-edit',function(){
				var data_form=$(this).attr('data-id');

				$("#modal-edit").html("<h2>Loading</h2>");
				$.ajax({
					url:base_url()+"?a=A/Data_paket/form_edit&&key="+data_form,
					success:function(hasil){
						$("#modal-edit").html(hasil);

					}
				});
			});
			$(document).on('click','.cmd-del',function(){
				var url=$(this).attr('url-to');
				var hps=confirm("Hapus data ini ?")
				if(hps){
					window.location.href=base_url()+url
				}
				
			});
			$(document).on('hidden.bs.modal','#modal-edit',function(){
				$("#modal-edit").html("");
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