
	function myFunction() {
     var i;
    var name=document.getElementById('pid').value;
    var name1=document.getElementById('price').value;
  var name2=document.getElementById('pname').value;
    var table = document.getElementById("myTable");
    var row = table.insertRow(i);
   
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
     var cell3 = row.insertCell(2);
    cell1.innerHTML = "    "+name+"  ";
     cell2.innerHTML = name1;
    cell3.innerHTML = name2;
     i++;
    
}
