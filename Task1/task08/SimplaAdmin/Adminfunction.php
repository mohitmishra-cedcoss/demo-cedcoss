<?php include 'config.php' ?>
<?php  
function uploadFile($image,$imageTmp){
		$target_dir = "../uploads/";
		$target_file = $target_dir . basename($image);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_dir . basename($image),PATHINFO_EXTENSION));
		        if (move_uploaded_file($imageTmp, $target_dir . basename($image) )) {
		        return basename($image);
		        //$image=basename($image);
		        } else {
		            echo "Sorry, there was an error uploading your file.";
		        }
			}


 function getproduct($start_from,$limit)
 { 
 	$product = array();
   global $conn;
   
  
$sql = "SELECT * FROM product ORDER BY id ASC LIMIT $start_from, $limit";  

   
   $data=$conn->query($sql);
   while($row=$data->fetch_array(MYSQLI_ASSOC))
   {
     $id = $row["id"];
     $product_name = $row["name"];
     $price = $row["price"];
      $pricels = $row["listingprice"];
       $priceCategory = $row["category"];
       $priceDesc = $row["description"];
      $img=$row["img"];
      $pric=array('id' =>$id ,'name'=>$product_name,'img'=>$img,'price'=>$price,"listingprice"=> $pricels,"category"=> $priceCategory,"description"=> $priceDesc);
       array_push($product,$pric);

   }

   return $product;
 }

 function getcategory($start_from,$limit)
 { 
 	$product = array();
   global $conn;
   $sql = "SELECT * FROM category ORDER BY id ASC LIMIT $start_from, $limit"; 
   $data=$conn->query($sql);
   while($row=$data->fetch_array(MYSQLI_ASSOC))
   {
     $id = $row["id"];
     $product_name = $row["name"];
     
      $pric=array('id' =>$id ,'name'=>$product_name);
       array_push($product,$pric);

   }

   return $product;
 }
 function getUser($start_from,$limit)
 { 
 	$product = array();
   global $conn;
   $sql = "SELECT * FROM Users ORDER BY id ASC LIMIT $start_from, $limit"; 
   $data=$conn->query($sql);
   while($row=$data->fetch_array(MYSQLI_ASSOC))
   {
     $id = $row["id"];
     $Username = $row["name"];
     $pass = $row["password"];
      $type = $row["type"];
       $gender = $row["gender"];
      
      $img=$row["img"];
     
      $pric=array('id' =>$id ,'name'=>$Username,'img'=>$img,'password'=>$pass,"type"=> $type,"gender"=> $gender);
       array_push($product,$pric);

   }

   return $product;
 }
function getCategoryProduct()
 { 
 	$product = array();
   global $conn;
   $sql = "SELECT * FROM category"; 
   $data=$conn->query($sql);
   while($row=$data->fetch_array(MYSQLI_ASSOC))
   {
     $id = $row["id"];
     $product_name = $row["name"];
     
      $pric=array('id' =>$id ,'name'=>$product_name);
       array_push($product,$pric);

   }

   return $product;
 }
 function Product()
 { 
 	$product = array();
   global $conn;
   
  
$sql = "SELECT * FROM product";  

   
   $data=$conn->query($sql);
   while($row=$data->fetch_array(MYSQLI_ASSOC))
   {
     $id = $row["id"];
     $product_name = $row["name"];
     $price = $row["price"];
      $pricels = $row["listingprice"];
       $priceCategory = $row["category"];
       $priceDesc = $row["description"];
      $img=$row["img"];
      $pric=array('id' =>$id ,'name'=>$product_name,'img'=>$img,'price'=>$price,"listingprice"=> $pricels,"category"=> $priceCategory,"description"=> $priceDesc);
       array_push($product,$pric);

   }
   return $product;
}


 function Starting($start_from,$limit)
 { 
 	$product = array();
   global $conn;
   
  
$sql = "SELECT * FROM product ORDER BY id ASC LIMIT $start_from, $limit";  

   
   $data=$conn->query($sql);
   while($row=$data->fetch_array(MYSQLI_ASSOC))
   {
     $id = $row["id"];
     $product_name = $row["name"];
     $price = $row["price"];
      $pricels = $row["listingprice"];
       $priceCategory = $row["category"];
       $priceDesc = $row["description"];
      $img=$row["img"];
      $pric=array('id' =>$id ,'name'=>$product_name,'img'=>$img,'price'=>$price,"listingprice"=> $pricels,"category"=> $priceCategory,"description"=> $priceDesc);
       array_push($product,$pric);

   }

   return $product;
 }
function User($id)
 { 
 	$product = array();
   global $conn;
   $sql = "SELECT * FROM Users where id=$id"; 
   $data=$conn->query($sql);
   while($row=$data->fetch_array(MYSQLI_ASSOC))
   {
     $id = $row["id"];
     $Username = $row["name"];
     $pass = $row["password"];
      $type = $row["type"];
       $gender = $row["gender"];
      
      $img=$row["img"];
     
      $pric=array('id' =>$id ,'name'=>$Username,'img'=>$img,'password'=>$pass,"type"=> $type,"gender"=> $gender);
       array_push($product,$pric);

   }

   return $product;
 }








?>