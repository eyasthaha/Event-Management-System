<?php include('conn.php'); ?>

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
		if(isset($_POST['b1'])){
		$id = $_POST['b1'];
		echo $id;
		$sql3 = "SELECT *FROM event WHERE id=$id";
		$x = $conn->query($sql3);
		if ($x -> num_rows > 0) {
    while($row = $x->fetch_assoc()) {
?>
<form method="post" enctype="multipart/form-data">
<table>
<tr><td><h1>Add Event</h1></td></tr>
<tr><td><label>Event Category:</label><br><select name="category">

<?php echo $options ?>

</select></td></tr>
<tr><td><label>Event Sponsor:</label><br><select name="sponsor">
<?php echo $options2 ?>
</select></td></tr>
<tr><td><label>Event Name:</label><br><input name="name" type="text" value="<?php echo $row['name'] ?>"></td></tr>
<tr><td><label>Event Description:</label><br><textarea name="desc" rows="3"><?php echo $row['description'] ?></textarea></td></tr>
<tr><td><label>Event Start Date:</label><br><input name="startdate" type="date" value="<?php echo $row['sdate'] ?>"></td></tr>
<tr><td><label>Event End Date:</label><br><input name="enddate" type="date" value="<?php echo $row['edate'] ?>"></td></tr>
<tr><td><label>Event Location:</label><br><input name="loc" type="text" value="<?php echo $row['location'] ?>"></td></tr>
<tr><td><label>Event Featured Image:</label><br><input name="img" type="file"></td></tr>
<tr><td><?php echo '<img src="eventimg/'.$row['img'].'" width="100" height="100"/>';?></td></tr>
<input name="b1" type="hidden" value="<?php echo $row["id"]; ?>" />
<tr><td><input name="submit" type="submit" value="submit" /></td></tr>
</table>
</form>
<?php
}
}
}
if(isset($_POST['submit'])){
		$id = $_POST['b1'];
		echo $id;
		$category = $_POST['category'];
		echo $category;
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
			echo $ran2.$exts;
			$target = "eventimg/".$ran2.$exts;
			$file = move_uploaded_file($_FILES['img']['tmp_name'], $target);
			$s = "UPDATE event SET category='$category', sponsor='$sponsor', name='$name', description='$desc', sdate='$sd', edate='ed', location='$loc', img='$image_text' WHERE id=$id";
			$conn->query($s);
			if($file) {
				echo "Event added successfully";
			}else{
				echo "Failed";
			}
}	
?>

</div>
</div>