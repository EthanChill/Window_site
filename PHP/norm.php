<!--Таблица заказов-->
<table>
<tr>
<th>id</th>
<th>Address</th>
<th>Telephon/mail	</th>
<th>FIO</th>
<th>PRICE</th>
</tr>
<tbody id ="data">
</tbody>
</table>
<script>
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "data.php";
var asynchronous = true;
ajax.open(method,url,asynchronous);
ajax.send();
ajax.onreadystatechange = function(){
	if(this.readyState == 4 && this.status ==200)
	{
		var data = JSON.parse(this.responseText);
		console.log(data);
		var html = "";
		for(var a=0;a<data.length;a++){
			var id=data[a].id;
			var address=data[a].addr;
			var telma =data[a].telm;
			var fiot = data[a].fioz;
			var pricez = data[a].price;
			html +="<tr>";
			html += "<td>"+id+"</td>";
			html += "<td>"+address+"</td>";
			html += "<td>"+telma+"</td>";
			html += "<td>"+fiot+"</td>";
			html += "<td>"+pricez+"</td>";
			html += "</tr>";
		}
		document.getElementById("data").innerHTML = html;
	}
}

</script>