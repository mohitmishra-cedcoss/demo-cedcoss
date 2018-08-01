var products = [{
					"id": "100",
					"name": "iPhone 4S",
					"brand": "Apple",
					"os": "iOS"
				},
				{
					"id": "101",
					"name": "Moto X",
					"brand": "Motorola",
					"os": "Android"	
				},
				{
					"id": "102",
					"name": "iPhone 6",
					"brand": "Apple",
					"os": "iOS"
				},
				{
					"id": "103",
					"name": "Samsung Galaxy S",
					"brand": "Samsung",
					"os": "Android"
				},
				{
					"id": "104",
					"name": "Google Nexus",
					"brand": "ASUS",
					"os": "Android"
				},
				{
					"id": "105",
					"name": "Surface",
					"brand": "Microsoft",
					"os": "Windows"
				}];
				var productsDisplay=[];
				
                $(document).ready(function(){
                	
                });
				
				console.log(productsDisplay);
                    	
                    	var brands=[];


				function showData()
				{ var mytable="";
				/*  var mytable="<select id='Brand' >";
		               
		               // console.log(productsDisplay);
				        showBrandDropdown();
                        
                        for(var i=0;i<brands.length;i++)
                        {
                        	mytable+='<option value="'+brands[i]+'">'+brands[i]+'</option>';
  
                        }


                         mytable+='</select><select id="Os">';
*                      
                        showOsDropdown();

                       for(var i=0;i<oss.length;i++)
                        {
                        	mytable+='<option value="'+oss[i]+'">'+oss[i]+'</option>';
  
                        }
                        mytable+="</select>"

					 mytable+="<table id='myTable'><tr><th>ID</th><th>Name</th><th>Brand</th><th>OperatingSystem</th><th>Remove</th></tr>";
				*/	console.log(products.length);
					mytable+="<table id='myTable'><tr><th>ID</th><th>Name</th><th>Brand</th><th>OperatingSystem</th><th>Remove</th></tr>";

					for(var i=0;i<products.length;i++)
					{
                       console.log(products[i].id,products[i].name,products[i].brand,products[i].os);
                       mytable+="<tr><td>"+products[i].id+"</td><td>"+products[i].name+"</td><td>"+products[i].brand+"</td><td>"+products[i].os+"</td>\
                       <td><a href='javascript:void(0)' class='test'>X</a></td></tr>";
                              
					}
					mytable+="</table>";
					document.getElementById('demo').innerHTML=mytable;
					
					
				}
				
			
				function showBrandDropdown()
				{
					var mytable = "";

					for(var i=0;i<products.length;i++)
					{
						if(brands.indexOf(products[i].brand)===-1)
						{
							brands.push(products[i].brand);
						    	
						}
					}
					  mytable = "<select id='Brand' ><option value = '0'>select</option>";
		               
		               // console.log(productsDisplay);
				        //showBrandDropdown();
                        
                        for(var i=0;i<brands.length;i++)
                        {
                        	mytable+='<option value="'+brands[i]+'">'+brands[i]+'</option>';
  
                        }

                         mytable+='</select>';


					document.getElementById("brandDropdown").innerHTML = mytable ;



				}

               var oss=[];

              function showOsDropdown()
				{
                       var mytable = "";
					for(var i=0;i<products.length;i++)
					{
						if(oss.indexOf(products[i].os)===-1)
						{
							oss.push(products[i].os);
							
						}
					}
					
                    mytable = "<select id='Os' ><option value = '0'>select</option>";
		               
		               // console.log(productsDisplay);
				        //showBrandDropdown();
                        
                        for(var i=0;i<oss.length;i++)
                        {
                        	mytable+='<option value="'+oss[i]+'">'+oss[i]+'</option>';
  
                        }

                         mytable+='</select>';


					document.getElementById("osDropdown").innerHTML = mytable ;



				}


                  
                 function filter(os,brand)
                 { 
                 	
                 	
                 	
                 	for(var i=0;i<products.length;i++)
                 	{
                 		if(( brand == products[i].brand || brand == 0) && (os == products[i].os || os == 0))
                 		{  

                  			
                               			

                 		}
                 		
                 	}mytable+="</table>";
					document.getElementById('demo').innerHTML=mytable 
                 }
				

       function findNameAndid(value)
       {   
       	   console.log("this is fun value"+value);
              var mytable = "";                 		
                 	
					 mytable+="<table id='myTable'><tr><th>ID</th><th>Name</th>\
					 <th>Brand</th><th>OperatingSystem</th><th>Remove</th></tr>";
         var input=value.toLowerCase();
         var len=input.length;
         console.log("this is fun name value"+input);
         for(var i=0;i<products.length;i++)
         {  

         	if(products[i].name.substring(0,len).toLowerCase()===input||products[i].id.substring(0,len)===input)
         	{
                 mytable+="<tr><td>"+products[i].id+"</td><td>"+products[i].name+"</td>\
                 			 <td>"+products[i].brand+"</td><td>"+products[i].os+"</td>\
                     		  <td><a href='javascript:void(0)' class='txt'>Y</a></td></tr>";

         	}
         
              
         }


                        mytable+="</table>";
					document.getElementById('demo').innerHTML=mytable;

       }

               


	$(document).ready(function(){
      
//dispaly first time data
      $("#demo").html(showData());
      $("#brandDropdown").html(showBrandDropdown());

       $("#osDropdown").html(showOsDropdown());

        //display filter brand
       $("#Brand").on("change", function(){
       
       	var slectedBrand = $("#Brand option:selected").val();
       	
       	var slectedOs = $("#Os option:selected").val();
       	
     //  	console.log(slectedBrand);
       //	       	console.log(slectedOs);


       	filter(slectedOs, slectedBrand);
       		});
       //display filter os
       	$("#Os").on("change", function(){
       
       	var slectedBrand = $("#Brand option:selected").val();
       	
       	var slectedOs = $("#Os option:selected").val();
       	

       	filter(slectedOs, slectedBrand);
       });
       
      //delete function

       $(".test").click(function(){
      	$(this).parents("tr").hide();
      });
       //on pageload delete
       $("body").on("click",".txt",function(){
      	$(this).parents("tr").hide();
      });
     //search through searchbox
     $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


     $("#myInput1").on("keyup",function(){
      var value=$(this).val();
      console.log(value);
      findNameAndid(value);
     });



    });

	