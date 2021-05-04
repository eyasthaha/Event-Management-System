
<div class="main">
<div class="content">
<?php 
include('conn.php');
	if(isset($_POST['b1'])){
 	$id = $_POST['b1'];
	$s = "SELECT * FROM category where id = '$id'";
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
	$desc = $_POST['desc'];
	$sql = "UPDATE category SET name = '$name', description = '$desc' WHERE id='$id'";
	echo $sql;
	$result = $conn->query($sql);
			if($result){
			echo "<script> alert('successfully updated');</script>";
			header("location:./managecategory.php");
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
<script>
function check(){
	if(document.f1.name.value==""||document.f1.desc.value=="")
		{
			alert("please enter the fields");
			return(false);
		}
}
</script>