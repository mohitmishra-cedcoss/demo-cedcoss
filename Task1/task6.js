
var products=[]; 
 
function myFunction()
{
	var p_id=document.getElementById('pid').value;
	var p_name=document.getElementById('pname').value;
    var p_price=document.getElementById('price').value;
      if(IsExists(p_id))
      {
        
        for(var i=0;i<products.length;i++)
        {
        	if(p_id==products[i].id)
        	{
        		break;
        	}
        }
        alert("id already Exists")
        document.getElementById('pid').value=" ";
        document.getElementById('pname').value=" ";
        document.getElementById('price').value=" ";
        showData();
      }
      else{
    var product={};
    product.id=p_id;
    product.name=p_name;
    product.price=p_price;
    products.push(product);
   

    console.log(product.id,product.name,product.price);
  showData();
	   }
}
function showData()
{  

  
	
 var mytable="<table><tr><th id='headingfirst'>Id</th><th  id='headingfirst'>Name</th><th id='headingfirst'>Price</th><th>Action</th></tr>";
  console.log("value of a="+products.length);
  for(var i=0;i<products.length;i++)
  {
  	
  	mytable+="<tr><td id='tabledata'>"+products[i].id+"</td><td id='tabledata'>"+products[i].name+"</td>\
  	<td  id='tabledata'>"+products[i].price+"</td><td  id='tabledata'><a href='javascript:void(0)' onclick='editProduct("+products[i].id+");'>\
  	 Edit</a>|<a href='javascript:void(0)'onclick='deleteProduct("+products[i].id+");'>Delete</a></td></tr>";
  }
  mytable+="</table>";
  document.getElementById('demo').innerHTML=mytable;
}

function editProduct(pid)
{   
	console.log(pid);
	var i=0;
document.getElementById('btns').style.visibility = 'hidden';
	for(i=0;i<products.length;i++)
	{
		if(pid==products[i].id)
		{    
			document.getElementById('pid').value=products[i].id;
			document.getElementById('pid').disabled=true;
			
			document.getElementById('pname').value=products[i].name;
			document.getElementById('price').value=products[i].price;
			return products[i];
		}
	}
   
}
function update()
{   var i=0;
	var pid=document.getElementById('pid').value;
	for(i=0;i<products.length;i++)
	{
		if(pid==products[i].id)
		{
			products[i].name=document.getElementById('pname').value;
	        products[i].price=document.getElementById('price').value;
		}
	
	}
	showData();
	document.getElementById('btns').style.visibility = 'visible';
	document.getElementById('pid').disabled=false;
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