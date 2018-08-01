



$(document).ready(function(){


	
	console.log("hello");
			
		
			 $.ajax({
					  type: "POST",
					  url: "addcart.php",
					  data: { action:'1' },
					  dataType:"JSON"
					}).done(function( data ) {
					console.log(data);
					console.log("i am here");
			 		$('#userform').html(showCart(data));
			 		$('#amount').text(Total(data));
			 				$('#totalamount').text(item(data));
					}); 

});

$(document).ready(function(){

$(".add_to_cart_button").click(function(){
	
	console.log("hello");
			var id = $(this).data("id");
			console.log(id);
			 $.ajax({
					  type: "POST",
					  url: "addcart.php",
					  data: { id: id ,action: 'add'},
					  dataType:"JSON"
					}).done(function( data ) {
					console.log(data);
					console.log("i am here");
			 		$('#userform').html(showCart(data));
			 			$('#amount').text(Total(data));
			 				$('#totalamount').text(item(data));
					}); 

});
});

$(document).ready(function(){

$("body").on("click",".add-to-cart-link",function(){
	
	console.log("hello");
			var id = $(this).attr("id");
			console.log(id);
			 $.ajax({
					  type: "POST",
					  url: "addcart.php",
					  data: { id: id ,action: 'add'},
					  dataType:"JSON"
					}).done(function( data ) {
					console.log(data);
					console.log("i am here");
			 		$('#userform').html(showCart(data));
			 			$('#amount').text(Total(data));
			 				$('#totalamount').text(item(data));
					}); 

});
});





$(document).ready(function(){

$("body").on("click",".remove",function(){
	
	console.log("hello");
			var id = $(this).attr("id");
			console.log(id);
			 $.ajax({
					  type: "POST",
					  url: "addcart.php",
					  data: { id: id ,action: 'delete'},
					  dataType:"JSON"
					}).done(function( data ) {
					console.log(data);
					console.log("i am here");
			 		$('#userform').html(showCart(data));
			 			$('#amount').text(Total(data));
			 				$('#totalamount').text(item(data));
					}); 

});
});

$(document).ready(function(){

$("body").on("change",".qty",function(){
	
	console.log("hello");
			var qt = $(this).val();
			var id = $(this).attr("id");
			console.log(id);
			console.log(qt);
			 $.ajax({
					  type: "POST",
					  url: "addcart.php",
					  data: { id: id ,action:'update',qt:qt},
					  dataType:"JSON"
					}).done(function( data ) {
					console.log(data);
					console.log("i am updating");
			 		$('#userform').html(showCart(data));
			 		$('#amount').text(Total(data));
			 				$('#totalamount').text(item(data));
					}); 

});
});

function showCart(data)
 {
    
var mytable='<table cellspacing="0" class="shop_table cart">\
                                    <thead>\
                                        <tr>\
                                            <th class="product-remove">&nbsp;</th>\
                                            <th class="product-thumbnail">&nbsp;</th>\
                                            <th class="product-name">Product</th>\
                                            <th class="product-price">Price</th>\
                                            <th class="product-quantity">Quantity</th>\
                                            <th class="product-subtotal">Total</th>\
                                        </tr>\
                                    </thead>\
                                    <tbody>';
                                      
       
               var total=0;
                for(var i=0;i<data.length;i++)  
                {     
                    total=data[i]['qt']*data[i]['price'];

					mytable+='<tr class="cart_item"><td class="product-remove"><a title="Remove this item" class="remove" id="'+data[i]["id"]+'" href="javascript:void(0)">×</a> </td><td class="product-thumbnail"><a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../uploads/'+data[i]["img"]+'"></a></td><td class="product-name">  <a href="single-product.php?id='+data[i]["id"]+'">'+data[i]["name"]+'</a></td><td class="product-price"><span class="amount">£'+data[i]["price"]+'</span> </td><td class="product-quantity"><div class="quantity buttons_added"><input type="number" size="4" id="'+data[i]["id"]+'"class="input-text qty text" title="Qty" value="'+data[i]["qt"]+'" min="0" step="1"></div></td><td class="product-subtotal"><span class="amount">£'+total+'</span> </td></tr>';  
					                          
					 
         		}
                      
                    mytable+= '<tr><td colspan="3">Total</td><td colspan="3">'+Total(data)+'</td></tr><tr>\
                              <td class="actions" colspan="6">\
                               <a href="checkout.php">PlaceOrder</a>\
                               </td>\
                               </tr>\
                                    </tbody>\
                                </table>';
   
                                return mytable;
 }

function item(data)
{

return data.length;

}
function Total(data)
{
 var total=0;
for(var i=0;i<data.length;i++)
{
 total=total+data[i]['qt']*data[i]['price'];

}
return total;
}