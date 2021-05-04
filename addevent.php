<?php include('conn.php');
include('header.php');
 ?>

<div class="main">
<div class="content">
<?php
	$sql = "SELECT name FROM category";
	$result = $conn->query($sql);
	$options= "";
	while ($row = $result->fetch_assoc()){
	
	$options = $options."<option value=$row[name]>$row[name]</option>";
	}
	
	$sql2 = "SELECT name FROM sponsors";
	$result = $conn->query($sql2);
	$options2= "";
	while ($row = $result->fetch_assoc()){
		
		$options2 = $options2."<option value=$row[name]>$row[name]</option>";
		}
?>
<form method="post" enctype="multipart/form-data">
<table id="c" width="50%;">
<tr><td colspan="2"><h1>Add Event</h1></td></tr>
<tr><td><label>Event Category:</td><td><select name="category">

<?php echo $options ?>

</select></td></tr>
<tr><td>Event Sponsor:</td><td><select name="sponsor">
<?php echo $options2 ?>
</select></td></tr>
<tr><td>Event Name:</td><td><input name="name" type="text"></td></tr>
<tr><td>Event Description:</td><td><textarea name="desc" rows="3"></textarea></td></tr>
<tr><td>Event Start Date:</td><td><input name="startdate" type="date"></td></tr>
<tr><td>Event End Date:</td><td><input name="enddate" type="date"></td></tr>
<tr><td>Event Location:</td><td><input name="loc" type="text"></td></tr>
<tr><td>Event Featured Image:</td><td><input name="img" type="file"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="submit" /></td></tr>
</table>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=== 'POST'){
		$category = $_POST['category'];
		$sponsor = $_POST['sponsor'];
		$name = $_POST['name'];
		$desc = $_POST['desc'];
		$sd = $_POST['startdate'];
		$ed = $_POST['enddate'];
		$loc = $_POST['loc'];
			$image = $_FILES['img']['name'];
			$filename = strtolower($image);
			$tmp = explode('.', $filename);
			$exts = end($tmp);
			$ran = $name;
			$ran2 = $ran.'.';
			$image_text = mysqli_real_escape_string($conn, $ran2.$exts);
			$target = "eventimg/".$ran2.$exts;
			$file = move_uploaded_file($_FILES['img']['tmp_name'], $target);
			$sql = "INSERT INTO event (category,sponsor,name,description,sdate,edate,location,img) VALUES('".$category."','".$sponsor."','".$name."','".$desc."','".$sd."','".$ed."','".$loc."','".$image_text."')";
			$res = $conn->query($sql);
			if($res) {
				echo "Event added successfully";
			}else{
				echo "Failed";
			}
}	
?>

</div>
</div>