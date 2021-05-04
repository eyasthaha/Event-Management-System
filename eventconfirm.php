<?php
include('conn.php');
if(isset($_POST['b1'])){
$id = $_POST['b1'];
$sql = "SELECT *FROM customevent WHERE id='".$id."'";
$result = $conn->query($sql);
if($result){
	while($row =$result->fetch_assoc()){
?>
<div class="main">
<div class="content">
<div id="cp">
<form method="post">
<table id="c">
<tr><td>Username :</td><td><?php echo $row['username'] ?></td><td><b>Category :</b></td><td><?php echo $row['category']; ?></td></tr>
	<tr><td><b>No. of Person :</b></td><td><?php echo $row['person']; ?></td><td><b>Event Date :</b></td><td><?php echo $row['date']; ?></td></tr>
	<tr><td>Food :</td><td><?php echo $row['food']; ?></td><td><b>Status :</b></td><td style="color:#FF0000;"><?php echo $row['status']; ?></td></tr>
	<tr><td>Food Type</td><td><?php echo $row['foodclass']; ?></td>
	<td>Cost :</td><td><?php echo $row['total']; ?></td></tr>
	<tr><form method="post"><td colspan="4" align="center"><input name="submit" type="submit" value="Confirm"/><input name="submit" type="hidden" value="<?php  echo $id; ?>">
	</form><form method="post"><input name="rem" type="submit" value="Cancel"/><input name="rem" type="hidden" value="<?php  echo $id; ?>"></form>
	</td></tr>
</table>
</form>
</div>
</div>
</div>
<?php
}
}
}
if(isset($_POST['submit'])){
$id = $_POST['submit'];
$y = 'Confirmed';
$sql2 = "UPDATE customevent SET status='".$y."' WHERE id='".$id."'";
$res = $conn->query($sql2);
if($res){
	echo "<script>alert('Confirmed'); </script>";
}
header('Location:./manage new reg.php');
}

if(isset($_POST['rem'])){
$id = $_POST['rem'];
$y = 'Cancelled';
$sql3 = "UPDATE customevent SET status='".$y."' WHERE id='".$id."'";
$res2 = $conn->query($sql3);
if($res2){
	echo "<script>alert('Cancelled'); </script>";
}
	header('Location:./manage new reg.php');

}
?>