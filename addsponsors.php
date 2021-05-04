<?php include('conn.php'); ?>

<div class="main">
<div class="content">
  <form autocomplete="off" name="sp" method="post" enctype="multipart/form-data">
  <h1>Add Sponsors</h1>
<table>
<tr><td> <input name="name" type="text"  placeholder="Sponsor Name" ?> </td></tr>
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
if($_SERVER['REQUEST_METHOD']==='POST'){
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
  	$sql = "INSERT INTO sponsors (name, logo, regdate) VALUES ('".$name."', '".$image_text."', '".$date."')";
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

