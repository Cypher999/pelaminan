<script>
$(document).ready(function(){
	$(".table").DataTable();
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