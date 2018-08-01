var success='<div class="success">Product Added Successfully.<a href="#" class="close">X</a></div>';
var eror='<div class="error">please enter another Id.<a href="#" class="close">X</a></div>';
var fill='<div class="error">please fill all text field.<a href="#" class="close">X</a></div>';
var num='<div class="error">Id must be number<a href="#" class="close">X</a></div>';
var updatemsg='<div class="success">Product Updated Successfully.<a href="#" class="close">X</a></div>';
var productsdelete='<div class="error">Product deleted Successfully.<a href="#" class="close">X</a></div>';
var products=[]; 
$(document).find("#update_product").hide();
function myFunction(p_id,p_name,p_price,p_quant)
{
	
      if(IsExists(p_id))
      {
        
        $("#notification").html(eror);
       
        
      }
      else{
    var product={};
    product.id=p_id;
    product.name=p_name;
    product.price=p_price;
    product.qt=p_quant;
    products.push(product);
   
      
    console.log(product.id,product.name,product.price,product.qt);
  showData();
   $("#notification").html(success);
	   }
}



function showData()
{  

  
	
 var mytable="<table><tr><th id='headingfirst'>SKU</th><th  id='headingfirst'>Name</th><th id='headingfirst'>Price</th><th>Quantity</th><th>Action</th></tr>";
  console.log("value of a="+products.length);
  for(var i=0;i<products.length;i++)
  {
  	
  	mytable+="<tr><td id='tabledata'>"+products[i].id+"</td><td id='tabledata'>"+products[i].name+"</td>\
  	<td  id='tabledata'>"+products[i].price+"</td><td  id='tabledata'>"+products[i].qt+"</td><td  id='tabledata'><a href='javascript:void(0)'id='link' onclick='editProduct("+products[i].id+");'>\
  	 Edit</a>|<a href='javascript:void(0)'onclick='deleteProduct("+products[i].id+");'>Delete</a></td></tr>";
  }
  mytable+="</table>";
  $('#product_list').html(mytable);
}

function editProduct(pid)
{   
	console.log(pid);
	var i=0;
	$(document).find("#add_product").hide();
	 $(document).find("#update_product").show();
//document.getElementById('btns').style.visibility = 'hidden';
	for(i=0;i<products.length;i++)
	{
		if(pid==products[i].id)
		{    
			$('#product_sku').val(products[i].id);
			$('#product_sku').attr("disabled", "disabled"); 
			
			$('#product_name').val(products[i].name);
			$('#product_price').val(products[i].price);
			$('#product_quantity').val(products[i].qt);
			return products[i];

		}
	}
   
    
}
function update()
{   var i=0;
	var pid=$('#product_sku').val();
	for(i=0;i<products.length;i++)
	{
		if(pid==products[i].id)
		{
			products[i].name=$('#product_name').val();
	        products[i].price=$('#product_price').val();
	        products[i].qt=$('#product_quantity').val();
		}
	
	}
	showData();
	$(document).find("#add_product").show();
	 $(document).find("#update_product").hide();
	  $("#notification").html(updatemsg);
}
	


function deleteProduct(pid)	
{
	var i=0;
	for(i=0;i<products.length;i++)
	{
		if(pid==products[i].id)
		{
            var index = i;
            console.log("value of the index;"+index);

             break; 

		}
		
	}
products.splice(index,1);
	 showData();
	 $("#notification").html(productsdelete);
	return products[i];
}

function IsExists(pid){

		var i="";
		var a=false;
		console.log("value of length ="+products.length);
		for(i=0;i<products.length;i++)
		{
            if(pid==products[i].id)
            {
            	
                a=true;
            }
		}
		return a;
	}


	$(document).ready(function(){

   $("#add_product").click(function(e){
       var p_id=$('#product_sku').val();
	var p_name=$('#product_name').val();
    var p_price=$('#product_price').val();
    var p_quant=$('#product_quantity').val();


   	var isValid = true;

	        $('input[type="text"]').each(function(e) {

	            if ($.trim($(this).val()) == '') {

	                isValid = false;

	                $(this).css({

	                    "border": "1px solid grey",

	                    "background": "#FFCECE"

	                });
	                 $("#notification").html(fill);

	            }




             


	            else {

	                $(this).css({

	                    "border": "",
	                    "background": ""

	                });

	            }

	        });





 $('input[type="number"]').each(function(e) {

	            if ($.trim($(this).val()) == '') {

	                isValid = false;

	                $(this).css({

	                    "border": "1px solid grey",

	                    "background": "#FFCECE"

	                });
	                 $("#notification").html(num);

	            }




             


	            else {

	                $(this).css({

	                    "border": "",
	                    "background": ""

	                });

	            }

	        });






	        if (isValid == false)

	            e.preventDefault();

	        else

	           myFunction(p_id,p_name,p_price,p_quant);
               $('#product_sku').val("");
               $('#product_name').val("");
               $('#product_price').val("");
                $('#product_quantity').val("");

	    });
 
   $("#link").click(function(){
    $(this).parents("tr").hide();



   });
   $("#update_product").click(function(){
     update();
   });


   $("body").on("click",".close",function(){
      	$(this).parents(".error").hide();
      	$(this).parents(".success").hide();
      });






	})