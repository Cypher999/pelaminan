<script>
	function load_data(abc){
		$.ajax({
					url:base_url()+"?a=A/Data_perlengkapan/list&&key="+abc,
					success:function(hasil){
						$(".table-place").html(hasil);

						$(".table").dataTable();
					}
				});
	}
		$(document).ready(function(){
			load_data("-");
			$(document).on('change',".cmb-ubah",function(){
				var prl=$(this).val();
				load_data(prl);
			});
			$(document).on('click','.cmd-edit',function(){
				var data_form=$(this).attr('data-id');

				$("#modal-edit").html("<h2>Loading</h2>");
				$.ajax({
					url:base_url()+"?a=A/Data_perlengkapan/form_edit&&key="+data_form,
					success:function(hasil){
						$("#modal-edit").html(hasil);

					}
				});
			});
			$(document).on('hidden.bs.modal','#modal-edit',function(){
				$("#modal-edit").html("");
			});
			$(document).on('click','.cmd-del',function(){
				var url=$(this).attr('url-to');
				var hps=confirm("Hapus data ini ?")
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