<?php
require_once ('connect.php');
// Модальное окно изменения данных определённого заказа. 
?>
<html>
<head>
<meta charset ="utf-8">
<link rel = "stylesheet" href="https://maxcdn.bootstapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class ="container">
<table class ="table">
<thead>
<tr>

<th>Address</th>
<th>Telephon/mail</th>
<th>FIO</th>
<th>PRICE</th>
<th>ACTION</th>


</tr>

</thead>
<tbody>
<?php
$table = mysqli_query($connect,'Select * from ordertab');
while($row=mysqli_fetch_array($table)){?>
<tr id="<?php echo $row['id']; ?>">

<td data-target="addr"><?php echo $row['addr'];?> </td>
<td data-target="telm"><?php echo $row['telm'];?> </td>
<td data-target="fioz"><?php echo $row['fioz'];?> </td>
<td data-target="price"><?php echo $row['price'];?> </td>
<td><a href =# data-role="update" data-id= "<?php echo $row['id']?>"> Update </a> </td>
</tr>
<?php 
} 
?>
</tbody>
</table>


<!--button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button-->

</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
     
	 <div class = "form-group">
	 <label>address</label>
	 <input type ="text" id ="adr" class ="form-control">
	 </div>
	 <div class = "form-group">
	 <label>telemail</label>
	 <input type ="text" id ="telma" class ="form-control">
	 </div>
	 <div class = "form-group">
	 <label>Price</label>
	 <input type ="text" id ="prc" class ="form-control">
	 </div>
	 <div class = "form-group">
	 <label>FIO</label>
	 <input type ="text" id ="fiozak" class ="form-control">
	 </div>
	  <input type ="hidden" id ="userId" class ="form-control">
      </div>
      <div class="modal-footer">
      <a href ="#" id="save" class ="btn btn-primary pull-right">Обновить</a>
		  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>

<script>
$(document).ready(function(){

$(document).on('click','a[data-role = update]',function(){
	
	var id = $(this).data('id');
	var addr = $('#'+id).children('td[data-target=addr]').text();
	var telm = $('#'+id).children('td[data-target=telm]').text();
	var fioz = $('#'+id).children('td[data-target=fioz]').text();
	var price = $('#'+id).children('td[data-target=price]').text();
	$('#adr').val(addr);
	$('#telma').val(telm);
	$('#fiozak').val(fioz);
	$('#prc').val(price);
	$('#userId').val(id);
	$('#myModal').modal('toggle');
	
});
$('#save').click(function(){
	
	var id = $('#userId').val();
val addr=	$('#adr').val();
val telm =  $('#telma').val();
val fioz = 	$('#fiozak').val();
val price =	$('#prc').val();
$.ajax({
url :'connection.php';
	method:'post',
	data: {addr:addr,telm:telm,fioz:fioz,price:price,id:id},
	success: function(response){
		$('#'+id).children('td[data-target=addr]').text(addr);
		$('#'+id).children('td[data-target=telm]').text(telm);
		$('#'+id).children('td[data-target=fioz]').text(fioz);
		$('#'+id).children('td[data-target=price]').text(price);
		$('#myModal').modal('toggle');
	}
	
	
});
});
});
</script>



</html>