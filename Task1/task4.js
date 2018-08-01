var products=[];
	function addProduct(){
         var pId =document.getElementById("pId").value;
         var pName =document.getElementById("pName").value;
         var pPrice =document.getElementById("pPrice").value;
         var product = {}; 
         product.Id=pId;
         product.Name=pName;
         product.Price=pPrice;
         products.push(product);
         showProduct();
         console.log("Data: "+product.Id+" "+product.Name+" "+product.Price+" ");
         
	}
	function showProduct(){

		var i="";
		console.log("value of length ="+products.length);
		var p_table="<table><thead><tr><th>Id</th><th>Name</th><th>Price</th><th>Actiom</th></tr></thead><tbody>";
		for(i=0;i<products.length;i++)
		//while(i<=products.length)
		{
		console.log("value of i ="+i);
		  //p_table="<tr><td>"+i+"</td><td>"+products[i].Id+"</td></tr>"
          p_table+="<tr><td>"+products[i].Id+"</td><td>"+products[i].Name+"</td>\
          <td>"+products[i].Price+"</td><td><a href='javascript:void(0)' onclick='editProduct("+products[i].Id+");'>\
          <i class='fa fa-edit'></i> Edit</a>|<a href='javascript:void(0)'>\
          <i class='fa fa-trash-o' onclick='deleteProduct("+products[i].Id+");'></i></a></td></tr>";
          
         //i++;
		}
		p_table+="</tbody></table>";
		document.getElementById("product_table").innerHTML=p_table;
	}
	




	