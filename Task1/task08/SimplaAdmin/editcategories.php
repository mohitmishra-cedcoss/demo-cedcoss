<?php include 'config.php' ?>
<?php include 'Adminfunction.php' ?>
<?php $page1=basename(__FILE__)?>
<?php
   //$product=getcategory();
 $id=$_REQUEST['id'];
 $sql="select * from category where id=$id";
 $result=$conn->query($sql);
 $productCount = $result->num_rows; 
				while($row = $result->fetch_array(MYSQLI_ASSOC))
   			          { 
                     if($id==$row["id"])
                     {
                       $productname=$row["name"];
                       echo $productname;
                      
                     }
                 }


      if(isset($_REQUEST['submit']))
 {
   $ProductName=$_REQUEST["Product"]; 
   
   
 global $conn;
 $sql="update  category set name='$ProductName' where id=$id";
if($conn->query($sql)==TRUE)
{
   echo "Record updated Sucessfuly";
  

}
else
{
	echo "Eror updating in table".$conn->error;
	
}
   
 }



?>
<?php include 'header.php' ?>
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		 <?php include 'sidebar.php'; ?>
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			
		<!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="#" style="margin-left: 2%"method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>ProductName</label>
										<input class="text-input small-input" value="<?php  echo $productname  ?>"    type="text" value="$productname" id="small-input" name="Product" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								
								
									<input class="button" type="submit" name="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div>
			</div> <!-- End .content-box -->
			
			
			
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			
			<!-- End Notifications -->
			
			
		</div> <!-- End #main-content -->
	</div></body>
</html>
