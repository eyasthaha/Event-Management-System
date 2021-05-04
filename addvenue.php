<?php 
include('header.php');
include('dashboard.css');
?>
<div class="main">
<div class="content">
<form autocomplete="off" name="f1" method="post">
<table id="c">
<tr><td><h3 align="center">Add Venue</h1></td></tr>
<tr><td><input name="name" type="text" placeholder="Venue Name" /></td></tr>
<tr>
  <td>
    <textarea name="desc" placeholder="Description"></textarea>
  </td>
</tr>
<tr>
  <td>
    <input type="text" name="price" placeholder="Price/day" />
  </td>
</tr>
<tr><td align="center"><input type="submit" onclick="check()"/></td></tr>
</table>
</form>
<?php
include('conn.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
	$name = $_POST['name'];
	$price = $_POST['price'];
	$desc = $_POST['desc'];
	if($name=='' && $desc==''){
		echo '<script> alert ("fill ");</script>';
	}
	else{
	$query = "insert into venue (name,price,description) VALUES('".$name."','".$price."','".$desc."')"; 
	$response = $conn->query($query);
     if($response){
		echo '<script> alert ("Success");</script>';
		}
	}	
}
?>
</div>
</div>