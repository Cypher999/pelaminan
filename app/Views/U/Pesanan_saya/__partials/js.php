<script>
	function prev_img(a){
		var gbr=document.getElementById(a);
		gbr.src=URL.createObjectURL(event.target.files[0]);
	}
		$(document).ready(function(){
			$(".table").dataTable();
			$(document).on("click",".cmd-lunas",function(){
				var url=$(this).attr('data-id');
				$("#form-lunas").attr("action",url);
			})
			
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