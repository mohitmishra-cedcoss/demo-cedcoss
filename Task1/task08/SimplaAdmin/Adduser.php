<?php include 'config.php' ?>
<?php include 'Adminfunction.php' ?>
<?php $page1=basename(__FILE__)?>
<?php
  //$product=getcategory();
     //print_r($product);
$sucess=false;
 if(isset($_REQUEST['submit']))
 {
   $UserName=$_REQUEST["Username"]; 
   $Password=$_REQUEST['Password']; 
     $Gender=$_REQUEST['Gender']; 
    $image=$_FILES['large-input']['name'];
     $imageTmp=$_FILES['large-input']['tmp_name'];
   $UserImage=uploadFile($image,$imageTmp);
   $UserType=$_REQUEST['dropdown'];
   //$ProductDescription=$_REQUEST['textfield'];
   
 global $conn;
 $sql="insert into Users(name,password,type,img,gender) 
             values('$UserName', '$Password','$UserType','$UserImage','$Gender')";
if($conn->query($sql)==TRUE)
{
   $sucess=true;
  

}
else
{
	echo "Eror inserting in table".$conn->error;
	
}
   
 }


?>
<?php include 'header.php' ?>
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		 <?php include 'sidebar.php'; ?>
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			<?php   if($sucess)  echo '<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Record inserted successfully
				</div>
			</div>';  ?>
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Add Product</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form  id="userform" style="margin-left: 2%"action="#" method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>UserName</label>
										<input class="text-input small-input" type="text" id="small-input" name="Username" />  <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								
								<p>
									<label>Password</label>
									<input class="text-input medium-input datepicker" type="text" id="ProductPrice" name="Password" /> 
								</p>
								
								<p>
									<label>Gender</label>
									Male<input type="radio" id="large-input" name="Gender" value="Male"/>Female
									<input type="radio" id="large-input" name="Gender" value="Female" />
								</p>

								<p>
									<label>UserImage</label>
									<input class="text-input large-input" type="file" id="large-input" name="large-input" />
								</p>
								
								
								
								<p>
									<label>Type</label>              
									<select name="dropdown" class="small-input">

											<option value="User">User</option>
									        <option value="Admin">Admin</option>
										
										
									</select> 
								</p>
								
								
								<p>
									<input class="button" type="submit" name="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
			
			<div class="clear"></div>
			
			
			
			<!-- End Notifications -->
			
			<div style="margin-left: 50%"id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
	</div>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
 	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
 	<script type="text/javascript">
 		
   $("#userform").validate({

       rules:{
            Username:"required"   

       }

   })

 	</script>

	</body>
</html>
