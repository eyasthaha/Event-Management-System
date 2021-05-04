<?php include('conn.php'); ?>

<div class="main">
<div class="content">
<?php 
	include('conn.php');
	if(isset($_POST['b1'])){
 	$id = $_POST['b1'];
	echo $id;
	$s = "SELECT * FROM sponsors where id = '$id'";
	$result = $conn->query($s);
	
	if ($result-> num_rows > 0) {
    while($row = $result->fetch_assoc()) {

?>



  <form autocomplete="off" name="sp" method="post" enctype="multipart/form-data">
  <h1>Edit Sponsors</h1>
<table>
<input name="b1" type="hidden" value="<?php echo $row["id"]; ?>" />
<tr><td> <input name="name" type="text"  value="<?php echo $row['name'] ?>"> </td></tr>
<tr><td><?php echo '<img src="sponsorimg/'.$row['logo'].'" width="100" height="100"/>';?></td></tr>
<tr>
  <td>
  <input id='logo' name='logo' type="file">
  </td>
</tr>
<tr><td> <input name='submit' type='submit' value="submit" onclick='check()'/>
</td></tr>
</table>
</form>
<?php
}
}
}
	if(isset($_POST['submit'])){
	$id = $_POST['b1'];	
	$name = $_POST['name'];
	$date=date("Y")."-".date("m")."-".date("d");
    $image = $_FILES['logo']['name'];
	$filename = strtolower($image);
	$tmp = explode('.', $filename);
	$exts = end($tmp);
	$ran = $name;
	$ran2 = $ran.'.';
  	$image_text = mysqli_real_escape_string($conn, $ran2.$exts);
  	$target = "sponsorimg/".$ran2.$exts;
	$file = move_uploaded_file($_FILES['logo']['tmp_name'], $target);
  	$sql = "UPDATE sponsors SET name ='$name' logo = '$image_text' WHERE id='$id'";
	echo $sql;
	$res = $conn->query($sql);
  		if($file) {
  			echo "Image uploaded successfully";
  			}else{
  			echo "Failed to upload image";
  			}
  }

?>


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

