<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div>
			<!-- End #footer -->
			</div> <!-- End #main-content -->
	</div>
			<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
			<script type="text/javascript">



$(document).ready(function(){

$("#productDelete").click(function(){
				var checkedValue=[];
				var value=$(".action").val();
				$(':checkbox:checked').each(function(i){
	          	checkedValue[i] = $(this).val();
	        	});

				//console.log(checkedValue +" "+value);
				//console.log(value);
				//checkedValue = $('.selectCheckbox').val();
				//var opration=$('#delete').val();
				
				if(checkedValue!=null && value=="delete")
				{
				 	//console.log(checkedValue +" "+value);
				 	$.ajax({
					method:"POST",
					url:"bulkdelete.php",
					data:{id:checkedValue,action:'product'}
				}).done(function(data){
						window.location.href="ManageProduct.php";
				});
				 }
				// else
				// {
				// 	console.log("Checked again");
				// }
				
		 	});



  $("#userDelete").click(function(){
				var checkedValue=[];
				var value=$(".action").val();
				$(':checkbox:checked').each(function(i){
	          	checkedValue[i] = $(this).val();
	        	});

				//console.log(checkedValue +" "+value);
				//console.log(value);
				//checkedValue = $('.selectCheckbox').val();
				//var opration=$('#delete').val();
				
				if(checkedValue!=null && value=="delete")
				{
				 	//console.log(checkedValue +" "+value);
				 	$.ajax({
					method:"POST",
					url:"bulkdelete.php",
					data:{id:checkedValue,action:'user'}
				}).done(function(data){
						window.location.href="Manageuser.php";
				});
				 }
				// else
				// {
				// 	console.log("Checked again");
				// }
				
		 	});
  }); 

</script>



	</body>
</html>
