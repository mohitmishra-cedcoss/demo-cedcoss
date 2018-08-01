<?php 

include 'config.php';
 function showdata()
 {
 global $products;
 foreach ($products as $key => $val) 
 {
 	
 		
             echo '<div id='.$key.' class="product">';
			 echo	'<img src="images/'.$val["img"].'.png">';
			 echo	'<h3 class="title"><a href="#">Product'.$val["id"].'</a></h3>';
			 echo '<span>Price: $'.$val["price"].'</span>';
			 echo '<a class="add-to-cart" id='.$val["id"].' href="javascript:void(0)">Add To Cart</a></div>';
			



 	
 }



 }



?>






<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("body").on("click",".remove",function(){
     var pid=$(this).attr("id");
     console.log(pid);
$.ajax({
  method: "POST",
  url: "display.php",
  data: { id: pid,action:'delete' },
  dataType: "json"
}).done(function( msg ) {

	console.log(msg);
    $("#demo").html(showdata(msg));
    
 

   });

	});

});


 $(document).ready(function(){
  
  $(".add-to-cart").click(function(){

var pid=$(this).attr("id");
$.ajax({
  method: "POST",
  url: "display.php",
  data: { id: pid,action:'add' },
  dataType: "json"
}).done(function( msg ) {

	console.log(msg);
    $("#demo").html(showdata(msg));
    
 

   });

   
});

  });


  


 
function showdata(msg)
{

 console.log(msg);
var mytable="<table><tr><th>ProductID</th><th>ProductImage</th><th>ProductName</th><th>ProductPrice</th><th>Quantity</th><th>Action</th></tr>";
var total=0;
var i=0;
while(i<msg.length)
{
	console.log(msg[i]);

 
mytable+="<tr><td>"+msg[i].id+"</td>\
               <td><img src='images/"+msg[i].img+".png' width='100px' height='100px'></td>\
               <td>Product"+msg[i].id+"</td>\
               <td>$"+msg[i].price+"</td>\
                <td>"+msg[i].qt+"</td>\
                 <td><a class='remove' id='"+msg[i].id+"' href='javascript:void(0)'>X</td>\
                    </tr>";

total=total+(parseInt(msg[i].price))*(parseInt(msg[i].qt));
i=i+1;
}
mytable+="<tr><td colspan='3'>cartTotal</td><td colspan='4'>$"+total+"<td></tr></table>";
return mytable;

}


</script>
    
    <title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="header">
		<?php include 'header.php' ?>
	</div>

<div id="demo">
</div>



    <div id="main">
		<div id="products">
			<?php
             showdata();

			?>
		</div>

		<div id = txtHint>

		</div>
	</div>
	<div id="footer">
		<?php include 'footer.php' ?>
	</div>
</body>
</html>