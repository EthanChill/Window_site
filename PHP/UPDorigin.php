<?php
require_once('connect.php');
session_start();
if(!isset($_SESSION['User'])){
    header("location:auth.php");
    //Удаление заказов, а также их обновление через модальную форму.
}
?>
<html>
<head>
<meta charset ="utf-8">
<link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/normal.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php echo '<a href="logout.php?logout">Выйти</a>';?>
<div class ="container">
<table class ="table">
<thead>
<tr>
<th>Address</th>
<th>Telephon/mail</th>
<th>FIO</th>
<th>PRICE</th>
<th>ACTION</th>
<th>ACTION2</th>
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
<td><a href =# data-role="update" data-id= "<?php echo $row['id']?>"> Update </a> </td>
</tr>
<?php 
} 
?>
</tbody>
</table>
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
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
var addr=	$('#adr').val();
var telm =  $('#telma').val();
var fioz = 	$('#fiozak').val();
var price =	$('#prc').val();
$.ajax({
url :'connection.php',
	method:'post',
	data: {addr:addr,telm:telm,fioz:fioz,price:price,id:id},
	success: function(response){
	    console.log(response);
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