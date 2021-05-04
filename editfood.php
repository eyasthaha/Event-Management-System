<?php include('header.php'); ?>
<div class="main">
<div class="content">
<?php 
include('conn.php');
	if(isset($_POST['b1'])){
 	$id = $_POST['b1'];
	$s = "SELECT * FROM food where id = '$id'";
	$result = $conn->query($s);
	
	if ($result-> num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
  <form autocomplete="off" name="f1" method="post">
  <h1>Edit Category</h1>
<table id="d">
<input name="b1" type="hidden" value="<?php echo $row["id"]; ?>" />
<tr><td> <input readonly name="name" type="text"  value="<?php echo $row["type"]; ?>" /> </td></tr>
<tr>
  <td>
  <input readonly type="textarea" name="name" value="<?php echo $row["name"]; ?>">
  </td>
</tr>
<tr>
  <td>
  <input type="textarea" name="price" value="<?php echo $row["price"]; ?>">
  </td>
</tr>
<tr><td> <input name='submit' type='submit' value="Update" onclick='check()'/>
</td></tr>
<?php
}
}
}
	if(isset($_POST['submit'])){
	$id = $_POST['b1'];
	$price = $_POST['price'];
	$sql = "UPDATE food SET price = '$price' WHERE id='$id'";
	$result = $conn->query($sql);
			if($result){
			echo "<script> alert('successfully updated');</script>";
			}
			else{
			echo "<script> alert('Failed')</script>";
		
			}
	}	
	

?>
</table>
</form>

</div>

</div>
