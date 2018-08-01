<?php include 'config.php' ?>
<?php include 'Adminfunction.php' ?>
<?php $page1=basename(__FILE__)?>
<?php  

     $limit = 8;  
if (isset($_GET["page"])) { $page  = $_GET["page"];
                        if($page==0)
                        {
                        	$page=1;
                        }
                       $sql = "SELECT COUNT(id) FROM product";  
										$rs_result = $conn->query($sql);  
										$row = mysqli_fetch_row($rs_result);  
										$total_records = $row[0];  
										$total_pages = ceil($total_records / $limit);  
                           if($page>$total_pages)
                           {
                           	$page=$total_pages;
                           }

 } else { $page=1; };  
$start_from = ($page-1) * $limit;

    
   $previous=$page-1;

     $next=$page+1;


     $product=getproduct($start_from,$limit);
     //print_r($product);
    


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
			
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>ManageProduct</h3>
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>ProductID</th>
								   <th>ProductName</th>
								   <th>ProductImage</th>
								   <th>ProductPrice</th>
								   <th>ProductListPrice</th>
								   <th>ProductCategory</th>
								   <th>ProductDescription</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown" class="action">
												<option value="">Choose an action...</option>
												
												<option value="delete">Delete</option>
											</select>
											<a class="button" id="productDelete">Apply to selected</a>
										</div>
											<div class="pagination">
											<a href="ManageProduct.php" title="First Page">&laquo; First</a>
											<?php
											    $sql = "SELECT COUNT(id) FROM product";  
										$rs_result = $conn->query($sql);  
										$row = mysqli_fetch_row($rs_result);  
										$total_records = $row[0];  
										$total_pages = ceil($total_records / $limit);  
											?>
											<a href="ManageProduct.php?page=<?php echo $page-1 ?>" title="Previous Page">&laquo;prev </a>
											<?php
										for ($i=1; $i<=$total_pages; $i++) {
											if($page==$i)
											{ ?>
												<a href="ManageProduct.php?page=<?php echo $i ?>" class="number current" title="<?php echo $i ?>"><?php echo $i ?></a>
											<?php }
											else
											{ ?>
												<a href="ManageProduct.php?page=<?php echo $i ?>" class="number" title="<?php echo $i ?>"><?php echo $i ?></a>
											<?php }
											
											} ?>
											<a href="ManageProduct.php?page=<?php echo $page+1 ?>" title="Next Page">Next &raquo; </a>
											<a href="ManageProduct.php?page=<?php echo $total_pages ?>" title="Last Page">Last &raquo;</a>
										</div>
											
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
							
								
								<?php foreach ($product as $key => $val) {
									# code...
								     ?>
								     <tr>
									<td><input type="checkbox" class="selectCheckbox" name="productId[]" value="<?php echo $val["id"];  ?>"/></td>
									<td><?php echo $val["id"];  ?></td>
									<td><?php echo $val["name"];  ?></td>
									<td><?php echo "<img height='3%' width='30%' src='../uploads/".$val["img"]."'>";  ?></td>
									<td><?php echo $val["price"];  ?></td>
									<td><?php echo $val["listingprice"];  ?></td>
									<td><?php echo $val["category"];  ?></td>
									<td><?php echo $val["description"];  ?></td>
									  <td>
										<!-- Icons -->
										 <a href="edit.php?id=<?php echo $val["id"];  ?>&action=editp" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="delete.php?id=<?php echo $val["id"];  ?>&action=delep" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 
									</td></tr>
									<?php  }  ?>
								
								
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					       
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
			
			<div class="content-box column-right closed-box">
				
				
				
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			
			<!-- End Notifications -->
			
		<?php include 'footer.php';  ?>
			
		