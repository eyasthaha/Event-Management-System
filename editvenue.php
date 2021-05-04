
<div class="main">
<div class="content">
<?php 
include('conn.php');
	if(isset($_POST['b1'])){
 	$id = $_POST['b1'];
	$s = "SELECT * FROM venue where id = '$id'";
	$result = $conn->query($s);
	
	if ($result-> num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
 <form autocomplete="off" name="f1" method="post">
  <h1>Edit Category</h1>
<table>
<input name="b1" type="hidden" value="<?php echo $row["id"]; ?>" />
<tr><td> <input name="name" type="text"  value="<?php echo $row["name"]; ?>" /> </td></tr>
<tr>
  <td>
  <input type="text" name="price" value="<?php echo $row["price"]; ?>">

  </td>
</tr>
<tr>
  <td>
  <input type="textarea" name="desc" value="<?php echo $row["description"]; ?>">

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
	$name = $_POST['name'];
	$price = $_POST['price'];
	$desc = $_POST['desc'];
	$sql = "UPDATE venue SET name = '$name', description = '$desc', price = '$price' WHERE id='$id'";
	echo $sql;
	$result = $conn->query($sql);
			if($result){
			echo "<script> alert('successfully updated');</script>";
			echo '<script>window.location="managevenue.php"</script>';
			}
			else{
			echo "<script> alert('Failed')</script>";
		
			}
	}	
	

?>
</table>
</form>