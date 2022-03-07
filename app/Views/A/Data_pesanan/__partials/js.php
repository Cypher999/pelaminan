<script>
		$(document).ready(function(){
			$(".table").dataTable();
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