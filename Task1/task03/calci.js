$(document).ready(function()

{
	var num=false;
    var operator=false;
    var temp=0; 
    var secondnum=0;
     var oprt=" ";

	$("#myInput").val("");

 $(".btn").click(function(){
    
    if(num)
        {
         
        $("#myInput").val($("#myInput").val()+$(this).val());   
         }
    else
        {
         $("#myInput").val($(this).val());
         }
         num=true;
         operator=false;
  });


 $(".op").click(function(){
      num=false;
      operator=true;
      
      var result=0;

    if(temp=="0")
    {
      temp=$("#myInput").val();
      console.log(temp);
    }
    else
    {
        secondnum=$("#myInput").val();
       console.log($(this).val());
       console.log("hello"+secondnum);
       result=calculator(temp,secondnum,oprt);
       $("#myInput").val(result);
    }
   
   
      
 temp=$("#myInput").val();
oprt=$(this).val(); 
    
   
 });


 $("#clear").click(function(){
   $("#myInput").val(" ");
   temp=0;
   oprt=" ";

 })
   
 })    



  function calculator(temp,secondnum,oprt)
  {  
  	var output=0;
    switch(oprt)
    {
       case '+':
       output=parseInt(temp)+parseInt(secondnum);
       break;

       case '-':
       output=parseInt(temp)-parseInt(secondnum);
       break;

       case '*':
       output=parseInt(temp)*parseInt(secondnum);
       break;

       case '/':
       output=parseInt(temp)/parseInt(secondnum);
       break;

       default:
       output="please select appropriate operator";
      

     }
     return output;



    }
    
     





  



