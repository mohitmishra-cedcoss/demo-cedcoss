<?php include 'config.php' ?>
<?php include 'Adminfunction.php' ?>
<?php $page1=basename(__FILE__); ?>
          
<?php  

     $limit = 2;  
if (isset($_GET["page"])) { $page  = $_GET["page"];
                        if($page==0)
                        {
                        	$page=1;
                        }
                       $sql = "SELECT COUNT(id) FROM Users";  
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


     $product=getUser($start_from,$limit);
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
								   <th>ID</th>
								   <th>Name</th>
								   <th>Image</th>
								   <th>Password</th>
								   <th>Type</th>
								   <th>Gender</th>
								   
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
											<a class="button" id="userDelete">Apply to selected</a>
										</div>
										
										<?php  
										$sql = "SELECT COUNT(id) FROM Users";  
										$rs_result = $conn->query($sql);  
										$row = mysqli_fetch_row($rs_result);  
										$total_records = $row[0];  
										$total_pages = ceil($total_records / $limit);  

										$pagLink = "<div class='pagination'>
                                         <a href='Manageuser.php?page=1'>&laquoFirst</a>
									     ";  
										for ($i=1; $i<=$total_pages; $i++) { 

										if($page==$i)
										{ 
             							$pagLink .= "<a href='Manageuser.php?page=".$i."'class='number current'>".$i." </a>";  
											}
											else
											{
												$pagLink .= "<a href='Manageuser.php?page=".$i."'class='number'>".$i." </a>";  

											}
										};  
										echo $pagLink . "<a href='Manageuser.php?page=".$limit."'>&laquoLast</a>
                                            <a href='Manageuser.php?page=".$next."'>&laquoNext</a>
                                             <a href='Manageuser.php?page=".$previous."'>&laquoPrevious</a>

										</div>";  
											?>
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
									<td><?php echo "<img height='3%' width='10%' src='../uploads/".$val["img"]."'>";  ?></td>
									<td><?php echo $val["password"];  ?></td>
									<td><?php echo $val["type"];  ?></td>
									<td><?php echo $val["gender"];  ?></td>
								
									  <td>
										<!-- Icons -->
										 <a href="edituser.php?id=<?php echo $val["id"];  ?>&action=editp" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="delete.php?id=<?php echo $val["id"];  ?>&action=deleU" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 
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
