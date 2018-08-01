<?php include 'config.php' ?>
<?php include 'Adminfunction.php' ?>
<?php $page1=basename(__FILE__)?>
<?php
  $product=getCategoryProduct();
     //print_r($product);
  $sucess=FALSE;
 if(isset($_REQUEST['submit']))
 {

 	
   $ProductName=$_REQUEST["Product"]; 
   $ProductPrice=$_REQUEST['ProductPrice']; 
     $ProductListingPrice=$_REQUEST['ProductListingPrice']; 
    $image=$_FILES['large-input']['name'];
     $imageTmp=$_FILES['large-input']['tmp_name'];
   $ProductImage=uploadFile($image,$imageTmp);
   $ProductCategory=$_REQUEST['dropdown'];
   $ProductDescription=$_REQUEST['textfield'];
   
 global $conn;
 $sql="insert into product(name,price,listingprice,img,category,description) 
             values('$ProductName', $ProductPrice,$ProductListingPrice,'$ProductImage','$ProductCategory','$ProductDescription')";
if($conn->query($sql)==TRUE)
{
   $sucess=TRUE;
  

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
			
			<!-- Page Head -->
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
					
						<form   style="margin-left: 2%"action="#" method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>ProductName</label>
										<input style="padding-right: 760px" class="text-input small-input" type="text" id="small-input" name="Product" />  <span></span><!-- Classes for input-notification: success, error, information, attention -->
										<br />
								</p>
								
								<p>
									<label>ProductPrice</label>
									<input style="padding-right: 500px" class="text-input medium-input datepicker" type="text" id="ProductPrice" name="ProductPrice" />  <span></span>
								</p>
								
								<p>
									<label>ProductListingPrice</label>
									<input class="text-input large-input" type="text" id="ProductListing" name="ProductListingPrice" /> <span></span>
								</p>

								<p>
									<label>ProductImage</label>
									<input class="text-input large-input" type="file" id="large-input" name="large-input" /><span></span>
								</p>
								
								
								
								<p>
									<label>ProductCategory</label>              
									<select name="dropdown"  id="dropdown"class="small-input">
                                        <option  value="">--select--</option>
									<?php foreach ($product as $key => $val) {
										# code...
									 ?>
										<option value="<?php echo $val['name']  ?>"><?php echo $val['name']  ?></option>
										<?php } ?>
									</select> <span></span>
								</p>
								
								<p>
									<label>ProductDescription</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea><span></span>
								</p>
								
								<p>
									<a id='add_product' href='javascript:void(0)' onClick="validatePage()" class='button'>Submit</a>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				<?php include 'footer.php'; ?>
			</div> <!-- End .content-box -->
			
			
			
			<div class="clear"></div>
			<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
			<script type="text/javascript">
				var name=false; var productprice=false;var ProductListing=false;var images=false;var category=false;var textarea=false;
				$(document).ready(function(){
                 
                $('#small-input').blur(function(){
                  var a=$(this).val();
                  console.log(a);
                 if(empty(a))
                 {
                 		//$(this).next().removeClass("notification error png_bg");
                 		$(this).next().removeClass("input-notification success png_bg");
                 	$(this).next().addClass("input-notification error png_bg");
                 	$(this).next().text("this is empty");
                 	name=false;
                 	 //validatePage();
                 	console.log(name);
                 }
                 
                
                 else{ 
                 	
                 	$(this).next().removeClass("input-notification error png_bg");
                 	$(this).next().addClass("input-notification success png_bg");
                 	$(this).next().text("ok");
                 	name=true;
                 	 //validatePage();
                 	console.log(name+"this is true");
                 	//console.log("this is not empty");
                 }
                   
                });


                $('#ProductPrice').blur(function(){
                  var a=$(this).val();
                 if(empty(a))
                 {
                 		//$(this).next().removeClass("notification error png_bg");
                 		$(this).next().removeClass("input-notification success png_bg");
                 	$(this).next().addClass("input-notification error png_bg");
                 	$(this).next().text("this is empty");
                 	 productprice=false;
                 	  //validatePage();
                 	//console.log("this is empty");
                 }
                  else if(isNaN(a))
                 {
                 		//$(this).next().removeClass("notification error png_bg");
                 		$(this).next().removeClass("input-notification success png_bg");
                 	$(this).next().addClass("input-notification error png_bg");
                 	$(this).next().text("Must be Number");
                 	 productprice=false;
                 	 // validatePage();
                 	//console.log("this is empty");
                 }
                 else
                 {   
                 	$(this).next().removeClass("input-notification error png_bg");
                 	$(this).next().addClass("input-notification success png_bg");
                 	$(this).next().text("ok");
                 	 productprice=true;
                 	  //validatePage();
                 	//console.log("this is not empty");
                 }

                });

                 $('#ProductListing').blur(function(){
                  var a=$(this).val();
                 if(empty(a))
                 {
                 		//$(this).next().removeClass("notification error png_bg");
                 		$(this).next().removeClass("input-notification success png_bg");
                 	$(this).next().addClass("input-notification error png_bg");
                 	$(this).next().text("this is empty");
                 	console.log("this is empty");
                 	 ProductListing=false;
                 	  //validatePage();
                 }
                  else if(isNaN(a))
                 {
                 		//$(this).next().removeClass("notification error png_bg");
                 		$(this).next().removeClass("input-notification success png_bg");
                 	$(this).next().addClass("input-notification error png_bg");
                 	$(this).next().text("Must be Number");
                 		 ProductListing=false;
                 		//  validatePage();
                 	//console.log("this is empty");
                 }
                 else
                 {   
                 	$(this).next().removeClass("input-notification error png_bg");
                 	$(this).next().addClass("input-notification success png_bg");
                 	$(this).next().text("ok");
                 	 ProductListing=true;
                 	 
                 	//console.log("this is not empty");
                 }

                });

                   $('#large-input').change(function(){
                  var a=$(this).val();
                  console.log(a);
                 if(empty(a))
                 {
                 		//$(this).next().removeClass("notification error png_bg");
                 		$(this).next().removeClass("input-notification success png_bg");
                 	$(this).next().addClass("input-notification error png_bg");
                 	$(this).next().text("this is empty");
                 	 images=false;
                 	  //validatePage();
                 	 console.log(images);
                 	//console.log("this is empty");
                 }
                 
                
                 else{ 
                 	
                 	
                 	$(this).next().removeClass("input-notification error png_bg");
                 	$(this).next().addClass("input-notification success png_bg");
                 	$(this).next().text("ok");
                 	 images=true;
                 	  //validatePage();
                 	  console.log(images+"this is not true");
                 	//console.log("this is not empty");
                 }
                   
                });
                
                 $('#dropdown').click(function(){
                  var a=$(this).val();

                 if(empty(a))
                 {     
                 		//$(this).next().removeClass("notification error png_bg");
                 		$(this).next().removeClass("input-notification success png_bg");
                 	$(this).next().addClass("input-notification error png_bg");
                 	$(this).next().text("this is empty");
                 	//console.log("this is empty");
                 	 category=false;
                 	  //validatePage();
                 }
                 
                
                 else{ 
                 	
                 	
                 	$(this).next().removeClass("input-notification error png_bg");
                 	$(this).next().addClass("input-notification success png_bg");
                 	$(this).next().text("ok");
                 	 category=true;
                 	  //validatePage();
                 	//console.log("this is not empty");
                 }
                   
                });


                 $('#textarea').blur(function(){
                  var a=$(this).val();
                 if(empty(a))
                 {
                 		//$(this).next().removeClass("notification error png_bg");
                 		$(this).next().removeClass("input-notification success png_bg");
                 	$(this).next().addClass("input-notification error png_bg");
                 	$(this).next().text("this is empty");
                 	 textarea=false;
                 	 // validatePage();
                 	//console.log("this is empty");
                 }
                 
                
                 else{ 
                 	
                 	
                 	$(this).next().removeClass("input-notification error png_bg");
                 	$(this).next().addClass("input-notification success png_bg");
                 	$(this).next().text("ok");
                 	 textarea=true;
                 	 //validatePage();
                 	//console.log("this is not empty");
                 }
                   
                });

                


               });
             
             function validatePage(){
             	
            	console.log(name+"-name");
            	console.log(productprice+"-price");
            	console.log(ProductListing+"-selling_price");
            	console.log(category+"-category");
            	console.log(images+"-imageFile");
            	console.log(textarea+"-textarea");
            	if(!name){
            		$("#small-input").focus();
            		 displayError("Can't be empty","#small-input");
            		 console.log("hello my is"+name);
            	}
            	if(!productprice){
                   $("#ProductPrice").focus();
            		 displayError("Can't be empty or string","#ProductPrice");
            	}
            	if(!ProductListing){
            		$("#ProductListing").focus();
            		 displayError("Can't be empty or string","#ProductListing");
            	}
            	if(!images){
                      $("#large-input").focus();
            		 displayError("Please select a category","#large-input");
            	}
            	if(! category){
                     $("#dropdown").focus();
            		 displayError("Please select a file to upload","#dropdown");
            	}
            		if(!textarea){
                     $("#textarea").focus();
            		 displayError("Please select a file to upload","#textarea");
            	}
            	if((name) && (productprice) && (ProductListing) && (images) && (category)&& (textarea)){
                  console.log(" there");
                 $("#add_product").parent().html("<input id='add_product' class='button' name='submit' type='submit' value='Submit'/>");
            		
            	}
            	else{
            		

                  console.log("i am not there");
            		 $("#add_product").parent().html("<a id='add_product' href='javascript:void(0)'onClick='validatePage()' class='button'>Submit</a>");
            		
            	}
            }
				
              function displayError(msg,id){
     			 $(id).next().removeClass("input-notification success png_bg");
                 $(id).next().addClass("input-notification error png_bg");
                 $(id).next().text(msg);
                   //$("#add_product").attr('disabled',true);
     		}
     		function displaySuccess(msg,$id){	  
     			 $(this).next().removeClass("input-notification error png_bg");
                 $(this).next().addClass("input-notification success png_bg");
                $(this).next().text($msg);  
     		}

				function empty(a)
				{ 
                    var b=false;
                  if(a=='')
                  {
                    b=true;
                  }
                  return b;
				}

			</script>
			
			<!-- End Notifications -->
			
		