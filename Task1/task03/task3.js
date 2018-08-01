var products=[];

var product101={};
product101.id="101";
product101.name="Product 101";
product101.price="105";
product101.img="football.png";


var product102={};
product102.id="102";
product102.name="Product 102";
product102.price="200";
product102.img="basketball.png";

var product103={};
product103.id="103";
product103.name="Product 103";
product103.price="200";
product103.img="soccer.png";

var product104={};
product104.id="104";
product104.name="Product 104";
product104.price="200";
product104.img="table-tennis.png";

var product105={};
product105.id="105";
product105.name="Product 105";
product105.price="200";
product105.img="tennis.png";

products.push(product101);
products.push(product102);
products.push(product103);
products.push(product104);
products.push(product105);



function myfunction()
{   
     var mydiv=" ";
	 for(var i=0;i<products.length;i++)
	 {  
	 	console.log(products[i].id,products[i].name,products[i].price,products[i].img);

       mydiv+="<div id='product-101' class='product'>\
			<img src='images/"+products[i].img+"'><h3 class='title'>\
			<a href='#'>"+products[i].name+"</a></h3><span>Price: $"+products[i].price+".00</span>\
			<a class='add-to-cart' href='javascript:void(0)' onclick='addToCart("+products[i].id+")'>Add To Cart</a></div>"; 
	 	 }
	
 	document.getElementById('products').innerHTML=mydiv;
}




   var newproducts=[];
  
 function addToCart(a)
 {
 	  if(IsExists(a))
 	  {  
 	  	
 	  	for(var i=0;i<newproducts.length;i++)
	  {
		if(a==newproducts[i].id)
		{
			break;
         
           
		}
 	  }
        newproducts[i].qty=(parseInt(newproducts[i].qty, 10))+1;
           console.log( newproducts[i].qty)
 	  showdata();
 	}
 	else{
 	 var newproduct={};
 	
 	
 	   
 	for(var i=0;i<products.length;i++)
 	{    console.log(i);
 		console.log(products[0].id,products[0].price);
 		if(a==products[i].id)
 		{
 			newproduct.id=products[i].id;
 			newproduct.name=products[i].name;
 			newproduct.price=products[i].price;
 			newproduct.img=products[i].img;
 			newproduct.qty="1";

 			newproducts.push(newproduct);
 			break;

 	    }
 	 }
 }
 	 showdata();
 	
   
}
function showdata()
{

	 var mytable="<table><th>ProductID</th><th>ProductImage</th><th>ProductName</th><th>ProductPrice</th><th>Quantity</th><th>Action</th>";
  console.log("value of a="+newproducts.length);
  for(var i=0;i<newproducts.length;i++)
  {
  	
  	mytable+="<tr><td >"+newproducts[i].id+"</td><td><img id='imag' src='images/"+products[i].img+"'></td><td >"+newproducts[i].name+"</td>\
  	  <td>"+newproducts[i].price+"</td><td id='td"+newproducts[i].id+"'><a href='javascript:void(0)' onclick=changeValue("+newproducts[i].id+")>"+newproducts[i].qty+"</a></td><td>\
  	 <a href='javascript:void(0)'onclick='deleteProduct("+newproducts[i].id+");'>Delete</a></td></tr>";
  }
  mytable+="<tr><td colspan='3'>cartTotal</td><td colspan='4'>"+cartTotal()+"<td></tr></table>";
  
  document.getElementById('demo').innerHTML=mytable;
}

function deleteProduct(pid)	
{
	var i=0;
	for(i=0;i<newproducts.length;i++)
	{
		if(pid==newproducts[i].id)
		{
            var index = i;
            console.log("value of the index;"+index);

             break; 

		}
		
	}
newproducts.splice(index,1);
	 showdata();
	return newproducts[i];
}
function IsExists(pid){

		var i="";
		var a=false;
		console.log("value of length ="+newproducts.length);
		for(i=0;i<newproducts.length;i++)
		{
            if(pid==newproducts[i].id)
            {
            	
                a=true;
            }
		}
		return a;
	}

	function cartTotal(){

		var i="";
		var item_price=0;
		var item_qty=0;
		var item_total=0;
		for(i=0;i<newproducts.length;i++)
		{
		  item_total=item_total+(parseInt(newproducts[i].price))*(parseInt(newproducts[i].qty));
		}
		return item_total;
		
	}

	function changeValue(pid)
	{
		var quant=0;
		for(var i=0;i<newproducts.length;i++)
		{
			if(pid==newproducts[i].id)
			{
               quant=newproducts[i].qty;
               break;

			}
		}
		console.log(quant);
		 document.getElementById("td"+pid).innerHTML="<input type='text' value='"+quant+"' id='T"+pid+"'/><a href='javascript:void(0)' onclick='updateValue("+newproducts[i].id+")'>Save</a>";
	}

	function updateValue(pid)
	{
      for(var i=0;i<newproducts.length;i++)
      {
      	if(pid==newproducts[i].id)
      	{
      		
      		break;
      	}
      }
      	
      	
      	newproducts[i].qty=parseInt(document.getElementById("T"+pid).value);
      	console.log(newproducts[i].qty);
      showdata();
	}