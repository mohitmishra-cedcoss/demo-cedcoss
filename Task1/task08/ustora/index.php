<?php include 'Head.php' ?>
<?php include  '../SimplaAdmin/config.php' ?>
<?php include '../SimplaAdmin/Adminfunction.php' ?>
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
    
    $s=0;
    $l=3;
   $recent=Starting($s,$l);
   $a=0;
   $b=3;
   $middle=Starting($a,$b)

?>
  <!-- End mainmenu area -->
    
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="img/h4-slide.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">6 <strong>Plus</strong></span>
							</h2>
							<h4 class="caption subtitle">Dual SIM</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide2.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								by one, get one <span class="primary">50% <strong>off</strong></span>
							</h2>
							<h4 class="caption subtitle">school supplies & backpacks.*</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide3.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">Select Item</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide4.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">& Phone</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                           <?php foreach ($product as $key => $val) {
                                    # code...
                                     ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                <?php echo "<img  src='../uploads/".$val["img"]."'>";  ?>
                                  
                                    <div class="product-hover">
                                        <a href="javascript:void(0)" id="<?php echo $val["id"];  ?>"class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="single-product.php?id=<?php echo $val['id']; ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                 </div>
                                
                                <h2><a href="single-product.php?id=<?php echo $val['id']; ?>"><?php echo $val["name"];  ?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins><?php echo $val["price"];  ?></ins> <del><?php echo $val["listingprice"];  ?></del>
                                </div> 
                            </div>

                          <?php  } ?>
                            
         






                           
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                            <img src="img/brand3.png" alt="">
                            <img src="img/brand4.png" alt="">
                            <img src="img/brand5.png" alt="">
                            <img src="img/brand6.png" alt="">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Sellers</h2>
                        <a href="" class="wid-view-more">View All</a>
                  <?php foreach ($recent as $key => $val) {
                                    # code...
                                     ?>


                        <div class="single-wid-product">
                            <a href="single-product.html">  <?php echo "<img class='product-thumb' src='../uploads/".$val["img"]."'>";  ?></a>
                          <h2><a href="single-product.php?id=<?php echo $val['id']; ?>"><?php echo $val["name"];  ?></a>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                            <ins><?php echo $val["price"];  ?></ins> <del><?php echo $val["listingprice"];  ?></del>
                            </div>                            
                        </div>

                    <?php  } ?>
                      
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        <a href="#" class="wid-view-more">View All</a>


 <?php foreach ( $middle as $key => $val) {
                                    # code...
                                     ?>


                        <div class="single-wid-product">
                            <a href="single-product.html">  <?php echo "<img class='product-thumb' src='../uploads/".$val["img"]."'>";  ?></a>
                          <h2><a href="single-product.php?id=<?php echo $val['id']; ?>"><?php echo $val["name"];  ?></a>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                            <ins><?php echo $val["price"];  ?></ins> <del><?php echo $val["listingprice"];  ?></del>
                            </div>                            
                        </div>

                    <?php  } ?>





                      
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top New</h2>
                        <a href="#" class="wid-view-more">View All</a>




                        <?php foreach ($recent as $key => $val) {
                                    # code...
                                     ?>


                        <div class="single-wid-product">
                            <a href="single-product.html">  <?php echo "<img class='product-thumb' src='../uploads/".$val["img"]."'>";  ?></a>
                          <h2><a href="single-product.php?id=<?php echo $val['id']; ?>"><?php echo $val["name"];  ?></a>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                            <ins><?php echo $val["price"];  ?></ins> <del><?php echo $val["listingprice"];  ?></del>
                            </div>                            
                        </div>

                    <?php  } ?>






                        
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
    
    <?php  include 'footer.php' ?>