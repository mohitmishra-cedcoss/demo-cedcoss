<?php
   $products = array(
    "Electronics" => array(
         "Television" => array(
              array(
               "id" => "PR001", 
               "name" => "MAX-001",
               "brand" => "Samsung"
              ),
              array(
               "id" => "PR002", 
               "name" => "BIG-301",
               "brand" => "Bravia"
              ),
              array(
               "id" => "PR003", 
               "name" => "APL-02",
               "brand" => "Apple"
              )
             ),
         "Mobile" => array(
              array(
               "id" => "PR004", 
               "name" => "GT-1980",
               "brand" => "Samsung"
              ),
              array(
               "id" => "PR005", 
               "name" => "IG-5467",
               "brand" => "Motorola"
              ),
              array(
               "id" => "PR006", 
               "name" => "IP-8930",
               "brand" => "Apple"
              )
             )
        ),
    "Jewelry" => array(
         "Earrings" => array(
              array(
               "id" => "PR007", 
               "name" => "ER-001",
               "brand" => "Chopard"
              ),
              array(
               "id" => "PR008", 
               "name" => "ER-002",
               "brand" => "Mikimoto"
              ),
              array(
               "id" => "PR009", 
               "name" => "ER-003",
               "brand" => "Bvlgari"
              )
             ),
         "Necklaces" => array(
              array(
               "id" => "PR010", 
               "name" => "NK-001",
               "brand" => "Piaget"
              ),
              array(
               "id" => "PR011", 
               "name" => "NK-002",
               "brand" => "Graff"
              ),
              array(
               "id" => "PR012", 
               "name" => "NK-003",
               "brand" => "Tiffany"
              )
             )    
       )
   );
   $product= $products;
 function showdata()
 {
   global $products;
 $mytable="<table id='mytab'><tr><th>Catergory</th><th>SubCategory</th><th>ID</th><th>Name</th><th>brand</th></tr>";
foreach ($products as $key => $television) 
{
	foreach ($television as $k => $val) {
		foreach ($val as $ke => $v) {
		$mytable.="<tr><td>".$key ."</td><td>".($k)."</td>";
		$mytable.="<td>".($v["id"])."</td><td>".($v["name"])."</td><td>".($v["brand"])."</td></tr>";
		
		
		}
	
	
}

}
	$mytable.="</table>";

echo  $mytable;



 }


?>

<!DOCTYPE html>
<html>
<head>
	<title>My firsrt Page</title>
	<style type="text/css">
    table,th,td{

    	border:2px solid black;
    	border-collapse: collapse;
    	text-align: center;
    }

    



	</style>
</head>
<body>
<?php
       $mytable="<table id='mytab'><tr><th>Catergory</th><th>SubCategory</th><th>ID</th><th>Name</th><th>brand</th></tr>";
foreach ($products as $key => $television) 
{
	foreach ($television as $k => $val) {
		foreach ($val as $ke => $v) {
		$mytable.="<tr><td>".$key ."</td><td>".($k)."</td>";
		$mytable.="<td>".($v["id"])."</td><td>".($v["name"])."</td><td>".($v["brand"])."</td></tr>";
		
		
		}
	
	
}

}
	$mytable.="</table>";

echo  $mytable;

?>
<br/>
<div class=subcategory>
<table>
	<tr><th>SubCategory</th><th>ID</th><th>Name</th><th>brand</th></tr>
<?php
foreach ($products as $key => $television) 
{
	foreach ($television as $k => $val) {
		foreach ($val as $ke => $v) {
			if($k=="Mobile")
			{

?>
<tr><td><?php echo ($key) ?></td><td><?php echo ($k) ?></td><td><?php echo $v["id"] ?></td><td><?php echo $v["name"] ?></td><td><?php echo $v["brand"] ?></td
><td></tr>
<?php
}
}
}
}

?>


</table>

</div>
<div >

<?php
foreach ($products as $key => $television) 
{
	foreach ($television as $k => $val) {
		foreach ($val as $ke => $v) {
			if($v["brand"]=="Samsung")
			{

?>

Product ID:<?php echo $v["id"] ?><br/>
Product Name:<?php echo $v["name"] ?><br/>
Subcategory:<?php echo ($k) ?><br/>
Category:<?php echo ($key) ?><br/>
<?php
}
}
}
}

?>


</div>
<div>
<table>
<tr><th>Catergory</th><th>SubCategory</th><th>ID</th><th>Name</th><th>brand</th></tr>

<?php
foreach ($products as $key => $television) 
{
	foreach ($television as $k => $val) {
		foreach ($val as $ke => $v) {
			if($v["id"]=="PR003")
			{
				unset($products[$key][$k][$ke]);
				
			}
		}
	}
}

foreach ($products as $key => $television) 
{
	foreach ($television as $k => $val) {
		foreach ($val as $ke => $v) {
?>
<tr><td><?php echo ($key) ?></td><td><?php echo ($k) ?></td><td><?php echo $v["id"] ?></td><td><?php echo $v["name"] ?></td><td><?php echo $v["brand"] ?></td
><td></tr>

<?php
}
}
}


?>


</table>



</div>

<div>
<table>
<tr><th>Catergory</th><th>SubCategory</th><th>ID</th><th>Name</th><th>brand</th></tr>
<?php
foreach ($product as $key => $television) 
{
	foreach ($television as $k => $val) {
		foreach ($val as $ke => $v) {
			if($v["id"]=="PR002")
			{
				$product[$key][$k][$ke]["name"]="BIG-555";
				
			}
		}
	}
}

foreach ($product as $key => $television) 
{
	foreach ($television as $k => $val) {
		foreach ($val as $ke => $v) {


?>
<tr><td><?php echo ($key) ?></td><td><?php echo ($k) ?></td><td><?php echo $v["id"] ?></td><td><?php echo $v["name"] ?></td><td><?php echo $v["brand"] ?></td
><td></tr>

<?php
}
}
}


?>


</table>




</div>
<?php
showdata();
?>


</body>
</html>